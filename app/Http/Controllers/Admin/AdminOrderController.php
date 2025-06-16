<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\{OrderService, NotificationService};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    protected $orderService;
    protected $notificationService;

    public function __construct(OrderService $orderService, NotificationService $notificationService)
    {
        $this->middleware(['auth', 'admin']);
        $this->orderService = $orderService;
        $this->notificationService = $notificationService;
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,payment_verification,payment_accepted,payment_rejected,awaiting_reupload,processing,delivering,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        try {
        return DB::transaction(function () use ($request, $id) {
            $order = Order::with('items.product')->lockForUpdate()->findOrFail($id);
            $originalStatus = $order->status;

            if ($request->status === 'cancelled' && $originalStatus === 'completed') {
                throw new \Exception('Pesanan yang sudah selesai tidak dapat dibatalkan.');
            }

            // Cek stok jika dari cancelled ke status lain
            if ($originalStatus === 'cancelled' && $request->status !== 'cancelled') {
                foreach ($order->items as $item) {
                    $product = $item->product;
                    if (!$product || !$product->is_active) {
                        throw new \Exception('Produk ' . ($product->name ?? '') . ' tidak tersedia.');
                    }
                    if ($product->stock < $item->quantity) {
                        throw new \Exception('Stok tidak cukup untuk produk: ' . $product->name);
                    }
                }
            }

            // Hapus bukti pembayaran jika perlu upload ulang
            if ($request->status === 'awaiting_reupload' && $order->payment_proof) {
                $path = public_path('storage/' . $order->payment_proof);
                if (file_exists($path)) {
                    unlink($path);
                }
                $order->payment_proof = null;
                $order->save();
            }

            // Update status
            $this->orderService->updateOrderStatus($order, $request->status, $request->notes);

            // Efek status
            if ($order->wasChanged('status')) {
                $this->handleStatusChangeEffects($order, $originalStatus);
            }

            return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
        });
    } catch (\Exception $e) {
        Log::error('AdminOrderController updateStatus error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Gagal memperbarui status pesanan: ' . $e->getMessage());
    }
    }

    protected function handleStatusChangeEffects(Order $order, $originalStatus)
    {
        try {
            if ($order->status === 'cancelled' && $originalStatus !== 'cancelled') {
                foreach ($order->items as $item) {
                    $item->product->increaseStock($item->quantity, 'order_cancellation', $order);
                }
            } elseif ($originalStatus === 'cancelled' && $order->status !== 'cancelled') {
                foreach ($order->items as $item) {
                    try {
                        $item->product->decreaseStock($item->quantity, 'order_reactivation', $order);
                    } catch (\RuntimeException $e) {
                        $order->status = $originalStatus;
                        $order->save();
                        throw new \Exception('Gagal mengubah status: ' . $e->getMessage());
                    }
                }
            }

            // Notifikasi hanya untuk status tertentu
            if ($order->status === 'completed') {
                $this->notificationService->sendOrderCompletedNotification($order);
            } elseif ($order->status === 'cancelled') {
                $this->notificationService->sendOrderCancelledNotification($order);
            }

        } catch (\Exception $e) {
            Log::error('Error handling status change effects: ' . $e->getMessage());
            throw $e;
        }
    }

    public function index(Request $request)
    {
        try {
            $query = Order::with(['user', 'items.product']);

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('order_number', 'like', '%' . $request->search . '%')
                        ->orWhereHas('user', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request->search . '%')
                              ->orWhere('email', 'like', '%' . $request->search . '%');
                        });
                });
            }

            $orders = $query->latest()->paginate(15);
            $statuses = [
                'pending', 'payment_verification', 'payment_accepted',
                'payment_rejected', 'awaiting_reupload', 'processing',
                'delivering', 'completed', 'cancelled'
            ];

            return view('admin.orders.index', compact('orders', 'statuses'));
        } catch (\Exception $e) {
            Log::error('AdminOrderController index error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat daftar pesanan');
        }
    }

    public function show($id)
    {
        try {
            $order = Order::with(['user', 'items.product'])->findOrFail($id);
            return view('admin.orders.show', compact('order'));
        } catch (\Exception $e) {
            Log::error('AdminOrderController show error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat detail pesanan');
        }
    }
}

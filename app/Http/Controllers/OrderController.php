<?php

namespace App\Http\Controllers;

use App\Models\{Order, OrderItem, Product};
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\{Auth, DB, Validator, Log, Storage};
use Illuminate\View\View;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar order pengguna
     */
    public function index(): View
    {
        $orders = Auth::user()->orders()
            ->with(['items.product'])
            ->latest()
            ->paginate(10);

        return view('account.orders', compact('orders'));
    }

    /**
     * Menampilkan form pembuatan order untuk produk tertentu
     */
    public function create(Request $request): View
    {
        $product = Product::where('is_active', true)
            ->findOrFail($request->product_id);

        return view('orders.create', compact('product'));
    }

    /**
     * Menyimpan order baru
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string|max:500',
            'phone_number' => 'required|digits_between:10,15',
            'payment_method' => 'required|in:'.implode(',', array_keys(Order::PAYMENT_METHODS)),
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            return DB::transaction(function () use ($request) {
                // Validasi stok untuk semua produk
                foreach ($request->products as $item) {
                    $product = Product::find($item['id']);
                    if (!$product->is_active) {
                        throw new \Exception('Produk ' . $product->name . ' tidak tersedia');
                    }
                    if ($product->stock < $item['quantity']) {
                        throw new \Exception('Stok tidak cukup untuk produk: ' . $product->name);
                    }
                }

                // Hitung total amount
                $totalAmount = collect($request->products)->sum(function ($item) {
                    $product = Product::find($item['id']);
                    return $product->price * $item['quantity'];
                });

                // Buat order
                $order = Auth::user()->orders()->create([
                    'order_number' => $this->generateOrderNumber(),
                    'status' => 'pending',
                    'total_amount' => $totalAmount,
                    'payment_method' => $request->payment_method,
                    'shipping_address' => $request->shipping_address,
                    'phone_number' => $request->phone_number,
                    'notes' => $request->notes,
                ]);

                // Buat order items dan kurangi stok
                foreach ($request->products as $item) {
                    $product = Product::find($item['id']);
                    
                    $product->decreaseStock(
                        $item['quantity'],
                        'order_placement',
                        $order
                    );

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'price' => $product->price,
                    ]);
                }

                return redirect()->route('orders.success', $order->id);
            });
        } catch (\Exception $e) {
            Log::error('OrderController@store error: '.$e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Menampilkan detail order
     */
    public function show(int $id): View
    {
        $order = Auth::user()->orders()
            ->with(['items.product'])
            ->findOrFail($id);

        return view('account.order-detail', compact('order'));
    }

    /**
     * Menampilkan halaman sukses order
     */
    public function success(int $orderId): View|RedirectResponse
    {
        $order = Order::where('user_id', Auth::id())
            ->findOrFail($orderId);

        if ($order->status !== 'pending') {
            return redirect()
                ->route('products.index')
                ->with('info', 'Pesanan Anda sudah diproses');
        }

        $paymentInfo = [
            'gopay' => '0822-3456-7890',
            'ovo' => '0812-3456-7890',
            'dana' => '0857-3456-7890',
            'qris' => asset('storage/payment/qris.png'),
            'bank_transfer' => [
                'bank_name' => 'Bank ABC',
                'account_number' => '1234567890',
                'account_name' => 'Nama Toko Anda'
            ]
        ];

        return view('orders.success', compact('order', 'paymentInfo'));
    }

    /**
     * Mengunggah bukti pembayaran
     */
    public function uploadPaymentProof(Request $request, int $orderId): RedirectResponse
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $order = Order::where('user_id', Auth::id())
                ->whereIn('status', ['pending', 'awaiting_reupload']) // ✅ izinkan upload ulang
                ->findOrFail($orderId);

            // Hapus file lama jika ada
            if ($order->payment_proof && Storage::disk('public')->exists($order->payment_proof)) {
                Storage::disk('public')->delete($order->payment_proof);
            }

            // Simpan file baru
            $path = $request->file('payment_proof')
                ->store('payment-proofs', 'public');

            $order->update([
                'payment_proof' => $path,
                'status' => 'payment_verification',
            ]);

            return back()->with('success', 'Bukti pembayaran berhasil diunggah!');
        } catch (\Exception $e) {
            Log::error('OrderController@uploadPaymentProof error: '.$e->getMessage());
            return back()->with('error', 'Gagal mengunggah bukti pembayaran: '.$e->getMessage());
        }
    }

    /**
     * Membatalkan order
     */
    public function cancel($id): RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {
                $order = Auth::user()->orders()
                    ->where('status', 'pending')
                    ->findOrFail($id);

                $order->update(['status' => 'cancelled']);

                // Kembalikan stok produk
                foreach ($order->items as $item) {
                    $item->product->increaseStock(
                        $item->quantity,
                        'user_cancellation',
                        $order
                    );
                }
            });

            return redirect()
                ->route('account.orders')
                ->with('success', 'Pesanan berhasil dibatalkan');
        } catch (\Exception $e) {
            Log::error('OrderController@cancel error: '.$e->getMessage());
            return back()->with('error', 'Gagal membatalkan pesanan: '.$e->getMessage());
        }
    }

    /**
     * Generate nomor order unik
     */
    protected function generateOrderNumber(): string
    {
        $prefix = 'ORD-'.date('Ymd').'-';
        $latest = Order::where('order_number', 'like', $prefix.'%')
            ->latest()
            ->first();

        if ($latest) {
            $number = (int) str_replace($prefix, '', $latest->order_number) + 1;
        } else {
            $number = 1;
        }

        return $prefix.str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
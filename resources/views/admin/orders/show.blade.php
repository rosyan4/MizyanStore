@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $order->order_number)

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan #{{ $order->order_number }}</h6>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                {{-- Kiri --}}
                <div class="col-md-6">
                    {{-- Info Pesanan --}}
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Informasi Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr><th width="40%">Nomor Pesanan</th><td>{{ $order->order_number }}</td></tr>
                                <tr><th>Tanggal Pesanan</th><td>{{ $order->created_at->format('d M Y H:i') }}</td></tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @php $statusInfo = $order->status_badge; @endphp
                                        <span class="badge bg-{{ $statusInfo['color'] }}">{{ $statusInfo['text'] }}</span>
                                    </td>
                                </tr>
                                <tr><th>Total Pembayaran</th><td class="fw-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td></tr>
                                <tr><th>Metode Pembayaran</th><td>{{ App\Models\Order::PAYMENT_METHODS[$order->payment_method] ?? $order->payment_method }}</td></tr>
                                @if($order->paid_at)
                                    <tr><th>Tanggal Pembayaran</th><td>{{ $order->formatted_paid_at }}</td></tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    {{-- Info Pelanggan --}}
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Informasi Pelanggan</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr><th width="40%">Nama</th><td>{{ $order->user->name }}</td></tr>
                                <tr><th>Email</th><td>{{ $order->user->email }}</td></tr>
                                <tr><th>Telepon</th><td>{{ $order->phone_number }}</td></tr>
                                <tr><th>Alamat Pengiriman</th><td>{{ $order->shipping_address }}</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Kanan --}}
                <div class="col-md-6">
                    {{-- Item Pesanan --}}
                    <div class="card mb-3">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Item Pesanan</h6>
                            <span class="badge bg-primary">{{ $order->items->count() }} Item</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->product->image)
                                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                        <small class="text-muted">{{ $item->product->category->name }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-end">Total</th>
                                            <th>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Bukti Pembayaran --}}
                    @php
                        $paymentProofPath = public_path('storage/' . $order->payment_proof);
                    @endphp

                    @if($order->payment_proof && file_exists($paymentProofPath))
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Bukti Pembayaran</h6>
                            </div>
                            <div class="card-body text-center">
                                <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid rounded" style="max-height: 200px;">
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            Bukti pembayaran belum tersedia atau telah dihapus.
                        </div>
                    @endif

                    {{-- Form Update Status --}}
                    @if(in_array($order->status, ['pending', 'payment_verification', 'payment_accepted', 'payment_rejected', 'awaiting_reupload', 'processing','delivering']))
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Update Status Pesanan</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status Baru</label>
                                        <select class="form-select" id="status" name="status" required>
                                            @foreach(App\Models\Order::STATUSES as $key => $status)
                                                @if($key !== 'cancelled' || $order->status !== 'completed')
                                                    <option value="{{ $key }}" {{ $key === $order->status ? 'selected disabled' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Catatan (Opsional)</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-save me-1"></i> Update Status
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

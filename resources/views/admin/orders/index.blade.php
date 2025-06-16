@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">

        <!-- Header dan Pencarian -->
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
            <form action="{{ route('admin.orders.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari pesanan..." 
                        value="{{ request('search') }}"
                    >
                    <select 
                        name="status" 
                        class="form-select" 
                        onchange="this.form.submit()"
                    >
                        <option value="">Semua Status</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ App\Models\Order::STATUSES[$status] ?? $status }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Daftar Pesanan -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Nomor Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary">
                                        {{ $order->order_number }}
                                    </a>
                                </td>
                                <td>{{ $order->user->name }}</td>
                                <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td>{{ App\Models\Order::PAYMENT_METHODS[$order->payment_method] ?? $order->payment_method }}</td>
                                <td>
                                    @php
                                        $statusInfo = $order->status_badge;
                                    @endphp
                                    <span class="badge bg-{{ $statusInfo['color'] }}">
                                        {{ $statusInfo['text'] }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a 
                                        href="{{ route('admin.orders.show', $order->id) }}" 
                                        class="btn btn-sm btn-primary" 
                                        title="Detail"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada pesanan ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4 d-flex justify-content-center">
                {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
            </nav>
        </div>
        
    </div>
</div>
@endsection

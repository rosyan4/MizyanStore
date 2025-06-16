@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->order_number)

@section('content')
<style>
    :root {
        --primary-color: #F8E5BB !important;        /* Cream muda */
        --secondary-color: #713600 !important;      /* Coklat gelap */
        --accent-color: #F2E8D5 !important;         /* Beige pucel */
        --text-highlight: #A8713A !important;       /* Coklat muda */
        --footer-bg: #4A2C14 !important;           /* Coklat tua solid */
        --price-color: #D39C63 !important;         /* Coklat emas (golden tan) */
        --bg-white: #FFFFFF !important;             /* Putih */
        --bg-light: #FDF9F3 !important;            /* Cream sangat muda */
        --text-dark: #713600 !important;           /* Coklat gelap untuk teks */
        --text-secondary: #A8713A !important;       /* Coklat muda untuk teks */
        --text-muted: #8B6F47 !important;          /* Coklat medium */
        --text-light: #B8956B !important;          /* Coklat muda */
        --border-light: #F2E8D5 !important;        /* Border beige */
        --border-primary: #F8E5BB !important;      /* Border cream */
        --shadow-light: 0 4px 20px rgba(248, 229, 187, 0.15) !important;
        --shadow-medium: 0 8px 30px rgba(248, 229, 187, 0.25) !important;
        --shadow-heavy: 0 15px 40px rgba(248, 229, 187, 0.3) !important;
    }

    * {
        font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Main Section */
    .order-detail-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: var(--secondary-color) !important;
        color: var(--bg-white) !important;
        padding: 25px 30px;
        border-bottom: none;
        border-radius: 20px 20px 0 0 !important;
    }

    .card-header h5 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .card-body {
        padding: 30px;
    }

    /* Section Cards */
    .info-card {
        background-color: var(--bg-light);
        border-radius: 15px;
        border: 1px solid var(--border-light);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .info-card .card-header {
        background-color: var(--accent-color) !important;
        color: var(--text-dark) !important;
        padding: 15px 20px;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 15px 15px 0 0 !important;
    }

    .info-card .card-body {
        padding: 20px;
        background-color: var(--bg-white);
    }

    /* Table Styling */
    .table {
        margin-bottom: 0;
    }

    .table th {
        color: var(--text-dark);
        font-weight: 600;
        border: none;
        padding: 12px 8px;
        font-size: 0.9rem;
    }

    .table td {
        color: var(--text-secondary);
        border: none;
        padding: 12px 8px;
        vertical-align: middle;
    }

    .table-borderless th,
    .table-borderless td {
        border: none;
        padding: 8px 0;
    }

    .table-borderless th {
        color: var(--text-dark);
        font-weight: 600;
    }

    .table-borderless td {
        color: var(--text-secondary);
    }

    /* Status Badge */
    .badge {
        padding: 8px 12px;
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 20px;
    }

    .badge.bg-primary {
        background-color: var(--secondary-color) !important;
        color: var(--bg-white);
    }

    .badge.bg-success {
        background-color: #28a745 !important;
        color: var(--bg-white);
    }

    .badge.bg-warning {
        background-color: var(--price-color) !important;
        color: var(--bg-white);
    }

    .badge.bg-danger {
        background-color: #dc3545 !important;
        color: var(--bg-white);
    }

    .badge.bg-info {
        background-color: var(--text-highlight) !important;
        color: var(--bg-white);
    }

    /* Product Item Styling */
    .product-item {
        padding: 15px;
        border-radius: 10px;
        border: 1px solid var(--border-light);
        margin-bottom: 10px;
        background-color: var(--bg-light);
    }

    .product-image {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid var(--border-primary);
    }

    .product-name {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 2px;
        font-size: 0.95rem;
    }

    .product-category {
        color: var(--text-light);
        font-size: 0.8rem;
    }

    .price-text {
        color: var(--price-color);
        font-weight: 600;
    }

    /* Button Styling */
    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 0.95rem;
        color: var(--bg-white);
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-1px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
    }

    .btn-light {
        background-color: var(--bg-white);
        border: 1px solid var(--border-light);
        color: var(--text-dark);
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-light:hover {
        background-color: var(--accent-color);
        color: var(--text-dark);
        border-color: var(--border-primary);
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        color: var(--bg-white);
        transition: all 0.2s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        color: var(--bg-white);
    }

    /* Form Styling */
    .form-control {
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.9rem;
        background-color: var(--bg-white);
        color: var(--text-dark);
        transition: border-color 0.2s ease;
    }

    .form-control:focus {
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.25);
        background-color: var(--bg-white);
        color: var(--text-dark);
    }

    .form-label {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    /* Payment Proof Image */
    .payment-proof-container {
        text-align: center;
        padding: 20px;
    }

    .payment-proof-image {
        border-radius: 15px;
        border: 3px solid var(--border-primary);
        box-shadow: var(--shadow-light);
        transition: transform 0.2s ease;
        max-height: 200px;
    }

    .payment-proof-image:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-medium);
    }

    /* Address Section */
    .address-info {
        background-color: var(--bg-light);
        padding: 20px;
        border-radius: 10px;
        border: 1px solid var(--border-light);
    }

    .address-info p {
        margin-bottom: 8px;
        color: var(--text-secondary);
    }

    .address-info strong {
        color: var(--text-dark);
    }

    /* Total Summary */
    .total-summary {
        background-color: var(--accent-color);
        padding: 20px;
        border-radius: 15px;
        border: 2px solid var(--border-primary);
    }

    .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .order-detail-section {
            padding: 60px 0;
        }

        .card-header,
        .card-body,
        .info-card .card-body {
            padding: 20px !important;
        }

        .card-header h5 {
            font-size: 1.2rem;
        }

        .product-image {
            width: 50px;
            height: 50px;
        }
    }

    @media (max-width: 767.98px) {
        .order-detail-section {
            padding: 50px 0;
        }

        .card-header,
        .card-body,
        .info-card .card-body {
            padding: 15px !important;
        }

        .card-header h5 {
            font-size: 1.1rem;
        }

        .table-responsive {
            font-size: 0.85rem;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 15px;
        }
    }

    @media (max-width: 575.98px) {
        .card-header,
        .card-body,
        .info-card .card-body {
            padding: 12px !important;
        }

        .product-item {
            padding: 10px;
        }

        .total-amount {
            font-size: 1.3rem;
        }
    }
</style>

<div class="order-detail-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">
                            <i class="fas fa-file-alt me-2"></i>Detail Pesanan #{{ $order->order_number }}
                        </h5>
                        <a href="{{ route('account.orders') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <!-- Informasi Pesanan -->
                                <div class="info-card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="fas fa-info-circle me-2"></i>Informasi Pesanan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th width="45%">
                                                    <i class="fas fa-calendar me-1"></i>Tanggal Pesanan
                                                </th>
                                                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-tag me-1"></i>Status
                                                </th>
                                                <td>
                                                    @php
                                                        $statusInfo = $order->status_badge;
                                                    @endphp
                                                    <span class="badge bg-{{ $statusInfo['color'] }}">
                                                        {{ $statusInfo['text'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-money-bill me-1"></i>Total Pembayaran
                                                </th>
                                                <td class="price-text fw-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-credit-card me-1"></i>Metode Pembayaran
                                                </th>
                                                <td>{{ App\Models\Order::PAYMENT_METHODS[$order->payment_method] ?? $order->payment_method }}</td>
                                            </tr>
                                            @if($order->paid_at)
                                            <tr>
                                                <th>
                                                    <i class="fas fa-check-circle me-1"></i>Tanggal Pembayaran
                                                </th>
                                                <td>{{ $order->formatted_paid_at }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>

                                <!-- Alamat Pengiriman -->
                                <div class="info-card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="fas fa-map-marker-alt me-2"></i>Alamat Pengiriman
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="address-info">
                                            <p class="mb-2"><strong>{{ $order->user->name }}</strong></p>
                                            <p class="mb-2">{{ $order->shipping_address }}</p>
                                            <p class="mb-2">
                                                <i class="fas fa-phone me-1"></i>
                                                <strong>Telepon:</strong> {{ $order->phone_number }}
                                            </p>
                                            @if($order->notes)
                                            <hr style="border-color: var(--border-light);">
                                            <p class="mb-0">
                                                <i class="fas fa-sticky-note me-1"></i>
                                                <strong>Catatan:</strong> {{ $order->notes }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Item Pesanan -->
                                <div class="info-card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <i class="fas fa-shopping-cart me-2"></i>Item Pesanan
                                        </h6>
                                        <span class="badge bg-primary">{{ $order->items->count() }} Item</span>
                                    </div>
                                    <div class="card-body">
                                        @foreach($order->items as $item)
                                        <div class="product-item">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                    alt="{{ $item->product->name }}"
                                                    class="product-image me-3">
                                                <div class="flex-grow-1">
                                                    <div class="product-name">{{ $item->product->name }}</div>
                                                    <div class="product-category">{{ $item->product->category->name }}</div>
                                                    <div class="mt-2">
                                                        <span class="price-text">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                                        <span class="text-muted"> × {{ $item->quantity }}</span>
                                                        <span class="price-text fw-bold ms-2">
                                                            = Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="total-summary mt-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-bold">Total Pembayaran:</span>
                                                <span class="total-amount">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notifikasi Reupload -->
                                @if($order->status === 'awaiting_reupload')
                                <div class="alert alert-warning mt-3">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Bukti pembayaran sebelumnya ditolak. Silakan upload ulang bukti pembayaran Anda.
                                </div>
                                @endif

                                <!-- Form Upload Bukti Pembayaran -->
                                @if($order->status === 'pending' && !$order->payment_proof || $order->status === 'awaiting_reupload')
                                <div class="info-card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="fas fa-upload me-2"></i>Upload Bukti Pembayaran
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('order.upload-payment', $order->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="payment_proof" class="form-label">
                                                    <i class="fas fa-file-image me-1"></i>Bukti Transfer
                                                </label>
                                                <input type="file" class="form-control" id="payment_proof" name="payment_proof" accept="image/*" required>
                                                <small class="text-muted">Format: JPEG, PNG, JPG (Max 2MB)</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-upload me-2"></i>Upload Bukti Pembayaran
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                <!-- Bukti Pembayaran -->
                                @if($order->payment_proof && $order->status !== 'awaiting_reupload')
                                <div class="info-card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="fas fa-receipt me-2"></i>Bukti Pembayaran
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="payment-proof-container">
                                            <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $order->payment_proof) }}"
                                                    alt="Bukti Pembayaran"
                                                    class="img-fluid payment-proof-image">
                                            </a>
                                            <p class="mt-3 mb-0 small text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                Diupload pada: {{ $order->updated_at->format('d M Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Aksi Batalkan -->
                        @if($order->status === 'pending')
                        <div class="text-center mt-4">
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-times me-2"></i>Batalkan Pesanan
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Button hover effects
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                if (!this.classList.contains('btn-light')) {
                    this.style.transform = 'translateY(-1px)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Product image hover effect
        const productImages = document.querySelectorAll('.product-image');
        productImages.forEach(img => {
            img.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.2s ease';
            });
            
            img.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Payment proof image hover effect
        const paymentProofImage = document.querySelector('.payment-proof-image');
        if (paymentProofImage) {
            paymentProofImage.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            paymentProofImage.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        }

        // Form enhancement
        const formInputs = document.querySelectorAll('.form-control');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--text-highlight)';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.borderColor = 'var(--border-light)';
                }
            });
        });
    });
</script>
@endsection
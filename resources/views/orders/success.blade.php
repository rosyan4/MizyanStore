@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Mizyan Store')

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
        --success-color: #D39C63 !important;       /* Menggunakan coklat emas sebagai pengganti hijau */
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
    .order-success-section {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .card {
        background-color: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        margin-bottom: 0;
    }

    .card-header {
        background-color: var(--secondary-color) !important;
        color: var(--bg-white) !important;
        padding: 30px;
        border-bottom: none;
        text-align: center;
    }

    .card-header h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .card-body {
        padding: 40px;
    }

    .section-divider {
        background-color: var(--bg-light);
        padding: 30px;
        border-radius: 15px;
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
    }

    .section-divider h5 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-primary);
    }

    /* Success Icon & Message */
    .success-icon {
        text-align: center;
        margin-bottom: 30px;
    }

    .success-icon i {
        color: var(--success-color);
        margin-bottom: 15px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    .success-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 10px;
    }

    .order-number {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 0;
    }

    .order-number strong {
        color: var(--price-color);
        font-weight: 700;
    }

    /* Payment Method Info */
    .payment-method-info {
        background-color: var(--bg-white);
        border-radius: 12px;
        padding: 25px;
        margin: 20px 0;
        box-shadow: var(--shadow-light);
        border: 2px solid var(--border-primary);
        text-align: center;
    }

    .payment-method-info h5 {
        color: var(--secondary-color);
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .payment-method-info p {
        color: var(--text-secondary);
        margin-bottom: 5px;
        font-weight: 600;
    }

    .payment-amount {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        padding: 15px 25px;
        border-radius: 10px;
        margin: 20px 0;
        text-align: center;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .payment-note {
        color: var(--text-muted);
        font-size: 0.9rem;
        font-style: italic;
        margin-top: 15px;
        text-align: center;
    }

    /* QR Code Styling */
    .qr-code-container {
        background-color: var(--bg-white);
        border-radius: 12px;
        padding: 25px;
        margin: 20px 0;
        box-shadow: var(--shadow-light);
        border: 2px solid var(--border-primary);
        text-align: center;
    }

    .qr-code-container img {
        border-radius: 8px;
        box-shadow: var(--shadow-light);
        max-width: 200px;
    }

    /* Upload Section */
    .upload-section p {
        color: var(--text-secondary);
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }

    .upload-form {
        max-width: 500px;
        margin: 0 auto;
    }

    .upload-input-group {
        display: flex;
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--shadow-light);
    }

    .upload-input-group input[type="file"] {
        border: 2px solid var(--border-light);
        padding: 12px 15px;
        font-size: 0.95rem;
        flex: 1;
        border-right: none;
        background-color: var(--bg-white);
        color: var(--text-dark);
        border-radius: 10px 0 0 10px;
    }

    .upload-input-group input[type="file"]:focus {
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 0.2rem rgba(168, 113, 58, 0.25);
        outline: none;
    }

    .upload-btn {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        border: 2px solid var(--secondary-color);
        padding: 12px 20px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
        border-radius: 0 10px 10px 0;
    }

    .upload-btn:hover {
        background-color: var(--text-highlight);
        border-color: var(--text-highlight);
        transform: translateY(-1px);
    }

    .upload-note {
        color: var(--text-muted);
        font-size: 0.85rem;
        text-align: center;
        margin-top: 10px;
    }

    /* Action Buttons */
    .form-actions {
        margin-top: 40px;
        padding-top: 25px;
        border-top: 2px solid var(--border-light);
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1rem;
        color: var(--bg-white);
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary:hover {
        background-color: var(--text-highlight);
        transform: translateY(-1px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
        text-decoration: none;
    }

    .btn-outline-primary {
        background-color: transparent;
        color: var(--secondary-color);
        border: 2px solid var(--border-primary);
        border-radius: 10px;
        padding: 10px 28px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: var(--secondary-color);
        border-color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: var(--shadow-medium);
        text-decoration: none;
    }

    /* Alert Styling - Menggunakan warna coklat emas */
    .alert-success {
        background-color: rgba(211, 156, 99, 0.1);
        border: 1px solid rgba(211, 156, 99, 0.2);
        color: var(--secondary-color);
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 25px;
    }

    .alert-success i {
        color: var(--success-color);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .order-success-section {
            padding: 60px 0;
        }

        .card-header,
        .card-body,
        .section-divider {
            padding: 25px !important;
        }
    }

    @media (max-width: 767.98px) {
        .order-success-section {
            padding: 50px 0;
        }

        .card-header,
        .card-body,
        .section-divider {
            padding: 20px !important;
        }

        .card-header h4 {
            font-size: 1.3rem;
        }

        .section-divider h5 {
            font-size: 1.2rem;
        }

        .success-title {
            font-size: 1.4rem;
        }

        .upload-input-group {
            flex-direction: column;
        }

        .upload-input-group input[type="file"] {
            border-right: 2px solid var(--border-light);
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        .upload-btn {
            border-radius: 0 0 10px 10px;
            min-width: auto;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-primary,
        .btn-outline-primary {
            width: 100%;
            max-width: 280px;
            justify-content: center;
        }
    }

    @media (max-width: 575.98px) {
        .card-header,
        .card-body,
        .section-divider {
            padding: 15px !important;
        }

        .card-header h4 {
            font-size: 1.2rem;
        }

        .section-divider h5 {
            font-size: 1.1rem;
        }

        .success-title {
            font-size: 1.2rem;
        }

        .payment-method-info h5 {
            font-size: 1.2rem;
        }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeInUp 0.6s ease forwards;
    }
</style>

<div class="order-success-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-check-circle me-2"></i>Pesanan Berhasil Dibuat
                        </h4>
                    </div>

                    <div class="card-body">
                        <!-- Success Icon & Message -->
                        <div class="success-icon">
                            <i class="fas fa-shopping-bag fa-5x"></i>
                            <h3 class="success-title">Terima kasih atas pesanan Anda!</h3>
                            <p class="order-number">
                                Nomor pesanan Anda: <strong>{{ $order->order_number }}</strong>
                            </p>
                        </div>

                        <!-- Payment Instructions -->
                        <div class="section-divider">
                            <h5 class="mb-4">
                                <i class="fas fa-credit-card me-2"></i>Instruksi Pembayaran
                            </h5>
                            
                            @if($order->payment_method === 'gopay')
                                <p style="color: var(--text-secondary); margin-bottom: 15px; text-align: center;">Silakan transfer ke nomor GoPay berikut:</p>
                                <div class="payment-method-info">
                                    <h5>0822-3456-7890</h5>
                                </div>
                            
                            @elseif($order->payment_method === 'ovo')
                                <p style="color: var(--text-secondary); margin-bottom: 15px; text-align: center;">Silakan transfer ke nomor OVO berikut:</p>
                                <div class="payment-method-info">
                                    <h5>0812-3456-7890</h5>
                                </div>
                            
                            @elseif($order->payment_method === 'dana')
                                <p style="color: var(--text-secondary); margin-bottom: 15px; text-align: center;">Silakan transfer ke nomor DANA berikut:</p>
                                <div class="payment-method-info">
                                    <h5>0857-3456-7890</h5>
                                </div>
                            
                            @elseif($order->payment_method === 'qris')
                                <p style="color: var(--text-secondary); margin-bottom: 15px; text-align: center;">Silakan scan QRIS berikut:</p>
                                <div class="qr-code-container">
                                    <img src="{{ $paymentInfo['qris'] }}" 
                                         alt="QRIS Payment" 
                                         class="img-fluid">
                                </div>
                            
                            @elseif($order->payment_method === 'bank_transfer')
                                <p style="color: var(--text-secondary); margin-bottom: 15px; text-align: center;">Silakan transfer ke rekening berikut:</p>
                                <div class="payment-method-info">
                                    <h5>{{ $paymentInfo['bank_transfer']['bank_name'] }}</h5>
                                    <p>No. Rekening: <strong>{{ $paymentInfo['bank_transfer']['account_number'] }}</strong></p>
                                    <p>Atas Nama: <strong>{{ $paymentInfo['bank_transfer']['account_name'] }}</strong></p>
                                </div>
                            @endif

                            <div class="payment-amount">
                                Total Pembayaran: Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </div>
                            
                            <p class="payment-note">
                                Gunakan nomor order <strong>{{ $order->order_number }}</strong> sebagai keterangan transfer
                            </p>
                        </div>

                        <!-- Upload Section -->
                        <div class="section-divider">
                            <h5 class="mb-4">
                                <i class="fas fa-upload me-2"></i>Upload Bukti Pembayaran
                            </h5>

                            <p>Setelah melakukan pembayaran, silakan upload bukti transfer untuk mempercepat proses verifikasi.</p>
                            <form action="{{ route('order.upload-payment', $order->id) }}" method="POST" enctype="multipart/form-data" class="upload-form">
                                @csrf
                                <div class="upload-input-group">
                                    <input type="file" name="payment_proof" accept="image/*" required>
                                    <button class="upload-btn" type="submit">
                                        <i class="fas fa-upload me-2"></i>
                                        Upload
                                    </button>
                                </div>
                                <small class="upload-note">Format: JPEG, PNG, JPG (Max 2MB)</small>
                            </form>
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <div class="action-buttons">
                                <a href="{{ route('products.index') }}" class="btn-outline-primary">
                                    <i class="fas fa-shopping-bag me-2"></i>
                                    Belanja Lagi
                                </a>
                                <a href="{{ route('account.order.detail', $order->id) }}" class="btn-primary">
                                    <i class="fas fa-eye me-2"></i>
                                    Lihat Pesanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple form enhancements
    document.addEventListener('DOMContentLoaded', function() {
        const uploadInput = document.querySelector('input[type="file"]');
        const uploadBtn = document.querySelector('.upload-btn');
        const actionBtns = document.querySelectorAll('.btn-primary, .btn-outline-primary');
        
        // Upload input focus enhancement
        if (uploadInput) {
            uploadInput.addEventListener('focus', function() {
                this.style.borderColor = 'var(--text-highlight)';
            });
            
            uploadInput.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.borderColor = 'var(--border-light)';
                }
            });
        }
        
        // Button hover effects
        if (uploadBtn) {
            uploadBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            uploadBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        }

        actionBtns.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Success animation
        const successIcon = document.querySelector('.success-icon i');
        if (successIcon) {
            setTimeout(function() {
                successIcon.style.color = 'var(--success-color)';
            }, 500);
        }
    });
</script>
@endsection
@extends('layouts.app')

@section('title', 'Checkout - Mizyan Store')

@section('content')
<style>
    :root {
        --primary-color: #F8E5BB;
        --secondary-color: #713600;
        --accent-color: #F2E8D5;
        --text-highlight: #A8713A;
        --footer-bg: #4A2C14;
        --price-color: #D39C63;
        --bg-white: #FFFFFF;
        --bg-light: #FDF9F3;
        --text-dark: #713600;
        --text-secondary: #A8713A;
        --text-muted: #8B6F47;
        --text-light: #B8956B;
        --border-light: #F2E8D5;
        --border-primary: #F8E5BB;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --info-color: #17a2b8;
        --danger-color: #dc3545;
        --shadow-light: 0 2px 12px rgba(113, 54, 0, 0.08);
        --shadow-medium: 0 4px 20px rgba(113, 54, 0, 0.12);
        --shadow-heavy: 0 8px 32px rgba(113, 54, 0, 0.16);
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        --gradient-secondary: linear-gradient(135deg, var(--secondary-color) 0%, var(--text-highlight) 100%);
    }

    * {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, var(--bg-light) 0%, #f8f4ee 100%);
        color: var(--text-dark);
        line-height: 1.6;
        min-height: 100vh;
    }

    .checkout-section {
        padding: 40px 0 80px 0;
        min-height: 100vh;
    }

    /* Checkout Container */
    .checkout-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Page Header */
    .page-header {
        background: var(--gradient-secondary);
        border-radius: 20px;
        padding: 30px 35px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-medium);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .page-header h1 {
        color: var(--bg-white);
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 8px 0;
        position: relative;
        z-index: 1;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
        font-size: 1.1rem;
        position: relative;
        z-index: 1;
    }

    /* Section Cards */
    .section-card {
        background: var(--bg-white);
        border-radius: 16px;
        box-shadow: var(--shadow-light);
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
        overflow: hidden;
        position: relative;
    }

    .section-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }

    .section-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-light);
        background: rgba(248, 229, 187, 0.3);
    }

    .section-title {
        display: flex;
        align-items: center;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .section-title i {
        color: var(--price-color);
        margin-right: 12px;
    }

    .section-body {
        padding: 30px;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        color: var(--text-secondary);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-control {
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: var(--bg-white);
        color: var(--text-dark);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(248, 229, 187, 0.25);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: var(--danger-color);
    }

    .invalid-feedback {
        display: block;
        color: var(--danger-color);
        font-size: 0.875rem;
        margin-top: 5px;
    }

    .text-danger {
        color: var(--danger-color) !important;
    }

    /* Payment Methods */
    .payment-methods {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
    }

    .payment-method-item {
        background: var(--bg-white);
        border: 2px solid var(--border-light);
        border-radius: 12px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .payment-method-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(248, 229, 187, 0.1), transparent);
        transition: left 0.5s;
    }

    .payment-method-item:hover {
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: var(--shadow-light);
    }

    .payment-method-item:hover::before {
        left: 100%;
    }

    .payment-method-item.selected {
        border-color: var(--price-color);
        background: rgba(248, 229, 187, 0.1);
        box-shadow: var(--shadow-medium);
    }

    .payment-method-content {
        display: flex;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .payment-method-radio {
        margin-right: 15px;
        width: 20px;
        height: 20px;
        accent-color: var(--price-color);
    }

    .payment-method-label {
        font-weight: 600;
        color: var(--text-secondary);
        margin: 0;
        font-size: 1rem;
    }

    /* Payment Details */
    .payment-details {
        background: var(--gradient-primary);
        border-radius: 12px;
        padding: 25px;
        margin-top: 20px;
        border: 1px solid var(--border-primary);
        position: relative;
        overflow: hidden;
    }

    .payment-details::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50px;
        width: 120px;
        height: 120px;
        background: rgba(113, 54, 0, 0.05);
        border-radius: 50%;
    }

    .payment-details h6 {
        color: var(--secondary-color);
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        z-index: 1;
    }

    .payment-info {
        background: var(--bg-white);
        border-radius: 8px;
        padding: 15px;
        margin: 15px 0;
        border: 1px solid var(--border-light);
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .payment-number {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .qris-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: var(--shadow-light);
    }

    /* Product Display */
    .product-item {
        display: flex;
        align-items: center;
        padding: 20px 0;
        border-bottom: 1px solid var(--border-light);
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 12px;
        margin-right: 20px;
        box-shadow: var(--shadow-light);
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 5px 0;
        font-size: 1.1rem;
    }

    .product-category {
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    .product-price {
        font-weight: 600;
        color: var(--price-color);
        font-size: 1rem;
    }

    .product-quantity {
        color: var(--text-secondary);
        font-weight: 600;
    }

    .product-subtotal {
        font-weight: 700;
        color: var(--secondary-color);
        font-size: 1.1rem;
    }

    /* Summary Section */
    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--border-light);
    }

    .summary-item:last-child {
        border-bottom: none;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--secondary-color);
        padding-top: 20px;
        margin-top: 10px;
        border-top: 2px solid var(--border-primary);
    }

    .summary-total {
        color: var(--price-color) !important;
        font-size: 1.3rem !important;
    }

    /* Custom Button */
    .btn-mizyan {
        padding: 15px 30px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .btn-mizyan::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
        z-index: 1;
    }

    .btn-mizyan:hover::before {
        left: 100%;
    }

    .btn-mizyan i,
    .btn-mizyan span {
        position: relative;
        z-index: 2;
    }

    .btn-primary {
        background: var(--gradient-secondary);
        color: var(--bg-white);
        box-shadow: var(--shadow-medium);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--text-highlight) 0%, var(--secondary-color) 100%);
        transform: translateY(-3px);
        box-shadow: var(--shadow-heavy);
        color: var(--bg-white);
    }

    /* Disclaimer */
    .disclaimer {
        text-align: center;
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-top: 15px;
        font-style: italic;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .checkout-container {
            padding: 0 15px;
        }
        
        .payment-methods {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }

    @media (max-width: 768px) {
        .checkout-section {
            padding: 20px 0 60px 0;
        }

        .page-header {
            padding: 25px 20px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 1.6rem;
        }

        .section-body {
            padding: 20px;
        }

        .product-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            text-align: left;
        }

        .product-image {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .product-details {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        .page-header h1 {
            font-size: 1.4rem;
        }

        .payment-method-item {
            padding: 15px;
        }

        .product-details {
            grid-template-columns: 1fr;
        }
    }

    /* Loading Animation */
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

    .section-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .section-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .section-card:nth-child(3) {
        animation-delay: 0.2s;
    }

    .section-card:nth-child(4) {
        animation-delay: 0.3s;
    }
</style>

<div class="checkout-section">
    <div class="checkout-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>
                <i class="fas fa-shopping-cart me-3"></i>
                Checkout Pesanan
            </h1>
            <p>Lengkapi informasi pengiriman dan pembayaran untuk menyelesaikan pesanan Anda</p>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <form id="orderForm" action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="products[0][id]" value="{{ $product->id }}">
                    <input type="hidden" name="products[0][quantity]" value="{{ request('quantity', 1) }}">

                    <!-- Informasi Pengiriman -->
                    <div class="section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-shipping-fast"></i>
                                Informasi Pengiriman
                            </h5>
                        </div>
                        <div class="section-body">
                            <div class="mb-4">
                                <label for="shipping_address" class="form-label">
                                    Alamat Pengiriman <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('shipping_address') is-invalid @enderror" 
                                          id="shipping_address" 
                                          name="shipping_address" 
                                          rows="4" 
                                          placeholder="Masukkan alamat lengkap untuk pengiriman"
                                          required>{{ old('shipping_address', auth()->user()->address ?? '') }}</textarea>
                                @error('shipping_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone_number" class="form-label">
                                    Nomor Telepon/WhatsApp <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('phone_number') is-invalid @enderror" 
                                       id="phone_number" 
                                       name="phone_number" 
                                       placeholder="Contoh: 081234567890"
                                       value="{{ old('phone_number', auth()->user()->phone ?? '') }}" 
                                       required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <label for="notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" 
                                          id="notes" 
                                          name="notes" 
                                          rows="3"
                                          placeholder="Tambahkan catatan khusus untuk pesanan Anda (opsional)">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-credit-card"></i>
                                Metode Pembayaran
                            </h5>
                        </div>
                        <div class="section-body">
                            <label class="form-label">
                                Pilih Metode Pembayaran <span class="text-danger">*</span>
                            </label>
                            
                            <div class="payment-methods">
                                @foreach([
                                    'gopay' => ['name' => 'GoPay', 'icon' => 'fab fa-google-pay'],
                                    'ovo' => ['name' => 'OVO', 'icon' => 'fas fa-wallet'],
                                    'dana' => ['name' => 'DANA', 'icon' => 'fas fa-mobile-alt'],
                                    'qris' => ['name' => 'QRIS', 'icon' => 'fas fa-qrcode']
                                ] as $key => $method)
                                    <div class="payment-method-item" data-method="{{ $key }}">
                                        <div class="payment-method-content">
                                            <input class="payment-method-radio" 
                                                   type="radio" 
                                                   name="payment_method" 
                                                   value="{{ $key }}"
                                                   id="payment_{{ $key }}"
                                                   {{ old('payment_method') == $key ? 'checked' : '' }}
                                                   required>
                                            <div>
                                                <i class="{{ $method['icon'] }} me-2" style="color: var(--price-color);"></i>
                                                <span class="payment-method-label">{{ $method['name'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @error('payment_method')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror

                            <!-- Payment Details -->
                            <div id="paymentDetails" class="payment-details" style="display: none;">
                                <h6>
                                    <i class="fas fa-info-circle me-2"></i>
                                    Instruksi Pembayaran
                                </h6>

                                <div id="gopayDetails" class="payment-method-details">
                                    <p class="mb-3">Silakan transfer ke nomor GoPay berikut:</p>
                                    <div class="payment-info">
                                        <p class="payment-number">0822-3456-7890</p>
                                    </div>
                                    <p class="small text-muted mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Gunakan nomor order sebagai keterangan transfer
                                    </p>
                                </div>

                                <div id="ovoDetails" class="payment-method-details">
                                    <p class="mb-3">Silakan transfer ke nomor OVO berikut:</p>
                                    <div class="payment-info">
                                        <p class="payment-number">0812-3456-7890</p>
                                    </div>
                                    <p class="small text-muted mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Gunakan nomor order sebagai keterangan transfer
                                    </p>
                                </div>

                                <div id="danaDetails" class="payment-method-details">
                                    <p class="mb-3">Silakan transfer ke nomor DANA berikut:</p>
                                    <div class="payment-info">
                                        <p class="payment-number">0857-3456-7890</p>
                                    </div>
                                    <p class="small text-muted mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Gunakan nomor order sebagai keterangan transfer
                                    </p>
                                </div>

                                <div id="qrisDetails" class="payment-method-details">
                                    <p class="mb-3">Silakan scan QRIS berikut untuk pembayaran:</p>
                                    <div class="payment-info">
                                        <img src="{{ asset('storage/payment/qris.png') }}" 
                                             alt="QRIS Payment" 
                                             class="qris-image">
                                    </div>
                                    <p class="small text-muted mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Gunakan nomor order sebagai keterangan transfer
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn-mizyan btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>
                        <span>Buat Pesanan Sekarang</span>
                    </button>

                    <p class="disclaimer">
                        <i class="fas fa-shield-alt me-1"></i>
                        Dengan melanjutkan, Anda menyetujui Syarat & Ketentuan kami
                    </p>
                </form>
            </div>

            <div class="col-lg-4">
                <!-- Detail Pesanan -->
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="fas fa-receipt"></i>
                            Detail Pesanan
                        </h5>
                    </div>
                    <div class="section-body">
                        <div class="product-item">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="product-image">
                            <div class="product-info">
                                <h6 class="product-name">{{ $product->name }}</h6>
                                <p class="product-category">{{ $product->category->name }}</p>
                                <div class="product-details">
                                    <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                                    <div class="product-quantity">Qty: {{ request('quantity', 1) }}</div>
                                    <div class="product-subtotal">Rp {{ number_format($product->price * request('quantity', 1), 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Pembayaran -->
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="fas fa-calculator"></i>
                            Ringkasan Pembayaran
                        </h5>
                    </div>
                    <div class="section-body">
                        <div class="summary-item">
                            <span>Subtotal Produk</span>
                            <span>Rp {{ number_format($product->price * request('quantity', 1), 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-item">
                            <span>Ongkos Kirim</span>
                            <span class="text-success">
                                <i class="fas fa-gift me-1"></i>
                                Gratis
                            </span>
                        </div>
                        <div class="summary-item">
                            <span>Total Pembayaran</span>
                            <span class="summary-total">Rp {{ number_format($product->price * request('quantity', 1), 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethods = document.querySelectorAll('.payment-method-radio');
        const paymentDetails = document.getElementById('paymentDetails');
        const allMethodDetails = document.querySelectorAll('.payment-method-details');
        const paymentItems = document.querySelectorAll('.payment-method-item');

        function showPaymentDetails(method) {
            // Hide all method details
            allMethodDetails.forEach(detail => detail.style.display = 'none');
            
            // Show payment details container
            paymentDetails.style.display = 'block';

            // Show specific method details
            const methodId = method + 'Details';
            const methodElement = document.getElementById(methodId);
            if (methodElement) {
                methodElement.style.display = 'block';
            }
        }

        function updatePaymentItemStyles() {
            paymentItems.forEach(item => {
                const radio = item.querySelector('.payment-method-radio');
                if (radio.checked) {
                    item.classList.add('selected');
                } else {
                    item.classList.remove('selected');
                }
            });
        }

        // Handle payment method selection
        paymentMethods.forEach(method => {
            // Check if already selected on page load
            if (method.checked) {
                showPaymentDetails(method.value);
                updatePaymentItemStyles();
            }

            // Handle change event
            method.addEventListener('change', function() {
                if (this.checked) {
                    showPaymentDetails(this.value);
                    updatePaymentItemStyles();
                }
            });
        });

        // Handle clicking on payment method items
        paymentItems.forEach(item => {
            item.addEventListener('click', function() {
                const radio = this.querySelector('.payment-method-radio');
                radio.checked = true;
                radio.dispatchEvent(new Event('change'));
            });
        });

        // Form validation enhancement
        const form = document.getElementById('orderForm');
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll to first invalid field
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
            }
        });
    });
</script>
@endsection
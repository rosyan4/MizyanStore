@extends('layouts.app')

@section('title', $product->name . ' - Mizyan Store')

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
        --shadow-light: 0 4px 20px rgba(248, 229, 187, 0.15);
        --shadow-medium: 0 8px 30px rgba(248, 229, 187, 0.25);
        --shadow-heavy: 0 15px 40px rgba(248, 229, 187, 0.3);
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --success-color: #22C55E;
        --danger-color: #EF4444;
    }

    * {
        font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Product Detail Section */
    .product-detail-section {
        padding: 40px 0 80px 0;
        background-color: var(--bg-light);
    }

    /* Product Container */
    .product-container {
        background: var(--bg-white);
        border-radius: 25px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-medium);
        padding: 40px;
        margin-bottom: 40px;
        overflow: hidden;
        position: relative;
    }

    /* Product Layout */
    .product-layout {
        display: grid;
        grid-template-columns: 400px 1fr;
        gap: 40px;
        align-items: start;
        margin-bottom: 30px;
    }

    .product-image-section {
        position: sticky;
        top: 30px;
    }

    .main-image-container {
        position: relative;
        margin-bottom: 20px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-medium);
        transition: var(--transition-smooth);
    }

    .main-image-container:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-heavy);
    }

    .main-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: var(--transition-smooth);
    }

    /* Thumbnail Images */
    .thumbnail-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .thumbnail-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid var(--border-light);
        cursor: pointer;
        transition: var(--transition-smooth);
        opacity: 0.8;
    }

    .thumbnail-image:hover,
    .thumbnail-image.active {
        border-color: var(--text-highlight);
        opacity: 1;
        transform: scale(1.05);
        box-shadow: var(--shadow-light);
    }

    /* Product Info Section */
    .product-info-section {
        min-width: 0;
    }

    .product-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 2.2rem;
        line-height: 1.2;
        margin-bottom: 20px;
        letter-spacing: -0.01em;
    }

    .product-badges {
        margin-bottom: 25px;
    }

    .badge-custom {
        background: var(--text-highlight);
        color: var(--bg-white);
        padding: 8px 16px;
        border-radius: 16px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-right: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: var(--shadow-light);
        transition: var(--transition-smooth);
    }

    .badge-featured {
        background: var(--secondary-color);
        color: var(--bg-white);
    }

    .badge-custom:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .product-price {
        color: var(--price-color);
        font-weight: 700;
        font-size: 2rem;
        text-shadow: 0 2px 4px rgba(211, 156, 99, 0.1);
        margin-bottom: 20px;
    }

    /* Stock and Quantity Container */
    .stock-quantity-container {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 25px;
    }

    /* Stock Info */
    .stock-info {
        background: var(--accent-color);
        border-radius: 16px;
        padding: 12px 18px;
        border: 1px solid var(--border-primary);
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stock-label {
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.9rem;
        margin: 0;
    }

    .stock-available {
        color: var(--success-color);
        font-weight: 700;
        font-size: 0.95rem;
    }

    .stock-unavailable {
        color: var(--danger-color);
        font-weight: 700;
        font-size: 0.95rem;
    }

    /* Quantity Controls */
    .quantity-container {
        flex: 1;
        max-width: 200px;
    }

    .quantity-wrapper {
        display: flex;
        align-items: center;
        background: var(--bg-white);
        border: 2px solid var(--border-light);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow-light);
        max-width: 180px;
        transition: var(--transition-smooth);
    }

    .quantity-wrapper:focus-within {
        border-color: var(--text-highlight);
        box-shadow: var(--shadow-medium);
    }

    .quantity-btn {
        background: var(--accent-color);
        border: none;
        color: var(--text-secondary);
        font-weight: 700;
        font-size: 1.1rem;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition-smooth);
    }

    .quantity-btn:hover {
        background: var(--text-highlight);
        color: var(--bg-white);
    }

    .quantity-input {
        border: none;
        text-align: center;
        font-weight: 600;
        font-size: 1rem;
        width: 90px;
        height: 45px;
        background: transparent;
        color: var(--text-dark);
    }

    .quantity-input:focus {
        outline: none;
    }

    /* Action Buttons */
    .action-buttons {
        margin-bottom: 30px;
    }

    .btn-buy-now {
        background: linear-gradient(135deg, var(--text-highlight), var(--secondary-color));
        color: var(--bg-white);
        border: none;
        padding: 15px 35px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.05rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: var(--shadow-medium);
        transition: var(--transition-smooth);
        text-decoration: none;
    }

    .btn-buy-now:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-heavy);
        color: var(--bg-white);
    }

    .btn-out-of-stock {
        background: var(--border-light);
        color: var(--text-muted);
        border: none;
        padding: 15px 35px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 1.05rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: not-allowed;
    }

    /* Description Card */
    .description-card {
        background: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        transition: var(--transition-smooth);
    }

    .description-card:hover {
        box-shadow: var(--shadow-medium);
    }

    .description-header {
        background: var(--accent-color);
        padding: 18px 25px;
        border-bottom: 1px solid var(--border-primary);
    }

    .description-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .description-body {
        padding: 25px;
        color: var(--text-dark);
        font-size: 0.95rem;
        line-height: 1.7;
    }

    /* Product Divider */
    .product-divider {
        border: none;
        height: 3px;
        background-color: var(--border-primary);
        margin: 60px 0;
        border-radius: 2px;
    }

    /* Related Products Section */
    .related-products-section {
        background: var(--bg-white);
        border-radius: 25px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-medium);
        padding: 40px;
        position: relative;
    }

    .related-products-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background-color: var(--text-highlight);
        border-radius: 25px 25px 0 0;
    }

    .related-products-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 35px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .related-products-title i {
        color: var(--text-highlight);
        font-size: 1.8rem;
    }

    /* Related Products Grid */
    .related-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        max-width: 100%;
    }

    @media (min-width: 1200px) {
        .related-products-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
        .related-products-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .related-products-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .related-products-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Rating System Styles */
    .product-rating-summary {
        background: var(--accent-color);
        border-radius: 16px;
        padding: 15px 20px;
        margin-bottom: 20px;
        border: 1px solid var(--border-primary);
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: var(--transition-smooth);
    }

    .product-rating-summary:hover {
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .rating-stars {
        display: flex;
        align-items: center;
        gap: 3px;
    }

    .rating-stars .star {
        color: #FFD700;
        font-size: 1.1rem;
        text-shadow: 0 1px 2px rgba(255, 215, 0, 0.3);
    }

    .rating-stars .star.empty {
        color: var(--border-light);
    }

    .rating-number {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.1rem;
    }

    .rating-count {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Rating Form Styles */
    .rating-form {
        background: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        padding: 25px;
        margin-top: 30px;
        transition: var(--transition-smooth);
    }

    .rating-form:hover {
        box-shadow: var(--shadow-medium);
    }

    .rating-form h5 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .rating-form h5::before {
        content: "⭐";
        font-size: 1.2rem;
    }

    .rating-form .form-group {
        margin-bottom: 20px;
    }

    .rating-form label {
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 8px;
        display: block;
    }

    .rating-form select,
    .rating-form textarea {
        border: 2px solid var(--border-light);
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 0.9rem;
        color: var(--text-dark);
        background: var(--bg-white);
        transition: var(--transition-smooth);
        width: 100%;
        font-family: inherit;
    }

    .rating-form select:focus,
    .rating-form textarea:focus {
        outline: none;
        border-color: var(--text-highlight);
        box-shadow: 0 0 0 3px rgba(168, 113, 58, 0.1);
    }

    .rating-form select {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23A8713A' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 40px;
        appearance: none;
    }

    .rating-form textarea {
        resize: vertical;
        min-height: 80px;
    }

    .rating-form textarea::placeholder {
        color: var(--text-light);
    }

    .rating-form .btn {
        background: linear-gradient(135deg, var(--text-highlight), var(--secondary-color));
        color: var(--bg-white);
        border: none;
        padding: 12px 30px;
        border-radius: 16px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-light);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .rating-form .btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        color: var(--bg-white);
    }

    .rating-form .btn::before {
        content: "📝";
        font-size: 0.9rem;
    }

    /* Alert Styles */
    .alert {
        border-radius: 16px;
        border: none;
        padding: 15px 20px;
        margin-top: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        box-shadow: var(--shadow-light);
    }

    .alert-warning {
        background: linear-gradient(135deg, #FEF3C7, #FBBF24);
        color: #92400E;
        border-left: 4px solid #F59E0B;
    }

    .alert-warning::before {
        content: "⚠️ ";
        margin-right: 8px;
    }

    /* Review List Styles */
    .review-list {
        margin-top: 40px;
    }

    .review-list h5 {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .review-list h5::before {
        content: "💬";
        font-size: 1.2rem;
    }

    .review-item {
        background: var(--bg-white);
        border: 1px solid var(--border-light) !important;
        border-radius: 16px !important;
        padding: 20px !important;
        margin-bottom: 20px !important;
        box-shadow: var(--shadow-light);
        transition: var(--transition-smooth);
        position: relative;
    }

    .review-item:hover {
        box-shadow: var(--shadow-medium);
        transform: translateY(-2px);
    }

    .review-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--text-highlight), var(--secondary-color));
        border-radius: 16px 16px 0 0;
    }

    .review-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .review-user {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .review-user::before {
        content: "👤";
        font-size: 0.9rem;
    }

    .review-rating {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--accent-color);
        padding: 6px 12px;
        border-radius: 12px;
        border: 1px solid var(--border-primary);
    }

    .review-rating-stars {
        display: flex;
        gap: 2px;
    }

    .review-rating-stars .star {
        color: #FFD700;
        font-size: 0.9rem;
        text-shadow: 0 1px 2px rgba(255, 215, 0, 0.3);
    }

    .review-rating-stars .star.empty {
        color: var(--border-light);
    }

    .review-rating-number {
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.85rem;
    }

    .review-comment {
        color: var(--text-dark);
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
        padding-top: 10px;
        border-top: 1px solid var(--border-light);
    }

    .review-date {
        color: var(--text-light);
        font-size: 0.8rem;
        margin-top: 10px;
        font-style: italic;
    }

    /* Interactive Rating Stars */
    .interactive-rating {
        display: flex;
        gap: 5px;
        margin: 10px 0;
    }

    .interactive-rating .star {
        font-size: 1.5rem;
        color: var(--border-light);
        cursor: pointer;
        transition: var(--transition-smooth);
        user-select: none;
    }

    .interactive-rating .star:hover,
    .interactive-rating .star.active {
        color: #FFD700;
        text-shadow: 0 2px 4px rgba(255, 215, 0, 0.4);
        transform: scale(1.1);
    }

    .interactive-rating .star:hover ~ .star {
        color: var(--border-light);
    }

    /* No Reviews State */
    .no-reviews {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-light);
        font-style: italic;
    }

    .no-reviews::before {
        content: "📝";
        font-size: 2rem;
        display: block;
        margin-bottom: 10px;
    }

    /* Responsive Design for Rating System */
    @media (max-width: 767.98px) {
        .product-rating-summary {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            padding: 15px;
        }
        
        .rating-form {
            padding: 20px;
            margin-top: 25px;
        }
        
        .rating-form h5 {
            font-size: 1.2rem;
        }
        
        .review-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        
        .review-item {
            padding: 15px !important;
        }
        
        .interactive-rating .star {
            font-size: 1.3rem;
        }
    }

    /* Product Cards */
    .product-card {
        background: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        transition: var(--transition-smooth);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-heavy);
        border-color: var(--border-primary);
    }

    .product-card-image {
        position: relative;
        overflow: hidden;
        height: 180px;
    }

    .product-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-smooth);
    }

    .product-card:hover .product-card-image img {
        transform: scale(1.1);
    }

    .product-card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card-title {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.05rem;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .product-card-title:hover {
        color: var(--text-highlight);
    }

    .product-card-price {
        color: var(--price-color);
        font-weight: 700;
        font-size: 1.2rem;
        margin-top: auto;
    }

    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .product-layout {
            grid-template-columns: 350px 1fr;
            gap: 35px;
        }
        
        .main-image {
            height: 350px;
        }
    }

    @media (max-width: 991.98px) {
        .product-layout {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .product-image-section {
            position: static;
        }

        .main-image {
            height: 320px;
        }

        .product-container,
        .related-products-section {
            padding: 35px;
        }

        .product-title {
            font-size: 2rem;
        }

        .product-price {
            font-size: 1.8rem;
        }

        .related-products-title {
            font-size: 1.8rem;
        }

        .stock-quantity-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .quantity-container {
            max-width: 100%;
        }
    }

    @media (max-width: 767.98px) {
        .product-detail-section {
            padding: 30px 0 60px 0;
        }

        .product-container,
        .related-products-section {
            padding: 25px;
        }

        .product-title {
            font-size: 1.8rem;
        }

        .product-price {
            font-size: 1.6rem;
        }

        .main-image {
            height: 280px;
        }

        .product-badges {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }

        .related-products-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    @media (max-width: 575.98px) {
        .product-container,
        .related-products-section {
            padding: 20px;
        }

        .product-title {
            font-size: 1.6rem;
        }

        .product-price {
            font-size: 1.4rem;
        }

        .related-products-title {
            font-size: 1.6rem;
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .main-image {
            height: 240px;
        }

        .product-card-body {
            padding: 18px;
        }

        .stock-info {
            padding: 10px 14px;
        }

        .stock-label {
            font-size: 0.85rem;
        }

        .stock-available,
        .stock-unavailable {
            font-size: 0.9rem;
        }
    }

    /* Animation Classes */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
</style>

<section class="product-detail-section">
    <div class="container">
        <!-- Main Product -->
        <div class="product-container fade-in">
            <div class="product-layout">
                <!-- Product Images -->
                <div class="product-image-section">
                    <div class="main-image-container">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="main-image" 
                             alt="{{ $product->name }}" 
                             id="mainImage"
                             loading="lazy">
                    </div>

                    @if(count($product->additional_images_urls) > 0)
                        <div class="thumbnail-container">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="thumbnail-image active" 
                                 onclick="changeMainImage('{{ asset('storage/' . $product->image) }}', this)">
                            @foreach($product->additional_images_urls as $image)
                                <img src="{{ $image }}" 
                                     class="thumbnail-image" 
                                     onclick="changeMainImage('{{ $image }}', this)">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="product-info-section">
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <!-- Rating Summary -->
                    @if($product->ratings->count() > 0)
                        <div class="product-rating-summary">
                            <strong>Rating: {{ number_format($product->ratings->avg('rating'), 1) }} / 5</strong>
                            ({{ $product->ratings->count() }} ulasan)
                        </div>
                    @endif

                    <div class="product-badges">
                        <span class="badge-custom">
                            <i class="fas fa-tag"></i>
                            {{ $product->category->name }}
                        </span>
                        @if($product->is_featured)
                            <span class="badge-custom badge-featured">
                                <i class="fas fa-star"></i>
                                Unggulan
                            </span>
                        @endif
                    </div>

                    <div class="product-price">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <div class="stock-quantity-container">
                        <div class="stock-info">
                            <i class="fas fa-box"></i>
                            <span class="stock-label">Stok:</span>
                            @if($product->stock > 0)
                                <span class="stock-available">{{ $product->stock }} unit</span>
                            @else
                                <span class="stock-unavailable">Habis</span>
                            @endif
                        </div>

                        @if($product->stock > 0)
                            <div class="quantity-container">
                                <div class="quantity-wrapper">
                                    <button class="quantity-btn" type="button" onclick="decreaseQuantity()">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" 
                                           class="quantity-input" 
                                           name="quantity" 
                                           id="quantity" 
                                           value="1" 
                                           min="1" 
                                           max="{{ $product->stock }}">
                                    <button class="quantity-btn" type="button" onclick="increaseQuantity({{ $product->stock }})">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($product->stock > 0)
                        <form action="{{ route('orders.create') }}" method="GET">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
                            <div class="action-buttons">
                                <button type="submit" class="btn-buy-now">
                                    <i class="fas fa-shopping-cart"></i>
                                    Beli Sekarang
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="action-buttons">
                            <button class="btn-out-of-stock" disabled>
                                <i class="fas fa-times-circle"></i>
                                Stok Habis
                            </button>
                        </div>
                    @endif

                    <div class="description-card">
                        <div class="description-header">
                            <h5 class="description-title">
                                <i class="fas fa-info-circle"></i>
                                Deskripsi Produk
                            </h5>
                        </div>
                        <div class="description-body">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>

                    <!-- Form Rating (jika login) -->
                    @auth
                        @if($canReview)
                            <div class="rating-form mt-4">
                                <h5>Berikan Penilaian Anda</h5>
                                <form action="{{ route('products.rate', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Rating:</label>
                                        <select name="rating" required class="form-control w-25">
                                            <option value="">Pilih Rating</option>
                                            @for($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}">{{ $i }} Bintang</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="comment">Komentar (opsional):</label>
                                        <textarea name="comment" rows="3" class="form-control" placeholder="Tulis komentar..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-warning mt-4">
                                Anda hanya bisa memberikan ulasan jika sudah membeli dan menyelesaikan pesanan produk ini.
                            </div>
                        @endif
                    @endauth

                    <!-- Daftar Ulasan -->
                    @if($product->ratings->count() > 0)
                        <div class="review-list mt-5">
                            <h5>Ulasan Pengguna</h5>
                            @foreach($product->ratings as $review)
                                <div class="review-item border p-3 rounded mb-3">
                                    <strong>{{ $review->user->name }}</strong> 
                                    <span class="text-muted">({{ $review->rating }} / 5)</span>
                                    @if($review->comment)
                                        <p class="mb-0">{{ $review->comment }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(count($relatedProducts) > 0)
            <hr class="product-divider">
            <div class="related-products-section fade-in stagger-2">
                <h3 class="related-products-title">
                    <i class="fas fa-cubes"></i>
                    Produk Terkait
                </h3>
                <div class="related-products-grid">
                    @foreach($relatedProducts as $index => $related)
                        <div class="product-card fade-in stagger-{{ min($index + 1, 3) }}">
                            <div class="product-card-image">
                                <a href="{{ route('products.show', $related->slug) }}">
                                    <img src="{{ asset('storage/' . $related->image) }}" 
                                         alt="{{ $related->name }}"
                                         loading="lazy">
                                </a>
                            </div>
                            <div class="product-card-body">
                                <h5 class="product-card-title">
                                    <a href="{{ route('products.show', $related->slug) }}">
                                        {{ Str::limit($related->name, 40) }}
                                    </a>
                                </h5>
                                <div class="product-card-price">
                                    Rp {{ number_format($related->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced card animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe fade-in elements
    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    // Lazy loading for images
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.src;
        });
    }
});

function changeMainImage(src, thumbnail) {
    document.getElementById('mainImage').src = src;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-image').forEach(img => {
        img.classList.remove('active');
    });
    if (thumbnail) {
        thumbnail.classList.add('active');
    }
}

function increaseQuantity(max) {
    const quantityInput = document.getElementById('quantity');
    const hiddenQuantity = document.getElementById('hiddenQuantity');
    let value = parseInt(quantityInput.value);
    if (value < max) {
        quantityInput.value = value + 1;
        if (hiddenQuantity) {
            hiddenQuantity.value = value + 1;
        }
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const hiddenQuantity = document.getElementById('hiddenQuantity');
    let value = parseInt(quantityInput.value);
    if (value > 1) {
        quantityInput.value = value - 1;
        if (hiddenQuantity) {
            hiddenQuantity.value = value - 1;
        }
    }
}

// Sync quantity input with hidden field
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const hiddenQuantity = document.getElementById('hiddenQuantity');
    
    if (quantityInput && hiddenQuantity) {
        quantityInput.addEventListener('input', function() {
            hiddenQuantity.value = this.value;
        });
    }
});
</script>
@endsection
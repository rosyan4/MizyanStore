@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<style>
    /* Scoped styles untuk halaman kontak saja */
    .contact-page {
        --primary-color: #F8E5BB;
        --secondary-color: #713600;
        --accent-color: #F2E8D5;
        --text-highlight: #A8713A;
        --price-color: #D39C63;
        --bg-white: #FFFFFF;
        --bg-light: #FDF9F3;
        --text-dark: #713600;
        --text-secondary: #A8713A;
        --text-muted: #8B6F47;
        --text-light: #B8956B;
        --border-light: #F2E8D5;
        --border-primary: #F8E5BB;
        font-family: 'Poppins', 'Inter', 'Segoe UI', sans-serif;
    }

    .contact-page {
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Hero Section */
    .contact-hero {
        background: linear-gradient(135deg, var(--secondary-color) 0%, #5a2b00 100%);
        padding: 80px 0;
        color: var(--bg-white);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(248, 229, 187, 0.1) 0%, transparent 50%);
        z-index: 1;
    }

    .contact-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .contact-hero-badge {
        background: rgba(248, 229, 187, 0.2);
        border: 1px solid rgba(248, 229, 187, 0.3);
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 20px;
    }

    .contact-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        letter-spacing: -0.02em;
    }

    .contact-hero-line {
        width: 60px;
        height: 3px;
        background: var(--price-color);
        margin: 0 auto 25px;
        border-radius: 2px;
    }

    .contact-hero p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
        line-height: 1.6;
    }

    /* Main Content */
    .contact-content {
        padding: 60px 0;
    }

    /* Info Cards */
    .contact-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .contact-info-item {
        background: var(--bg-white);
        border-radius: 15px;
        padding: 35px 25px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(113, 54, 0, 0.08);
        border: 1px solid var(--border-light);
        position: relative;
    }

    .contact-info-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--price-color);
        border-radius: 15px 15px 0 0;
    }

    .contact-icon-wrapper {
        width: 70px;
        height: 70px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 3px 15px rgba(248, 229, 187, 0.3);
    }

    .contact-icon-wrapper i {
        font-size: 1.8rem;
        color: var(--secondary-color);
    }

    .contact-info-item h4 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 15px;
    }

    .contact-info-item p {
        color: var(--text-muted);
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .contact-info-item a {
        color: var(--text-highlight);
        text-decoration: none;
        font-weight: 500;
    }

    .contact-info-item a:hover {
        color: var(--secondary-color);
    }

    .contact-info-item small {
        color: var(--text-light);
        font-style: italic;
    }

    .contact-badge {
        background: var(--text-highlight);
        color: var(--bg-white);
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
        margin-top: 8px;
    }

    /* Content Grid */
    .contact-main-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: start;
    }

    /* Working Hours */
    .working-hours {
        background: var(--bg-white);
        border-radius: 15px;
        padding: 35px;
        box-shadow: 0 5px 20px rgba(113, 54, 0, 0.08);
        border: 1px solid var(--border-light);
        margin-bottom: 30px;
    }

    .working-hours h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--border-primary);
        text-align: center;
    }

    .hours-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--border-light);
    }

    .hours-item:last-child {
        border-bottom: none;
    }

    .hours-day {
        color: var(--text-muted);
        font-weight: 500;
    }

    .hours-time {
        color: var(--text-highlight);
        font-weight: 600;
    }

    .hours-highlight {
        background: rgba(248, 229, 187, 0.1);
        margin: 0 -10px;
        padding: 12px 10px;
        border-radius: 8px;
    }

    /* Map */
    .map-wrapper {
        background: var(--bg-white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(113, 54, 0, 0.08);
        border: 1px solid var(--border-light);
    }

    .map-header {
        background: var(--bg-white);
        padding: 20px;
        border-bottom: 2px solid var(--border-primary);
        text-align: center;
    }

    .map-header h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .map-container {
        height: 350px;
        width: 100%;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Contact Form */
    .contact-form-wrapper {
        background: var(--bg-white);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(113, 54, 0, 0.08);
        border: 1px solid var(--border-light);
    }

    .contact-form-wrapper h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--border-primary);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-input {
        width: 100%;
        background: var(--bg-light);
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 1rem;
        color: var(--text-dark);
        box-sizing: border-box;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        background: var(--bg-white);
    }

    .form-input::placeholder {
        color: var(--text-light);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .optional {
        color: var(--text-light);
        font-weight: 400;
        font-size: 0.85rem;
    }

    /* Button */
    .btn-contact {
        background: var(--primary-color);
        color: var(--secondary-color);
        border: 2px solid var(--primary-color);
        padding: 14px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        cursor: pointer;
        box-shadow: 0 3px 15px rgba(248, 229, 187, 0.3);
    }

    .btn-contact:hover {
        background: var(--text-highlight);
        color: var(--bg-white);
        border-color: var(--text-highlight);
    }

    /* Alerts */
    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: none;
    }

    .alert-success {
        background: rgba(168, 113, 58, 0.1);
        color: var(--text-highlight);
        border: 1px solid rgba(168, 113, 58, 0.2);
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.2);
    }

    .alert-info {
        background: rgba(13, 202, 240, 0.1);
        color: #0dcaf0;
        border: 1px solid rgba(13, 202, 240, 0.2);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
        display: block;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    /* Admin Replies */
    .admin-replies {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 2px solid var(--border-primary);
    }

    .replies-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 20px;
    }

    .reply-item {
        background: var(--bg-light);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        border: 1px solid var(--border-light);
    }

    .reply-item.unread {
        border-left: 4px solid var(--price-color);
        background: rgba(248, 229, 187, 0.05);
    }

    .reply-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border-light);
    }

    .reply-subject {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin: 0;
    }

    .reply-date {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .original-message {
        color: var(--text-muted);
        font-style: italic;
        margin-bottom: 15px;
        padding: 12px;
        background: rgba(242, 232, 213, 0.3);
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .admin-response {
        background: var(--bg-white);
        padding: 15px;
        border-radius: 8px;
        border-left: 3px solid var(--text-highlight);
    }

    .admin-info {
        color: var(--text-highlight);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .admin-message {
        color: var(--text-dark);
        margin: 0;
        line-height: 1.5;
    }

    .reply-actions {
        margin-top: 15px;
        text-align: right;
    }

    .btn-small {
        padding: 6px 12px;
        font-size: 0.85rem;
        border-radius: 6px;
        border: 1px solid var(--text-highlight);
        background: transparent;
        color: var(--text-highlight);
        cursor: pointer;
    }

    .btn-small:hover {
        background: var(--text-highlight);
        color: var(--bg-white);
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .contact-main-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .contact-hero h1 {
            font-size: 2.3rem;
        }
        
        .contact-content {
            padding: 50px 0;
        }
    }

    @media (max-width: 768px) {
        .contact-info-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        
        .contact-hero {
            padding: 60px 0;
        }
        
        .contact-hero h1 {
            font-size: 2rem;
        }
        
        .contact-form-wrapper,
        .working-hours {
            padding: 25px;
        }
        
        .hours-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
        
        .reply-header {
            flex-direction: column;
            gap: 5px;
        }
    }

    @media (max-width: 576px) {
        .contact-hero h1 {
            font-size: 1.8rem;
        }
        
        .contact-hero p {
            font-size: 1rem;
        }
        
        .contact-info-item {
            padding: 25px 20px;
        }
        
        .contact-icon-wrapper {
            width: 60px;
            height: 60px;
        }
        
        .contact-icon-wrapper i {
            font-size: 1.5rem;
        }
    }
</style>

<div class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <div class="contact-hero-badge">
                    <i class="fas fa-headset me-2"></i>
                    Hubungi Kami
                </div>
                <h1>Kontak Mizyan Store</h1>
                <div class="contact-hero-line"></div>
                <p>Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan fashion muslim berkualitas tinggi</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="contact-content">
        <div class="container">
            <!-- Contact Info Grid -->
            <div class="contact-info-grid">
                <div class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Alamat Kami</h4>
                    <p>Mudung Laut, Kec. Pelayangan, Kota Jambi, Jambi 36252</p>
                    <small>Dekat Kantor Lurah Kelurahan Mudung Laut</small>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Telepon & WhatsApp</h4>
                    <p><a href="tel:+62895415041522"><i class="fas fa-phone me-2"></i>+62 895-4150-41522</a></p>
                    <p><a href="https://wa.me/62895415041522" target="_blank"><i class="fab fa-whatsapp me-2"></i>0895415041522</a></p>
                    <div class="contact-badge">Online 24/7</div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-icon-wrapper">
                        <i class="far fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p><a href="mailto:info@mizyanstore.com"><i class="fas fa-envelope me-2"></i>info@mizyanstore.com</a></p>
                    <p><a href="mailto:cs@mizyanstore.com"><i class="fas fa-envelope me-2"></i>cs@mizyanstore.com</a></p>
                    <small>Respon dalam 2-4 jam kerja</small>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="contact-main-grid">
                <!-- Left Column -->
                <div>
                    <!-- Working Hours -->
                    <div class="working-hours">
                        <h3><i class="far fa-clock me-2"></i>Jam Operasional</h3>
                        <ul class="hours-list">
                            <li class="hours-item">
                                <span class="hours-day">Setiap Hari</span>
                                <span class="hours-time">08:00 - 17:30 WIB</span>
                            </li>
                            <li class="hours-item hours-highlight">
                                <span class="hours-day">WhatsApp</span>
                                <span class="hours-time">24 Jam</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Map -->
                    <div class="map-wrapper">
                        <div class="map-header">
                            <h3><i class="fas fa-map-marker-alt me-2"></i>Lokasi Kami</h3>
                        </div>
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.299084718071!2d103.60965897397607!3d-1.581202236017473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2589634771d07d%3A0xd5080df475bc9ab3!2sGEPREK%20MILLENIAL!5e0!3m2!1sid!2sid!4v1750057888087!5m2!1sid!2sid" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="contact-form-wrapper">
                    <h3><i class="far fa-paper-plane me-2"></i>Kirim Pesan</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @auth
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-input @error('name') is-invalid @enderror" 
                                           name="name" placeholder="Masukkan nama lengkap" required 
                                           value="{{ old('name', auth()->user()->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-input @error('email') is-invalid @enderror" 
                                           name="email" placeholder="Masukkan alamat email" required 
                                           value="{{ old('email', auth()->user()->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon <span class="optional">(Opsional)</span></label>
                                <input type="text" class="form-input @error('phone_number') is-invalid @enderror" 
                                       name="phone_number" placeholder="Masukkan nomor telepon" 
                                       value="{{ old('phone_number', auth()->user()->phone_number ?? '') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Subjek</label>
                                <input type="text" class="form-input @error('subject') is-invalid @enderror" 
                                       name="subject" placeholder="Masukkan subjek pesan" required 
                                       value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-input form-textarea @error('message') is-invalid @enderror" 
                                          name="message" placeholder="Tulis pesan Anda di sini..." 
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-contact">
                                <i class="far fa-paper-plane me-2"></i>Kirim Pesan
                            </button>
                        </form>

                        @if($replies->count() > 0)
                        <div class="admin-replies">
                            <h4 class="replies-title"><i class="fas fa-reply me-2"></i>Balasan Admin</h4>
                            @foreach($replies as $reply)
                            <div class="reply-item {{ $reply->is_read ? '' : 'unread' }}">
                                <div class="reply-header">
                                    <h5 class="reply-subject">{{ $reply->subject }}</h5>
                                    <span class="reply-date">{{ $reply->updated_at->format('d M Y H:i') }}</span>
                                </div>
                                <p class="original-message">{{ $reply->message }}</p>
                                <div class="admin-response">
                                    <div class="admin-info">
                                        <i class="fas fa-user-shield me-2"></i>Admin Mizyan Store
                                    </div>
                                    <p class="admin-message">{{ $reply->admin_reply }}</p>
                                </div>
                                @if(!$reply->is_read)
                                <div class="reply-actions">
                                    <form action="{{ route('contact.mark-read', $reply->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-small">
                                            <i class="fas fa-check me-1"></i>Tandai sudah dibaca
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu untuk mengirim pesan.
                        </div>
                        
                        <div style="text-align: center;">
                            <a href="{{ route('login') }}" class="btn-contact" style="display: inline-block; text-decoration: none; width: auto; padding: 14px 40px;">
                                <i class="fas fa-sign-in-alt me-2"></i>Login Sekarang
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
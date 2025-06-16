<footer class="footer">
    <!-- Footer Main Content -->
    <div class="footer-main py-5" style="background: linear-gradient(135deg, #F8E5BB 0%, #F2E8D5 100%); position: relative;">
        <!-- Subtle decorative line -->
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, #D39C63 0%, #A8713A 50%, #D39C63 100%);"></div>
        
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row g-4">
                <!-- Company Info Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="brand-section mb-4">
                            <h5 class="footer-title" style="color: #713600; font-weight: 600; margin-bottom: 15px; font-size: 1.6rem; display: flex; align-items: center;">
                                <div class="brand-icon" style="width: 40px; height: 40px; background: linear-gradient(135deg, #D39C63, #A8713A); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px; box-shadow: 0 3px 10px rgba(211, 156, 99, 0.3);">
                                    <i class="fas fa-store" style="color: white; font-size: 1.2rem;"></i>
                                </div>
                                Mizyan Store
                            </h5>
                            <p class="mb-3" style="color: #713600; line-height: 1.6; font-size: 1rem;">
                                Menyediakan pakaian muslim stylish dan layanan jahitan berkualitas untuk tampilan terbaik Anda.
                            </p>
                        </div>
                        
                        <div class="footer-social">
                            <h6 style="color: #713600; font-size: 0.9rem; font-weight: 500; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 0.5px;">Ikuti Kami</h6>
                            <div class="social-links">
                                <a href="#" class="social-link" style="display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #FFFFFF; color: #D39C63; border-radius: 10px; margin-right: 10px; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #E5E5E5;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" style="display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #FFFFFF; color: #D39C63; border-radius: 10px; margin-right: 10px; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #E5E5E5;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link" style="display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #FFFFFF; color: #D39C63; border-radius: 10px; margin-right: 10px; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #E5E5E5;">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                                <a href="#" class="social-link" style="display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: #FFFFFF; color: #D39C63; border-radius: 10px; transition: all 0.3s ease; text-decoration: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #E5E5E5;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-title" style="color: #713600; font-weight: 600; margin-bottom: 25px; font-size: 1.4rem; position: relative; padding-bottom: 10px;">
                            Menu Utama
                            <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: #D39C63;"></span>
                        </h5>
                        <ul class="footer-menu" style="list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('home') }}" class="footer-link" style="color: #713600; text-decoration: none; transition: all 0.3s ease; font-size: 1rem; display: flex; align-items: center; padding: 8px 0; position: relative;">
                                    <i class="fas fa-chevron-right" style="color: #D39C63; font-size: 0.8rem; margin-right: 10px; transition: all 0.3s ease;"></i>
                                    Beranda
                                </a>
                            </li>
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('blog.index') }}" class="footer-link" style="color: #713600; text-decoration: none; transition: all 0.3s ease; font-size: 1rem; display: flex; align-items: center; padding: 8px 0; position: relative;">
                                    <i class="fas fa-chevron-right" style="color: #D39C63; font-size: 0.8rem; margin-right: 10px; transition: all 0.3s ease;"></i>
                                    Blog
                                </a>
                            </li>
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('about') }}" class="footer-link" style="color: #713600; text-decoration: none; transition: all 0.3s ease; font-size: 1rem; display: flex; align-items: center; padding: 8px 0; position: relative;">
                                    <i class="fas fa-chevron-right" style="color: #D39C63; font-size: 0.8rem; margin-right: 10px; transition: all 0.3s ease;"></i>
                                    Tentang Kami
                                </a>
                            </li>
                            <li style="margin-bottom: 12px;">
                                <a href="{{ route('contact') }}" class="footer-link" style="color: #713600; text-decoration: none; transition: all 0.3s ease; font-size: 1rem; display: flex; align-items: center; padding: 8px 0; position: relative;">
                                    <i class="fas fa-chevron-right" style="color: #D39C63; font-size: 0.8rem; margin-right: 10px; transition: all 0.3s ease;"></i>
                                    Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info Column -->
                <div class="col-lg-4 col-md-12">
                    <div class="footer-widget">
                        <h5 class="footer-title" style="color: #713600; font-weight: 600; margin-bottom: 25px; font-size: 1.4rem; position: relative; padding-bottom: 10px;">
                            Hubungi Kami
                            <span style="position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: #D39C63;"></span>
                        </h5>
                        <div class="footer-contact">
                            <div class="contact-item" style="margin-bottom: 18px; display: flex; align-items: flex-start;">
                                <div class="contact-icon" style="width: 35px; height: 35px; background: rgba(211, 156, 99, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                    <i class="fas fa-map-marker-alt" style="color: #D39C63; font-size: 0.9rem;"></i>
                                </div>
                                <div>
                                    <p style="color: #713600; margin: 0; font-size: 0.95rem; line-height: 1.5;">
                                        <strong>Alamat</strong><br>
                                        Kel. Mudung Laut, Kec. Pelayangan, Kota Jambi, Jambi 36252
                                    </p>
                                </div>
                            </div>
                            
                            <div class="contact-item" style="margin-bottom: 18px; display: flex; align-items: flex-start;">
                                <div class="contact-icon" style="width: 35px; height: 35px; background: rgba(211, 156, 99, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                    <i class="fas fa-phone-alt" style="color: #D39C63; font-size: 0.9rem;"></i>
                                </div>
                                <div>
                                    <p style="color: #713600; margin: 0; font-size: 0.95rem;">
                                        <strong>Telepon</strong><br>
                                        <a href="tel:+62895415041522" class="footer-contact-link" style="color: #713600; text-decoration: none; transition: color 0.3s ease;">
                                            0895415041522
                                        </a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="contact-item" style="margin-bottom: 18px; display: flex; align-items: flex-start;">
                                <div class="contact-icon" style="width: 35px; height: 35px; background: rgba(211, 156, 99, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                    <i class="fas fa-envelope" style="color: #D39C63; font-size: 0.9rem;"></i>
                                </div>
                                <div>
                                    <p style="color: #713600; margin: 0; font-size: 0.95rem;">
                                        <strong>Email</strong><br>
                                        <a href="mailto:mizyanstore@gmail.com" class="footer-contact-link" style="color: #713600; text-decoration: none; transition: color 0.3s ease;">
                                            mizyanstore@gmail.com
                                        </a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="contact-item" style="display: flex; align-items: flex-start;">
                                <div class="contact-icon" style="width: 35px; height: 35px; background: rgba(211, 156, 99, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                    <i class="far fa-clock" style="color: #D39C63; font-size: 0.9rem;"></i>
                                </div>
                                <div>
                                    <p style="color: #713600; margin: 0; font-size: 0.95rem;">
                                        <strong>Jam Buka</strong><br>
                                        Setiap hari: 09:00 - 18:00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom py-4" style="background: linear-gradient(135deg, #713600 0%, #5A2A00 100%); position: relative;">
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 1px; background: #D39C63; opacity: 0.6;"></div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0" style="color: #F8E5BB; font-size: 0.95rem; font-weight: 400;">
                        &copy; {{ date('Y') }} Mizyan Store. Semua hak dilindungi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Footer Styles - Balanced Design */
.footer {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-link:hover {
    color: #A8713A !important;
    transform: translateX(5px);
}

.footer-link:hover i {
    transform: translateX(3px);
    color: #A8713A !important;
}

.footer-contact-link:hover {
    color: #D39C63 !important;
    font-weight: 500;
}

.social-link:hover {
    background: linear-gradient(135deg, #D39C63, #A8713A) !important;
    color: white !important;
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(211, 156, 99, 0.4) !important;
}

.contact-item:hover .contact-icon {
    background: rgba(211, 156, 99, 0.2) !important;
    transform: scale(1.05);
}

.contact-item:hover {
    transform: translateX(3px);
}

.contact-icon {
    transition: all 0.3s ease;
}

.contact-item {
    transition: all 0.3s ease;
}

.brand-icon {
    transition: all 0.3s ease;
}

.brand-section:hover .brand-icon {
    transform: rotate(5deg) scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-main {
        padding: 40px 0 !important;
    }
    
    .footer-widget {
        margin-bottom: 35px;
        text-align: center;
    }
    
    .footer-title {
        font-size: 1.3rem !important;
        justify-content: center;
    }
    
    .footer-title span {
        left: 50% !important;
        transform: translateX(-50%);
    }
    
    .social-links {
        justify-content: center;
    }
    
    .footer-menu {
        display: inline-block;
        text-align: left;
    }
    
    .contact-item {
        justify-content: flex-start;
        text-align: left;
    }
    
    .footer-bottom .col-md-6 {
        text-align: center !important;
        margin-bottom: 10px;
    }
    
    .footer-bottom .col-md-6:last-child {
        margin-bottom: 0;
    }
}

@media (max-width: 576px) {
    .footer-widget {
        text-align: left;
    }
    
    .footer-title {
        justify-content: flex-start !important;
    }
    
    .footer-title span {
        left: 0 !important;
        transform: none !important;
    }
    
    .social-links {
        justify-content: flex-start;
    }
}

/* Import Font Awesome */
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style>
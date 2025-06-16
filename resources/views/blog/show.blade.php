@extends('layouts.app')

@section('title', $post->title . ' - Mizyan Store Blog')

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
        --shadow-light: 0 2px 10px rgba(248, 229, 187, 0.1);
        --shadow-medium: 0 4px 20px rgba(248, 229, 187, 0.15);
        --shadow-heavy: 0 8px 25px rgba(248, 229, 187, 0.2);
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        font-family: 'Poppins', 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Progress Bar */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background-color: var(--text-highlight);
        z-index: 1000;
        transition: width 0.3s ease;
    }

    /* Main Section */
    .blog-detail-section {
        padding: 40px 0 80px 0;
        background-color: var(--bg-light);
    }

    /* Breadcrumb */
    .breadcrumb-container {
        margin-bottom: 30px;
    }

    .breadcrumb {
        background: var(--bg-white);
        border-radius: 15px;
        padding: 20px 25px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        margin: 0;
    }

    .breadcrumb-item a {
        color: var(--text-highlight);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition-smooth);
    }

    .breadcrumb-item a:hover {
        color: var(--secondary-color);
    }

    .breadcrumb-item.active {
        color: var(--text-muted);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: var(--text-muted);
        font-weight: 600;
    }

    /* Article Container */
    .article-container {
        background: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-medium);
        padding: 40px;
        margin-bottom: 40px;
        overflow: hidden;
        position: relative;
    }

    /* Article Layout */
    .article-layout {
        display: grid;
        grid-template-columns: 380px 1fr;
        gap: 40px;
        align-items: start;
        margin-bottom: 30px;
    }

    .article-image-section {
        position: sticky;
        top: 30px;
    }

    .article-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 15px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-medium);
        transition: var(--transition-smooth);
    }

    .article-image:hover {
        transform: scale(1.015);
        box-shadow: var(--shadow-heavy);
    }

    .article-content-section {
        min-width: 0;
    }

    /* Article Header */
    .article-header {
        margin-bottom: 30px;
    }

    .article-title {
        color: var(--secondary-color);
        font-weight: 800;
        font-size: 2.2rem;
        line-height: 1.2;
        margin-bottom: 25px;
        letter-spacing: -0.02em;
    }

    /* Meta Info Container */
    .meta-info-container {
        background: var(--accent-color);
        border-radius: 15px;
        padding: 20px 25px;
        border: 1px solid var(--border-primary);
        box-shadow: var(--shadow-light);
        display: flex;
        align-items: center;
        gap: 25px;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .meta-item i {
        color: var(--text-highlight);
        font-size: 1rem;
    }

    /* Views Badge */
    .views-badge {
        background: var(--text-highlight);
        color: var(--bg-white);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-left: auto;
    }

    /* Blog Content */
    .blog-content {
        font-size: 0.95rem;
        line-height: 1.7;
        color: var(--text-dark);
        margin-top: 30px;
    }

    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4,
    .blog-content h5,
    .blog-content h6 {
        color: var(--secondary-color);
        font-weight: 700;
        margin-top: 2.5em;
        margin-bottom: 1.2em;
    }

    .blog-content h1 {
        font-size: 2rem;
        border-bottom: 3px solid var(--border-primary);
        padding-bottom: 15px;
    }

    .blog-content h2 {
        font-size: 1.7rem;
    }

    .blog-content h3 {
        font-size: 1.4rem;
    }

    .blog-content p {
        margin-bottom: 1.5em;
        text-align: justify;
    }

    .blog-content ul,
    .blog-content ol {
        margin-bottom: 1.5em;
        padding-left: 2.5em;
    }

    .blog-content li {
        margin-bottom: 0.8em;
    }

    .blog-content blockquote {
        background: var(--accent-color);
        border-left: 4px solid var(--text-highlight);
        padding: 20px 25px;
        margin: 2.5em 0;
        border-radius: 0 15px 15px 0;
        font-style: italic;
        color: var(--text-secondary);
        position: relative;
        font-weight: 500;
        font-size: 1em;
    }

    .blog-content blockquote::before {
        content: '"';
        font-size: 3.5rem;
        color: var(--text-highlight);
        position: absolute;
        top: -10px;
        left: 15px;
        font-family: Georgia, serif;
        opacity: 0.2;
    }

    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin: 2.5em 0;
        box-shadow: var(--shadow-medium);
        transition: var(--transition-smooth);
    }

    .blog-content img:hover {
        transform: scale(1.015);
        box-shadow: var(--shadow-heavy);
    }

    .blog-content a {
        color: var(--text-highlight);
        text-decoration: underline;
        font-weight: 600;
        transition: var(--transition-smooth);
    }

    .blog-content a:hover {
        color: var(--secondary-color);
        text-decoration: none;
    }

    /* Article Divider */
    .article-divider {
        border: none;
        height: 3px;
        background-color: var(--border-primary);
        margin: 60px 0;
        border-radius: 2px;
    }

    /* Related Posts Section */
    .related-posts-section {
        background: var(--bg-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-medium);
        padding: 40px;
        position: relative;
    }

    .related-posts-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background-color: var(--text-highlight);
        border-radius: 20px 20px 0 0;
    }

    .related-posts-title {
        color: var(--secondary-color);
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 35px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .related-posts-title i {
        color: var(--text-highlight);
        font-size: 1.8rem;
    }

    /* Related Posts Grid */
    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        max-width: 100%;
    }

    /* Ensure maximum 4 columns */
    @media (min-width: 1200px) {
        .related-posts-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
        .related-posts-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .related-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .related-posts-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Related Post Cards */
    .related-card {
        background: var(--bg-white);
        border-radius: 15px;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-light);
        overflow: hidden;
        transition: var(--transition-smooth);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .related-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-heavy);
        border-color: var(--border-primary);
    }

    .related-card-image {
        position: relative;
        overflow: hidden;
        height: 140px;
    }

    .related-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-smooth);
    }

    .related-card:hover .related-card-image img {
        transform: scale(1.05);
    }

    .related-card-body {
        padding: 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .related-card-title {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.05rem;
        margin-bottom: 10px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .related-card-meta {
        color: var(--text-muted);
        margin-bottom: 15px;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
    }

    .related-card-meta i {
        color: var(--text-highlight);
        font-size: 0.9rem;
    }

    .related-card-btn {
        color: var(--bg-white);
        background-color: var(--text-highlight);
        padding: 8px 14px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.75rem;
        transition: var(--transition-smooth);
        text-decoration: none;
        display: block;
        text-align: center;
        margin-top: auto;
        width: 100%;
        border: none;
        box-shadow: var(--shadow-light);
    }

    .related-card-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
        background-color: var(--secondary-color);
        color: var(--bg-white);
    }

    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .article-layout {
            grid-template-columns: 350px 1fr;
            gap: 35px;
        }
        
        .article-image {
            height: 350px;
        }
    }

    @media (max-width: 991.98px) {
        .article-layout {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .article-image-section {
            position: static;
        }

        .article-image {
            height: 300px;
        }

        .article-container,
        .related-posts-section {
            padding: 35px;
        }

        .article-title {
            font-size: 2rem;
        }

        .blog-content {
            font-size: 0.9rem;
        }

        .related-posts-title {
            font-size: 1.8rem;
        }

        .meta-info-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .views-badge {
            margin-left: 0;
            align-self: flex-start;
        }
    }

    @media (max-width: 767.98px) {
        .blog-detail-section {
            padding: 30px 0 60px 0;
        }

        .article-container,
        .related-posts-section {
            padding: 30px;
        }

        .article-title {
            font-size: 1.8rem;
        }

        .breadcrumb {
            padding: 15px 20px;
        }

        .article-image {
            height: 250px;
        }

        .meta-info-container {
            padding: 15px 20px;
        }

        .meta-item {
            font-size: 0.85rem;
        }

        .views-badge {
            font-size: 0.75rem;
            padding: 5px 10px;
        }

        .related-posts-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }

    @media (max-width: 575.98px) {
        .article-container,
        .related-posts-section {
            padding: 25px;
        }

        .article-title {
            font-size: 1.6rem;
        }

        .blog-content {
            font-size: 0.9rem;
        }

        .related-posts-title {
            font-size: 1.6rem;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .article-image {
            height: 220px;
        }

        .related-card-body {
            padding: 15px;
        }

        .breadcrumb {
            padding: 12px 18px;
        }

        .meta-info-container {
            gap: 12px;
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

<section class="blog-detail-section">
    <div class="container">
        <!-- Main Article -->
        <div class="article-container fade-in">
            <article>
                <div class="article-layout">
                    @if($post->image)
                        <div class="article-image-section">
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="article-image"
                                 loading="lazy">
                        </div>
                    @endif
                    
                    <div class="article-content-section">
                        <div class="article-header">
                            <h1 class="article-title">{{ $post->title }}</h1>
                            
                            <div class="meta-info-container">
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $post->published_at->format('F j, Y') }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $post->published_at->diffForHumans() }}</span>
                                </div>
                                <div class="views-badge">
                                    <i class="fas fa-eye"></i>
                                    <span>{{ number_format($post->views ?? 0) }} views</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="blog-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Article Divider -->
        <hr class="article-divider">

        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
            <div class="related-posts-section fade-in stagger-2">
                <h3 class="related-posts-title">
                    <i class="fas fa-newspaper"></i>
                    Artikel Terkait
                </h3>
                
                <div class="related-posts-grid">
                    @foreach($relatedPosts as $index => $related)
                        <div class="related-card fade-in stagger-{{ min($index + 1, 3) }}">
                            @if($related->image)
                                <div class="related-card-image">
                                    <img src="{{ asset('storage/' . $related->image) }}" 
                                         alt="{{ $related->title }}"
                                         loading="lazy">
                                </div>
                            @endif
                            
                            <div class="related-card-body">
                                <h5 class="related-card-title">{{ $related->title }}</h5>
                                
                                <div class="related-card-meta">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $related->published_at->diffForHumans() }}</span>
                                </div>
                                
                                <a href="{{ route('blog.show', $related->slug) }}" class="related-card-btn">
                                    Baca Selengkapnya
                                </a>
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
    // Create reading progress bar
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress';
    document.body.appendChild(progressBar);

    // Update progress bar on scroll
    function updateProgress() {
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        progressBar.style.width = Math.min(scrolled, 100) + '%';
    }

    // Throttled scroll handler
    let ticking = false;
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateProgress);
            ticking = true;
            setTimeout(() => { ticking = false; }, 10);
        }
    }

    window.addEventListener('scroll', requestTick);

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Enhanced card animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -30px 0px'
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
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }

    // Copy link functionality
    if (navigator.share) {
        const shareBtn = document.createElement('button');
        shareBtn.innerHTML = '<i class="fas fa-share-alt"></i> Share';
        shareBtn.className = 'btn btn-outline-primary';
        shareBtn.style.cssText = 'position: fixed; bottom: 20px; right: 20px; z-index: 1000; border-radius: 50px; padding: 10px 18px; font-size: 0.85rem;';
        
        shareBtn.addEventListener('click', async () => {
            try {
                await navigator.share({
                    title: document.title,
                    url: window.location.href
                });
            } catch (err) {
                console.log('Error sharing:', err);
            }
        });
        
        document.body.appendChild(shareBtn);
    }
});
</script>

@endsection
@extends('layouts.admin')

@section('title', 'Dasbor')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Total Produk -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProducts }}</h3>
                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Blog -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalBlogs }}</h3>
                    <p>Total Blog</p>
                </div>
                <div class="icon">
                    <i class="fas fa-blog"></i>
                </div>
                <a href="{{ route('admin.blog.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Galeri -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $totalGalleries }}</h3>
                    <p>Total Galeri</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('admin.gallery.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalOrders }}</h3>
                    <p>Total Pesanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Testimoni -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalTestimonials }}</h3>
                    <p>Total Testimoni</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment-alt"></i>
                </div>
                <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Pesan Belum Dibaca -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $unreadMessages }}</h3>
                    <p>Pesan Belum Dibaca</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <a href="{{ route('admin.contacts.index') }}?is_read=0" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

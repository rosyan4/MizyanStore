<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ProfileController,
    ProductController,
    ServiceController,
    BlogController,
    ContactController,
    GalleryController,
    TestimonialController,
    OrderController,
    PaymentController,
    BookingController
};

// ===================
// ROUTE UMUM (PUBLIK)
// ===================

// Home & About
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Galeri
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Testimoni 
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');


// ===========================
// ROUTE UNTUK USER TERLOGIN
// ===========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Produk
    Route::post('/products/{id}/rate', [ProductController::class, 'rate'])->name('products.rate');

    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Order Produk
    Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success/{order}', [OrderController::class, 'success'])->name('orders.success');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/upload-payment', [OrderController::class, 'uploadPaymentProof'])->name('order.upload-payment');
    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    // Riwayat Order di Akun
    Route::get('/account/orders', [OrderController::class, 'index'])->name('account.orders');
    Route::get('/account/orders/{id}', [OrderController::class, 'show'])->name('account.order.detail');

    // Testimoni (Hanya untuk user login)
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/contact/mark-read/{id}', [ContactController::class, 'markAsRead'])->name('contact.mark-read');
});


// =======================
// ROUTE AUTH & ADMIN
// =======================
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

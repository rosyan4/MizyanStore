<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminAuthController,
    AdminController,
    AdminProductController,
    AdminServiceController,
    AdminCategoryController,
    AdminUserController,
    AdminBlogController,
    AdminBookingController,
    AdminGalleryController,
    AdminContactController,
    AdminTestimonialController,
    AdminOrderController,
    AdminPaymentController,
    AdminRatingController
};

// ===== ADMIN ROUTES =====
Route::prefix('admin')->name('admin.')->group(function () {

    // === Guest Admin ===
    Route::middleware('guest.admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // === Authenticated Admin ===
    Route::middleware('auth:admin')->group(function () {

        // Dashboard & Profil
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::put('/profile/password', [AdminController::class, 'updatePassword'])->name('profile.password.update');


        // Produk
        Route::resource('products', AdminProductController::class)->except(['show']);
        Route::delete('/ratings/{id}', [AdminRatingController::class, 'destroy'])->name('ratings.destroy');

        // Order
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('index');
            Route::get('/{id}', [AdminOrderController::class, 'show'])->name('show');
            Route::post('/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('updateStatus');
        });

        // Kategori
        Route::resource('categories', AdminCategoryController::class)->except(['show']);

        // Pengguna
        Route::resource('users', AdminUserController::class)->except(['create', 'store', 'show']);

        // Blog
        Route::resource('blog', AdminBlogController::class)->except(['show']);

        // Galeri
        Route::resource('gallery', AdminGalleryController::class)->except(['show']);
        Route::post('gallery/update-order', [AdminGalleryController::class, 'updateOrder'])->name('gallery.updateOrder');

        // Kontak
        Route::resource('contacts', AdminContactController::class)->except(['create', 'edit']);
        Route::post('contacts/{contact}/reply', [AdminContactController::class, 'reply'])->name('contacts.reply');

        // Testimoni
        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/', [AdminTestimonialController::class, 'index'])->name('index');
            Route::get('/{id}', [AdminTestimonialController::class, 'show'])->name('show');
            Route::post('/{id}/approve', [AdminTestimonialController::class, 'approve'])->name('approve');
            Route::post('/{id}/reject', [AdminTestimonialController::class, 'reject'])->name('reject');
            Route::delete('/{id}', [AdminTestimonialController::class, 'destroy'])->name('destroy');
        });
    });
});

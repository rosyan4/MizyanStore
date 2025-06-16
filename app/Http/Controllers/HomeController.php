<?php

namespace App\Http\Controllers;

use App\Models\{BlogPost, Category, Product, Service, Testimonial};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->take(4)
            ->get();
            
        // Tambahkan query untuk produk terbaru
        $newProducts = Product::where('is_active', true)
            ->latest('created_at')
            ->take(4)
            ->get();

        $categories = Category::where('is_active', true)
            ->take(4)
            ->get();

        $testimonials = Testimonial::where('is_approved', true)
            ->where('is_featured', true)
            ->take(3)
            ->get();

        $blogPosts = BlogPost::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact(
            'featuredProducts', 
            'newProducts', // Tambahkan variabel ini
            'categories', 
            'testimonials',
            'blogPosts'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}

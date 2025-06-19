<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category, ProductRating, OrderItem};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);

        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('name', 'asc');
            }
        } else {
            $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        $canReview = false;

        if (Auth::check()) {
            $userId = Auth::id();
            $canReview = OrderItem::where('product_id', $product->id)
                ->whereHas('order', function ($query) use ($userId) {
                    $query->where('user_id', $userId)->where('status', 'completed');
                })
                ->exists();
        }

        return view('products.show', compact('product', 'relatedProducts', 'canReview'));
    }

    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $userId = Auth::id(); 

        $hasPurchased = OrderItem::where('product_id', $id)
            ->whereHas('order', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('status', 'completed');
            })
            ->exists();

        if (! $hasPurchased) {
            return back()->with('error', 'Anda hanya bisa memberi ulasan jika sudah membeli produk ini dan pesanan telah selesai.');
        }

        ProductRating::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $id],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}

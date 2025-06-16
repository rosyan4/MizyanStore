<?php
namespace App\Http\Controllers;

use App\Models\{GalleryItem, Category};
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::where('is_active', true);

        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $galleryItems = $query->orderBy('order')->latest()->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('gallery.index', compact('galleryItems', 'categories'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $query = GalleryItem::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active == '1');
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $galleryItems = $query->orderBy('order')->latest()->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('admin.gallery.index', compact('galleryItems', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $galleryItem = new GalleryItem();
        $galleryItem->fill($request->only(['title', 'description', 'category_id']));
        $galleryItem->is_active = $request->boolean('is_active');
        $galleryItem->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $galleryItem->image = $request->file('image')->store('gallery', 'public');
        }

        $galleryItem->save();
        return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galleryItem = GalleryItem::findOrFail($id);
        $categories = Category::where('is_active', true)->get();
        return view('admin.gallery.edit', compact('galleryItem', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $galleryItem = GalleryItem::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $galleryItem->fill($request->only(['title', 'description', 'category_id']));
        $galleryItem->is_active = $request->boolean('is_active');
        $galleryItem->order = $request->input('order', $galleryItem->order);

        if ($request->hasFile('image')) {
            if ($galleryItem->image) {
                Storage::disk('public')->delete($galleryItem->image);
            }
            $galleryItem->image = $request->file('image')->store('gallery', 'public');
        }

        $galleryItem->save();
        return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil diperbarui!');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:gallery_items,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            GalleryItem::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true, 'message' => 'Urutan berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $galleryItem = GalleryItem::findOrFail($id);

        if ($galleryItem->image) {
            Storage::disk('public')->delete($galleryItem->image);
        }

        $galleryItem->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Item galeri berhasil dihapus!');
    }
}



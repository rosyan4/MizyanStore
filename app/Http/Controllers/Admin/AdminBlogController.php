<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $query = BlogPost::with('user');

        if ($request->filled('published')) {
            $query->where('is_published', $request->published == '1');
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'. $request->search . '%');
        }

        $posts = $query->latest()->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-'. $count++;
        }

        $post = new BlogPost();
        $post->fill($request->only('title', 'content'));
        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->is_published = $request->boolean('is_published');
        $post->published_at = $request->published_at ?? now();

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('blog', 'public');
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post blog berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($post->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (BlogPost::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-'. $count++;
            }
            $post->slug = $slug;
        }

        $post->fill($request->only('title', 'content'));
        $post->is_published = $request->boolean('is_published');
        $post->published_at = $request->published_at ?? now();

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('blog', 'public');
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post blog berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Post blog berhasil dihapus!');
    }
}
<?php
namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedias = SocialMedia::where('is_active', true)->get();
        return view('components.social-links', compact('socialMedias'));
    }

    public function manage()
    {
        $this->authorize('admin'); // Pastikan hanya admin yang bisa akses
        $socialMedias = SocialMedia::all();
        return view('admin.social-media.index', compact('socialMedias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|url',
            'icon' => 'nullable|string'
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->update([
            'url' => $request->url,
            'icon' => $request->icon ?? $socialMedia->icon
        ]);

        return back()->with('success', 'Social media updated!');
    }
}

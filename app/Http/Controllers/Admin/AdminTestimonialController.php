<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function approve(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = true;
        $testimonial->save();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil disetujui!');
    }

    public function reject(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = false;
        $testimonial->save();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil ditolak!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
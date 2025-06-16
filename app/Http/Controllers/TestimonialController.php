<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_approved', true)->latest()->paginate(9);
        return view('testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = new Testimonial();
        $testimonial->user_id = Auth::id();
        $testimonial->name = $request->name;
        $testimonial->location = $request->location;
        $testimonial->content = $request->content;
        $testimonial->rating = $request->rating;

        if ($request->hasFile('photo')) {
            $testimonial->photo = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->is_approved = false;
        $testimonial->save();

        return redirect()->route('testimonials.index')
            ->with('success', 'Terima kasih! Testimoni Anda telah dikirim dan menunggu persetujuan.');
    }
}

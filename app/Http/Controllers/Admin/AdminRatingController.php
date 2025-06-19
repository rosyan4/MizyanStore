<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductRating;

class AdminRatingController extends Controller
{
    public function destroy($id)
    {
        $rating = ProductRating::findOrFail($id);

        $rating->comment = null;
        $rating->save();

        return back()->with('success', 'Komentar telah dihapus, rating tetap disimpan.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman kontak (bisa diakses tanpa login)
     */
    public function index()
    {
        // Jika user login, tampilkan balasan admin untuk pesannya
        $replies = Auth::check() 
            ? Contact::where('user_id', Auth::id())
                ->whereNotNull('admin_reply')
                ->latest()
                ->get()
            : collect(); // Koleksi kosong jika guest

        return view('contact', compact('replies'));
    }

    /**
     * Menyimpan pesan dari user (HARUS login)
     */
    public function store(Request $request)
    {
        // Validasi harus login
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Anda harus login terlebih dahulu untuk mengirim pesan.');
        }

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Simpan pesan + link ke user jika login
        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'user_id' => Auth::id(), // Simpan ID user jika login
        ]);

        return back()
            ->with('success', 'Pesan Anda berhasil dikirim! Admin akan segera merespon.');
    }

    /**
     * Menandai pesan sudah dibaca oleh user
     */
    public function markAsRead($id)
    {
        // Pastikan user hanya bisa mengakses pesannya sendiri
        $contact = Contact::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $contact->update(['is_read' => true]);

        return back()
            ->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }
}
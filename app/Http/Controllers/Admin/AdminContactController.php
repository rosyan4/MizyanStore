<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function __construct()
    {
        // Hanya admin yang bisa akses
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Menampilkan daftar pesan masuk (dengan filter)
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filter berdasarkan status "dibaca/belum"
        if ($request->filled('is_read')) {
            $query->where('is_read', $request->is_read == '1');
        }

        // Pencarian berdasarkan keyword
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subject', 'like', '%' . $request->search . '%');
            });
        }

        $contacts = $query->latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Menampilkan detail pesan + form balasan
     */
    public function show(Contact $contact)
    {
        // Jika pesan belum dibaca, tandai sebagai dibaca
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Mengirim balasan admin ke user
     */
    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'admin_reply' => 'required|string|min:10',
        ]);

        $contact->update([
            'admin_reply' => $request->admin_reply,
            'is_read' => false, // Tandai belum dibaca oleh user
        ]);

        return back()
            ->with('success', 'Balasan berhasil dikirim ke pengguna.');
    }

    /**
     * Menghapus pesan
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
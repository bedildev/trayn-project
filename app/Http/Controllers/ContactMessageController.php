<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Menampilkan semua pesan kontak
    public function index()
    {
        $messages = ContactMessage::all();
        return view('contact.index', compact('messages'));
    }

    // Menampilkan form untuk membuat pesan baru
    public function create()
    {
        return view('contact.create');
    }

    // Menyimpan pesan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Menyimpan data ke database
        ContactMessage::create($request->all());

        return redirect()->route('contact.index')->with('success', 'Pesan berhasil dikirim!');
    }

    // Menampilkan form untuk mengedit pesan
    public function edit($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('contact.edit', compact('message'));
    }

    // Memperbarui pesan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Mengupdate data pesan
        $message = ContactMessage::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Pesan berhasil diperbarui!');
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('contact.index')->with('success', 'Pesan berhasil dihapus!');
    }
}

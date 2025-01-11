<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        // Mengambil semua data About
        $abouts = About::all();

        // Mengembalikan view dengan data
        return view('auth.about', compact('abouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            // Simpan data baru ke database
            About::create($validatedData);

            // Redirect dengan pesan sukses
            return redirect()->route('auth.about')->with('success', 'Content added successfully!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('auth.about')->with('error', 'Failed to add content. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            // Temukan data berdasarkan ID
            $about = About::findOrFail($id);

            // Perbarui data
            $about->update($validatedData);

            // Redirect dengan pesan sukses
            return redirect()->route('auth.about')->with('success', 'Content updated successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Redirect jika data tidak ditemukan
            return redirect()->route('auth.about')->with('error', 'Content not found.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error lainnya
            return redirect()->route('auth.about')->with('error', 'Failed to update content. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan data berdasarkan ID
            $about = About::findOrFail($id);

            // Hapus data
            $about->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('auth.about')->with('success', 'Content deleted successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Redirect jika data tidak ditemukan
            return redirect()->route('auth.about')->with('error', 'Content not found.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error lainnya
            return redirect()->route('auth.about')->with('error', 'Failed to delete content. Please try again.');
        }
    }
}

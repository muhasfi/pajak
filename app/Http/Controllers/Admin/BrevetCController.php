<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrevetC;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrevetCController extends Controller
{
    public function index(): View
    {
        $brevetCs = BrevetC::latest()->paginate(5); // Pagination: 5 data per halaman
        return view('admin.brevetc.index', compact('brevetCs'));
    }

    /**
     * Menampilkan form untuk membuat data brevetC baru (Create - C).
     */
    public function create(): View
    {
        return view('admin.brevetc.create');
    }

    /**
     * Menyimpan data baru ke database (Create - C).
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'gambar' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'hari' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0'
        ]);

        // Simpan data ke database
        BrevetC::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('brevetc.index')
                        ->with('success', 'Data brevetC berhasil dibuat.');
    }

    /**
     * Menampilkan detail data brevetC (Read - R).
     */
    public function show(BrevetC $brevetC): View
    {
        return view('brevetc.show', compact('brevetC'));
    }

    /**
     * Menampilkan form untuk mengedit data brevetC (Update - U).
     */
    // Di BrevetCController.php
public function edit(BrevetC $brevetc) // Laravel otomatis menemukan data berdasarkan ID
{
    return view('admin.brevetc.edit', compact('brevetc'));
}

    /**
     * Memperbarui data di database (Update - U).
     */
    public function update(Request $request, BrevetC $brevetc): RedirectResponse
    {
        // Validasi data input
        $request->validate([
            'gambar' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'hari' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0'
        ]);

        // Update data di database
        $brevetc->update($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->back()
                        ->with('success', 'Data brevetC berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database (Delete - D).
     */
    public function destroy(BrevetC $brevetc): RedirectResponse
    {
        // Hapus data
        $brevetc->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('brevetc.index')
                        ->with('success', 'Data brevetC berhasil dihapus.');
    }
}

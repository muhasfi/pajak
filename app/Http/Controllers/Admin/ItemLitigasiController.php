<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemLitigasi;
use App\Models\ItemLitigasiDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemLitigasiController extends Controller
{
    public function index(): View
    {
        $litigasi = ItemLitigasi::with('detail')->latest()->get();
        return view('admin.litigasi.index', compact('litigasi'));
    }

    /**
     * Menampilkan form untuk membuat litigasi baru
     */
    public function create(): View
    {
        return view('admin.litigasi.create');
    }

    /**
     * Menyimpan litigasi baru beserta detailnya
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255'
        ]);

        // Simpan data litigasi
        $litigasi = ItemLitigasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Simpan detail litigasi
        ItemLitigasiDetail::create([
            'litigasi_id' => $litigasi->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.litigasi.index')
            ->with('success', 'Layanan litigasi berhasil dibuat.');
    }

    /**
     * Menampilkan detail litigasi
     */
    public function show(ItemLitigasi $litigasi): View
    {
        $litigasi->load('detail');
        return view('litigasi.show', compact('litigasi'));
    }

    /**
     * Menampilkan form untuk mengedit litigasi
     */
    public function edit(ItemLitigasi $litigasi): View
    {
        $litigasi->load('detail');
        return view('admin.litigasi.edit', compact('litigasi'));
    }

    /**
     * Update litigasi yang spesifik
     */
    public function update(Request $request, ItemLitigasi $litigasi): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255'
        ]);

        // Update data litigasi
        $litigasi->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Update atau buat detail litigasi
        if ($litigasi->detail->count() > 0) {
            $litigasi->detail->update([
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        } else {
            ItemLitigasiDetail::create([
                'litigasi_id' => $litigasi->id,
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        }

        return redirect()->route('admin.litigasi.index')
            ->with('success', 'Layanan litigasi berhasil diupdate.');
    }

    /**
     * Menghapus litigasi yang spesifik
     */
    public function destroy(ItemLitigasi $litigasi): RedirectResponse
    {
        $litigasi->delete();
        return redirect()->route('admin.litigasi.index')
            ->with('success', 'Layanan litigasi berhasil dihapus.');
    }
}

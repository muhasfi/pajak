<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Litigasi;
use App\Models\LitigasiDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LitigasiController extends Controller
{
    /**
     * Menampilkan daftar litigasi
     */
    public function index(): View
    {
        $litigasi = Litigasi::with('details')->latest()->paginate(5);
        return view('admin.litigasi.index', compact('litigasi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $litigasi = Litigasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Simpan detail litigasi
        LitigasiDetail::create([
            'litigasi_id' => $litigasi->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('litigasi.index')
            ->with('success', 'Layanan litigasi berhasil dibuat.');
    }

    /**
     * Menampilkan detail litigasi
     */
    public function show(Litigasi $litigasi): View
    {
        $litigasi->load('details');
        return view('litigasi.show', compact('litigasi'));
    }

    /**
     * Menampilkan form untuk mengedit litigasi
     */
    public function edit(Litigasi $litigasi): View
    {
        $litigasi->load('details');
        return view('admin.litigasi.edit', compact('litigasi'));
    }

    /**
     * Update litigasi yang spesifik
     */
    public function update(Request $request, Litigasi $litigasi): RedirectResponse
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
        if ($litigasi->details->count() > 0) {
            $litigasi->details()->first()->update([
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        } else {
            LitigasiDetail::create([
                'litigasi_id' => $litigasi->id,
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        }

        return redirect()->route('litigasi.index')
            ->with('success', 'Layanan litigasi berhasil diupdate.');
    }

    /**
     * Menghapus litigasi yang spesifik
     */
    public function destroy(Litigasi $litigasi): RedirectResponse
    {
        $litigasi->delete();
        return redirect()->route('litigasi.index')
            ->with('success', 'Layanan litigasi berhasil dihapus.');
    }
}
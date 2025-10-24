<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemLitigasi;
use App\Models\ItemLitigasiDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Simpan data litigasi
        $litigasi = ItemLitigasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $filePath = null;
            if ($request->file_option === 'upload') {
                $filePath = $request->file('file_upload')->store('layanan_pt_files', 'public');
            } elseif ($request->file_option === 'link') {
                $filePath = $request->file_link;
            }

        $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('ebooks', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

        // Simpan detail litigasi
        ItemLitigasiDetail::create([
            'litigasi_id' => $litigasi->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'deskripsi' => 'required|string',
        'benefit' => 'required|array',
        'benefit.*' => 'string|max:255',
        'file_type'   => 'required|in:upload,link,keep',
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
        'file_link'   => 'nullable|url'
        ]);

        // Ambil data litigasi beserta detail-nya
        $litigasi = ItemLitigasi::with('detail')->findOrFail($id);

        // Update data utama
        $litigasi->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        // Ambil file path lama (jika ada)
        $filePath = $litigasi->detail->file_path ?? null;

        // Jika upload file baru
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('ebooks', 'public');
        }
        // Jika pakai link baru
        elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }
        // Jika 'keep' maka biarkan file lama tetap digunakan

        // Update detail litigasi
        $litigasi->detail->update([
            'deskripsi' => $validated['deskripsi'],
            'benefit'   => $validated['benefit'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.litigasi.index')
            ->with('success', 'Layanan litigasi berhasil diperbarui.');
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

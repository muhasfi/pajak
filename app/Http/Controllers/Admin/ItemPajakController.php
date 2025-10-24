<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemPajak;
use App\Models\ItemPajakDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemPajakController extends Controller
{
    public function index()
    {
        $pajaks = ItemPajak::with('detail')->get();
        return view('admin.pajak.index', compact('pajaks'));
    }

    public function create()
    {
        return view('admin.pajak.create');
    }

    public function store(Request $request)
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

        $pajak = ItemPajak::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
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

        ItemPajakDetail::create([
            'pajak_id' => $pajak->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.pajak.index')->with('success', 'Layanan pajak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pajak = ItemPajak::with('detail')->findOrFail($id);
        return view('admin.pajak.show', compact('pajak'));
    }

   
    public function edit($id)
    {
        $pajak = ItemPajak::with('detail')->findOrFail($id);
        
        // Jika data detail tidak ada, buat object kosong
        if (!$pajak->detail) {
            $pajak->detail = new \App\Models\ItemPajakDetail();
            $pajak->detail->benefit = [];
        }
        
        return view('admin.pajak.edit', compact('pajak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'deskripsi' => 'required|string',
        'benefit' => 'required|array',
        'benefit.*' => 'string|max:255',
        'file_type'   => 'required|in:upload,link,keep', // tambahkan opsi 'keep' untuk file lama
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
        'file_link'   => 'nullable|url'
        ]);

        // Ambil data pajak beserta detail-nya
        $pajak = ItemPajak::with('detail')->findOrFail($id);

        // Update data utama
        $pajak->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        // Tentukan path file baru (jika ada)
        $filePath = $pajak->detail->file_path ?? null;

        // Jika upload file baru
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            // Hapus file lama kalau masih ada di storage
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            // Simpan file baru
            $filePath = $request->file('file_upload')->store('ebooks', 'public');
        } 
        // Jika pakai link baru
        elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }
        // Jika 'keep' berarti pakai file lama, tidak perlu ubah $filePath

        // Update detail pajak
        $pajak->detail->update([
            'deskripsi' => $validated['deskripsi'],
            'benefit'   => $validated['benefit'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.pajak.index')->with('success', 'Layanan pajak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pajak = ItemPajak::findOrFail($id);
        $pajak->delete();

        return redirect()->route('admin.pajak.index')->with('success', 'Layanan pajak berhasil dihapus!');
    }
}

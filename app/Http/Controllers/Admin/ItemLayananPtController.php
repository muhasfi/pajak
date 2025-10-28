<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemLayananPt;
use App\Models\ItemLayananPtDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ItemLayananPtController extends Controller
{
    public function index(): View
    {
        $layanans = ItemLayananPt::with('detail')->latest()->get();
        return view('admin.layanan_pt.index', compact('layanans'));
    }

    public function create(): View
    {
        return view('admin.layanan_pt.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'paket' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Simpan data layanan PT
        $layananPt = ItemLayananPt::create([
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

        // Simpan detail layanan PT
        ItemLayananPtDetail::create([
            'layanan_id' => $layananPt->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'paket' => $request->paket,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.layanan-pt.index')
            ->with('success', 'Layanan PT berhasil dibuat.');
    }

    public function show(ItemLayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('admin.layanan_pt.show', compact('layananPt'));
    }

    public function edit(ItemLayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('admin.layanan_pt.edit', compact('layananPt'));
    }

    public function update(Request $request, ItemLayananPt $layananPt): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'paket' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|min:1',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        $layananPt->update($request->only(['judul', 'harga']));

        $detail = $layananPt->detail;
        $filePath = $detail->file_path; // default: tetap gunakan file lama

        // Tentukan apakah user upload file baru / ganti link
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            // Jika sebelumnya file lokal (bukan link), hapus file lama
            if ($filePath && !Str::startsWith($filePath, ['http://', 'https://'])) {
                Storage::disk('public')->delete($filePath);
            }

            // Simpan file baru
            $filePath = $request->file('file_upload')->store('layanan_pt_files', 'public');
            } elseif ($validated['file_type'] === 'link') {
                // Jika user mengganti menjadi link
                if ($filePath && !Str::startsWith($filePath, ['http://', 'https://'])) {
                    Storage::disk('public')->delete($filePath);
                }
                $filePath = $validated['file_link'];
            }
    
        $layananPt->detail->update([
            'deskripsi' => $request->deskripsi,
            'paket' => $request->paket,
            'benefit' => $request->benefit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.layanan-pt.index')->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(ItemLayananPt $layananPt): RedirectResponse
    {
        $layananPt->detail()->delete();
        $layananPt->delete();
        return redirect()->route('admin.layanan-pt.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemWebinar;
use App\Models\ItemWebinarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemWebinarController extends Controller
{
    public function index()
    {
        $webinars = ItemWebinar::with('detailWebinar')->latest()->get();
        
        return view('admin.webinar.index', compact('webinars'));
    }

    public function create()
    {
        return view('admin.webinar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i',
            'harga' => 'required|numeric',
            'pembicara' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kuota_peserta' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'fasilitas' => 'required|string',
            'kontak_person' => 'required|string|max:255',
            'file_path' => 'nullable|string|max:255'
        ]);
    
        // Upload gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('webinar-images', 'public');
        }
    
        // Create ItemWebinar
        $itemWebinar = ItemWebinar::create([
            'gambar' => $gambarPath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'harga' => $request->harga
        ]);
    
        // Create DetailWebinar
        ItemWebinarDetail::create([
            'item_webinar_id' => $itemWebinar->id,
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person,
            'file_path' => $request->file_path,
        ]);
    
        return redirect()->route('admin.webinar.index')
            ->with('success', 'Webinar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $webinar = ItemWebinar::with('detailWebinar')->findOrFail($id);
        return view('item_webinar.show', compact('webinar'));
    }

    public function edit($id)
    {
        $webinar = ItemWebinar::with('detailWebinar')->findOrFail($id);
        return view('admin.webinar.edit', compact('webinar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i',
            'harga' => 'required|numeric',
            'pembicara' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kuota_peserta' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'fasilitas' => 'required|string',
            'kontak_person' => 'required|string|max:255',
            'file_path' => 'nullable|string|max:255'
        ]);
    
        $itemWebinar = ItemWebinar::with('detailWebinar')->findOrFail($id);
    
        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            if ($itemWebinar->gambar) {
                Storage::disk('public')->delete($itemWebinar->gambar);
            }
            $gambarPath = $request->file('gambar')->store('webinar-images', 'public');
            $itemWebinar->gambar = $gambarPath;
        }
    
        // Update ItemWebinar
        $itemWebinar->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'harga' => $request->harga
        ]);
    
        // Update DetailWebinar
        $itemWebinar->detailWebinar->update([
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person,
            'file_path' => $request->file_path,
        ]);
    
        return redirect()->route('admin.webinar.index')
            ->with('success', 'Webinar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $itemWebinar = ItemWebinar::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($itemWebinar->gambar) {
            Storage::disk('public')->delete($itemWebinar->gambar);
        }
        
        $itemWebinar->delete();

        return redirect()->route('admin.webinar.index')
            ->with('success', 'Webinar berhasil dihapus.');
    }
}

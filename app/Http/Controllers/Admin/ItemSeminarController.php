<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemSeminar;
use App\Models\ItemSeminarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemSeminarController extends Controller
{
    public function index()
    {
        $seminars = ItemSeminar::with('detail')->latest()->get();
        return view('admin.seminar.index', compact('seminars'));
    }

    public function create()
    {
        return view('admin.seminar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i', // validasi waktu
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
            $gambarPath = $request->file('gambar')->store('seminar-images', 'public');
        }
    
        // Create ItemSeminar
        $itemSeminar = ItemSeminar::create([
            'gambar' => $gambarPath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan, // ditambahkan
            'harga' => $request->harga
        ]);
    
        // Create detail
        ItemSeminarDetail::create([
            'item_seminar_id' => $itemSeminar->id,
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person,
            'file_path' => $request->file_path,
        ]);
    
        return redirect()->route('admin.seminar.index')
            ->with('success', 'Seminar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $seminar = ItemSeminar::with('detail')->findOrFail($id);
        return view('item_seminar.show', compact('seminar'));
    }

    public function edit($id)
    {
        $seminar = ItemSeminar::with('detail')->findOrFail($id);
        return view('admin.seminar.edit', compact('seminar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i', // validasi waktu
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
    
        $itemSeminar = ItemSeminar::with('detail')->findOrFail($id);
    
        // Update gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($itemSeminar->gambar) {
                Storage::disk('public')->delete($itemSeminar->gambar);
            }
            $gambarPath = $request->file('gambar')->store('seminar-images', 'public');
            $itemSeminar->gambar = $gambarPath;
        }
    
        // Update ItemSeminar
        $itemSeminar->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan, // ditambahkan
            'harga' => $request->harga
        ]);
    
        // Update detail
        $itemSeminar->detail->update([
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person,
            'file_path' => $request->file_path,
        ]);
    
        return redirect()->route('admin.seminar.index')
            ->with('success', 'Seminar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $itemSeminar = ItemSeminar::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($itemSeminar->gambar) {
            Storage::disk('public')->delete($itemSeminar->gambar);
        }
        
        $itemSeminar->delete();

        return redirect()->route('admin.seminar.index')
            ->with('success', 'Seminar berhasil dihapus.');
    }
}

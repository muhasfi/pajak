<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailSeminar;
use App\Models\ItemSeminar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemSeminarController extends Controller
{
   // app/Http/Controllers/ItemSeminarController.php

public function index()
{
    $seminars = ItemSeminar::with('detailSeminar')
        ->latest()
        ->paginate(10); // 10 items per page
    
    return view('customer.pelatihan.seminars', compact('seminars'));
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
            'kontak_person' => 'required|string|max:255'
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
    
        // Create DetailSeminar
        DetailSeminar::create([
            'item_seminar_id' => $itemSeminar->id,
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person
        ]);
    
        return redirect()->route('item-seminar.index')
            ->with('success', 'Seminar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $seminar = ItemSeminar::with('detailSeminar')->findOrFail($id);
        return view('item_seminar.show', compact('seminar'));
    }

    public function edit($id)
    {
        $seminar = ItemSeminar::with('detailSeminar')->findOrFail($id);
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
            'kontak_person' => 'required|string|max:255'
        ]);
    
        $itemSeminar = ItemSeminar::with('detailSeminar')->findOrFail($id);
    
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
    
        // Update DetailSeminar
        $itemSeminar->detailSeminar->update([
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'kategori' => $request->kategori,
            'level' => $request->level,
            'fasilitas' => $request->fasilitas,
            'kontak_person' => $request->kontak_person
        ]);
    
        return redirect()->route('item-seminar.index')
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

        return redirect()->route('item-seminar.index')
            ->with('success', 'Seminar berhasil dihapus.');
    }
}

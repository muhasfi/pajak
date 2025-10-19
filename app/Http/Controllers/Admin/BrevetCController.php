<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBrevetC;
use App\Models\ItemBrevetCDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrevetCController extends Controller
{
    public function index()
    {
        $brevetCs = ItemBrevetC::with('details')->latest()->get();
        return view('admin.brevetc.index', compact('brevetCs'));
    }

    public function create()
    {
        return view('admin.brevetc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|array',
            'fasilitas.*' => 'required|string',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string'
        ]);

        // Upload gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('brevet_c', 'public');
        }

        // Create brevet C
        $brevetC = ItemBrevetC::create([
            'gambar' => $gambarPath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'hari' => $request->hari,
            'lokasi' => $request->lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan, 
            'harga' => $request->harga,
        ]);

        // Create details
        foreach ($request->fasilitas as $index => $fasilitas) {
            ItemBrevetCDetail::create([
                'brevet_c_id' => $brevetC->id,
                'fasilitas' => $fasilitas,
                'keterangan' => $request->keterangan[$index] ?? null,
                'urutan' => $index
            ]);
        }

        return redirect()->route('admin.brevetc.index')->with('success', 'Data brevet C berhasil ditambahkan.');
    }

    public function show(ItemBrevetC $brevetC)
    {
        $brevetC->load('details');
        return view('brevet_c.show', compact('brevetC'));
    }

    public function edit(ItemBrevetC $brevetC)
    {
        $brevetC->load('details');
        return view('admin.brevetc.edit', compact('brevetC'));
    }

    public function update(Request $request, ItemBrevetC $brevetC)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i',
            'lokasi' => 'required|string|max:255',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|array',
            'fasilitas.*' => 'required|string',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string'
        ]);

        // Update gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($brevetC->gambar) {
                Storage::disk('public')->delete($brevetC->gambar);
            }
            $gambarPath = $request->file('gambar')->store('brevet_c', 'public');
            $brevetC->gambar = $gambarPath;
        }

        // Update brevet C
        $brevetC->update([
            'judul'              => $request->judul,
            'deskripsi'          => $request->deskripsi,
            'hari'               => $request->hari,
            'tanggal_mulai'      => $request->tanggal_mulai,
            'lokasi'             => $request->lokasi,
            'waktu_pelaksanaan'  => $request->waktu_pelaksanaan,
            'tanggal_selesai'    => $request->tanggal_selesai,
            'harga'              => $request->harga,
        ]);

        // Update details - hapus yang lama dan buat baru
        $brevetC->details()->delete();
        foreach ($request->fasilitas as $index => $fasilitas) {
            ItemBrevetCDetail::create([
                'brevet_c_id' => $brevetC->id,
                'fasilitas' => $fasilitas,
                'keterangan' => $request->keterangan[$index] ?? null,
                'urutan' => $index
            ]);
        }

        return redirect()->route('admin.brevetc.index')->with('success', 'Data brevet C berhasil diperbarui.');
    }

    public function destroy(ItemBrevetC $brevetC)
    {
        // Hapus gambar
        if ($brevetC->gambar) {
            Storage::disk('public')->delete($brevetC->gambar);
        }

        $brevetC->delete();

        return redirect()->route('admin.brevetc.index')->with('success', 'Data brevet C berhasil dihapus.');
    }
}
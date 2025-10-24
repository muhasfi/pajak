<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBrevetAB;
use App\Models\ItemBrevetABDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrevetABController extends Controller
{
    public function index()
    {
        $brevetabs = ItemBrevetAB::with('detail')->latest()->get();
        return view('admin.brevetab.index', compact('brevetabs'));
    }

    public function create()
    {
        return view('admin.brevetab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|string|max:255',
            'deskripsi_fasilitas' => 'nullable|string',
            'durasi_jam' => 'nullable|integer|min:1',
            'instruktur' => 'nullable|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kuota_peserta' => 'required|integer|min:1',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'syarat_peserta' => 'nullable|string',
            'materi_pelatihan' => 'nullable|string',
            'file_option' => 'required|in:upload,link',
            'file_upload' => 'required_if:file_option,upload|file|mimes:pdf,doc,docx|max:5120',
            'file_link'   => 'required_if:file_option,link|url|max:255',
        ]);

        if ($request->file_option === 'upload') {
            // Simpan file ke storage/public/uploads
            $path = $request->file('file_upload')->store('brevetab_files', 'public');
        } else {
            // Simpan langsung link yang dimasukkan user
            $path = $request->file_link;
        }


        // Upload gambar
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('brevetab', 'public');
        }

        // Create brevetab
        $brevetab = ItemBrevetAB::create([
            'gambar' => $gambarPath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'hari' => $request->hari,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'harga' => $request->harga,
        ]);

        // Create detail
        ItemBrevetABDetail::create([
            'brevetab_id' => $brevetab->id,
            'fasilitas' => $request->fasilitas,
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
            'durasi_jam' => $request->durasi_jam,
            'instruktur' => $request->instruktur,
            'lokasi' => $request->lokasi,
            'kuota_peserta' => $request->kuota_peserta,
            'level' => $request->level,
            'syarat_peserta' => $request->syarat_peserta,
            'materi_pelatihan' => $request->materi_pelatihan,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.brevetab.index')->with('success', 'Data brevet AB berhasil ditambahkan.');
    }

    public function show(ItemBrevetAB $brevetab)
    {
        $brevetab->load('detail');
        return view('admin.brevetab.show', compact('brevetab'));
    }

    public function edit(ItemBrevetAB $brevetab)
    {
        $brevetab->load('detail');
        return view('admin.brevetab.edit', compact('brevetab'));
    }

    // app/Http/Controllers/BrevetABController.php

public function update(Request $request, ItemBrevetAB $brevetab)
{
    $request->validate([
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'hari' => 'required|string|max:100',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'harga' => 'required|numeric|min:0',
        'fasilitas' => 'required|string|max:255',
        'deskripsi_fasilitas' => 'nullable|string',
        'durasi_jam' => 'nullable|integer|min:1',
        'instruktur' => 'nullable|string|max:255',
        'lokasi' => 'required|string|max:255',
        'kuota_peserta' => 'required|integer|min:1',
        'level' => 'required|in:Beginner,Intermediate,Advanced',
        'syarat_peserta' => 'nullable|string',
        'materi_pelatihan' => 'nullable|string',
        'file_option' => 'required|in:upload,link',
        'file_upload' => 'required_if:file_option,upload|file|mimes:pdf,doc,docx|max:5120',
        'file_link'   => 'required_if:file_option,link|url|max:255',
    ]);

    $Path = null;
    if ($request->file_option === 'upload' && $request->hasFile('file_upload')) {
        // Hapus file lama jika ada
        if ($brevetab->detail && $brevetab->detail->file_path) {
            Storage::disk('public')->delete($brevetab->detail->file_path);
        }
        $Path = $request->file('file_upload')->store('brevetab_files', 'public');
    } elseif ($request->file_option === 'link') {
        $Path = $request->file_link;
    }
    

    // Handle hapus gambar
    if ($request->has('hapus_gambar')) {
        if ($brevetab->gambar) {
            Storage::disk('public')->delete($brevetab->gambar);
        }
        $brevetab->gambar = null;
    }

    // Update gambar jika ada file baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($brevetab->gambar) {
            Storage::disk('public')->delete($brevetab->gambar);
        }
        $gambarPath = $request->file('gambar')->store('brevetab', 'public');
        $brevetab->gambar = $gambarPath;
    }

    // Update brevetab
    $brevetab->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'hari' => $request->hari,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'harga' => $request->harga,
        'gambar' => $brevetab->gambar, // Include the updated gambar value
    ]);

    // Update detail
    $brevetab->detail->update([
        'fasilitas' => $request->fasilitas,
        'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
        'durasi_jam' => $request->durasi_jam,
        'instruktur' => $request->instruktur,
        'lokasi' => $request->lokasi,
        'kuota_peserta' => $request->kuota_peserta,
        'level' => $request->level,
        'syarat_peserta' => $request->syarat_peserta,
        'materi_pelatihan' => $request->materi_pelatihan,
        'file_path' => $Path,
    ]);

    return redirect()->route('admin.brevetab.index')->with('success', 'Data brevet AB berhasil diperbarui.');
}

    public function destroy(ItemBrevetAB $brevetab)
    {
        // Hapus gambar
        if ($brevetab->gambar) {
            Storage::disk('public')->delete($brevetab->gambar);
        }

        $brevetab->delete();

        return redirect()->route('admin.brevetab.index')->with('success', 'Data brevet AB berhasil dihapus.');
    }
}
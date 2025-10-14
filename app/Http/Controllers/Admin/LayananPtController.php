<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananPt; // Pastikan model LayananPt di-import
use App\Models\LayananPtDetail; // Import model LayananPtDetail
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LayananPtController extends Controller
{
    public function index(): View
    {
        $layanans = LayananPt::with('detail')->latest()->paginate(5);
        return view('admin.layanan_pt.index', compact('layanans'));
    }

    public function create(): View
    {
        return view('admin.layanan_pt.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|min:1'
        ]);

        // Gunakan transaction untuk memastikan data konsisten
        DB::transaction(function () use ($request) {
            // Simpan data ke tabel utama layanan_pt
            $layanan = LayananPt::create([
                'judul' => $request->judul,
                'harga' => $request->harga
            ]);

            // Simpan data ke tabel detail layanan_pt_detail
            LayananPtDetail::create([
                'layanan_pt_id' => $layanan->id, // Gunakan ID dari data yang baru dibuat
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        });

        return redirect()->route('layanan-pt.index')
                        ->with('success', 'Layanan berhasil dibuat!');
    }

    public function show(LayananPt $layananPt): View
    {
        $layananPt->load('detail'); // Eager load relasi detail
        return view('layanan_pt.show', compact('layananPt'));
    }

    public function edit(LayananPt $layananPt): View
    {
        $layananPt->load('detail'); // Eager load relasi detail
        return view('admin.layanan_pt.edit', compact('layananPt'));
    }

    public function update(Request $request, LayananPt $layananPt): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|min:1'
        ]);

        // Gunakan transaction untuk update
        DB::transaction(function () use ($request, $layananPt) {
            // Update data di tabel utama
            $layananPt->update([
                'judul' => $request->judul,
                'harga' => $request->harga
            ]);

            // Update atau buat data detail
            if ($layananPt->detail) {
                // Jika detail sudah ada, update
                $layananPt->detail->update([
                    'deskripsi' => $request->deskripsi,
                    'benefit' => $request->benefit
                ]);
            } else {
                // Jika detail belum ada, buat baru
                LayananPtDetail::create([
                    'layanan_pt_id' => $layananPt->id,
                    'deskripsi' => $request->deskripsi,
                    'benefit' => $request->benefit
                ]);
            }
        });

        return redirect()->route('layanan-pt.index')
                        ->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(LayananPt $layananPt): RedirectResponse
    {
        // Hapus data detail terlebih dahulu, lalu data utama
        // Jika menggunakan onDelete('cascade') di migration, ini akan otomatis terhapus
        $layananPt->detail()->delete(); // Hapus data detail
        $layananPt->delete(); // Hapus data utama

        return redirect()->route('layanan-pt.index')
                        ->with('success', 'Layanan berhasil dihapus!');
    }
}
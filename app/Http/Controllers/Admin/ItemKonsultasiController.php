<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemKonsultasi;
use App\Models\ItemKonsultasiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemKonsultasiController extends Controller
{
    public function index()
    {
        $layanan = ItemKonsultasi::with('detail')->get();
        return view('admin.konsultasi.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.konsultasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255',
            'waktu_menit' => 'required|date_format:H:i',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Simpan data Konsultasi
        $konsultasi = ItemKonsultasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $filePath = null;
            if ($request->file_option === 'upload') {
                $filePath = $request->file('file_upload')->store('konsultasi', 'public');
            } elseif ($request->file_option === 'link') {
                $filePath = $request->file_link;
            }

        $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('konsultasi', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

            list($jam, $menit) = explode(':', $request->waktu_menit);
            $totalMenit = ((int)$jam * 60) + (int)$menit;

        // Simpan detail konsultasi
        ItemKonsultasiDetail::create([
            'item_konsultasi_id' => $konsultasi->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'waktu_menit' => $totalMenit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan Konsultasi berhasil dibuat.');
    }

    public function show($id)
    {
        $layanan = ItemKonsultasi::with('detail')->findOrFail($id);
        return view('admin.konsultasi.show', compact('layanan'));
    }

    public function edit($id)
    {
        $layanan = ItemKonsultasi::with('detail')->findOrFail($id);
        return view('admin.konsultasi.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'required|string',
            'benefit'     => 'required|array',
            'benefit.*'   => 'string|max:255',
            'waktu_menit' => 'required|date_format:H:i',
            'file_type'   => 'required|in:upload,link,keep',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
            'file_link'   => 'nullable|url'
        ]);

        // Ambil data konsultasi dan relasi detail
        $konsultasi = ItemKonsultasi::with('detail')->findOrFail($id);

        // Update data utama
        $konsultasi->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        // Konversi waktu dari format jam:menit ke total menit
        [$jam, $menit] = explode(':', $validated['waktu_menit']);
        $totalMenit = ((int)$jam * 60) + (int)$menit;

        // Ambil file path lama (jika ada)
        $filePath = $konsultasi->detail->file_path ?? null;

        // Tentukan tindakan berdasarkan jenis file
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            // Hapus file lama jika sebelumnya berupa upload lokal
            if ($filePath && !filter_var($filePath, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            // Simpan file baru
            $filePath = $request->file('file_upload')->store('konsultasi', 'public');
        } 
        elseif ($validated['file_type'] === 'link') {
            // Hapus file lokal lama jika sebelumnya berupa file upload
            if ($filePath && !filter_var($filePath, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            // Simpan link baru
            $filePath = $validated['file_link'];
        }
        // Jika file_type === 'keep', tidak melakukan apa-apa (file lama tetap digunakan)

        // Update detail konsultasi
        $konsultasi->detail->update([
            'deskripsi'    => $validated['deskripsi'],
            'benefit'      => $validated['benefit'],
            'waktu_menit'  => $totalMenit,
            'file_path'    => $filePath,
        ]);

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan Konsultasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = ItemKonsultasi::findOrFail($id);
        $layanan->delete();

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan konsultasi berhasil dihapus.');
    }
}

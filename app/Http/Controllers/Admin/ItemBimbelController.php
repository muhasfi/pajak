<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBimbel;
use App\Models\ItemBimbelDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemBimbelController extends Controller
{
    // Tampilan Admin
    public function index()
    {
        $items = ItemBimbel::orderBy('judul', 'asc')->get();

        return view('admin.bimbel.index', compact('items'));
    }

    public function create()
    {
        return view('admin.bimbel.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'is_active' => 'boolean',

            // untuk detail (array)
            'details.*.judul' => 'required|string|max:255',
            'details.*.deskripsi' => 'nullable|string',
            'details.*.materi_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'details.*.video_type' => 'nullable|string|in:upload,youtube',
            'details.*.video_upload' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:51200', // max 50MB misal
            'details.*.video_link' => 'nullable|url|max:255',
            'details.*.urutan' => 'nullable|integer',
            'details.*.is_active' => 'boolean',

        ]);

        DB::beginTransaction();
        try {
            // Simpan master item_bimbel
            $itemBimbel = ItemBimbel::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'is_active' => $request->is_active ?? true,
            ]);

            // Simpan detail jika ada
            if ($request->has('details')) {
                foreach ($request->details as $detail) {
                    // upload pdf jika ada
                    $materiPdf = null;
                    if (isset($detail['materi_pdf']) && $detail['materi_pdf'] instanceof \Illuminate\Http\UploadedFile) {
                        $materiPdf = $detail['materi_pdf']->store('materi_pdf', 'public');
                    }



                    $videoPath = null;
                    if (isset($detail['video_type']) && $detail['video_type'] === 'upload' && isset($detail['video_upload'])) {
                        $videoPath = $detail['video_upload']->store('videos', 'public');
                    } elseif (isset($detail['video_type']) && $detail['video_type'] === 'youtube') {
                        $videoPath = $detail['video_link']; // simpan langsung link yt
                    } else {
                        $videoPath = null;
                    }

                    ItemBimbelDetail::create([
                        'item_bimbel_id' => $itemBimbel->id,
                        'judul' => $detail['judul'],
                        'deskripsi' => $detail['deskripsi'] ?? null,
                        'materi_pdf' => $materiPdf,
                        'video' => $videoPath,
                        'urutan' => $detail['urutan'] ?? null,
                        'is_active' => $detail['is_active'] ?? true,
                    ]);
                }
            }

            DB::commit();
            // dd();
            return redirect()->route('bimbel.index')->with('success', 'Paket bimbel berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(ItemBimbel $bimbel)
    {
        // pastikan relasi details ikut di-load
        $bimbel->load('details');

        return view('admin.bimbel.show', [
            'item' => $bimbel
        ]);
    }

    public function edit(ItemBimbel $bimbel)
    {
        $bimbel->load('details');
        return view('admin.bimbel.edit', compact('bimbel'));
    }

    public function update(Request $request, ItemBimbel $bimbel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'details' => 'required|array',
            'details.*.judul' => 'required|string|max:255',
        ]);

        // update master
        $bimbel->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'is_active' => $request->is_active ?? true,
        ]);

        // hapus detail lama (biar tidak numpuk data)
        $bimbel->details()->delete();

        // simpan detail baru
        foreach ($request->details as $detail) {
            $videoPath = null;

            if (isset($detail['video_type']) && $detail['video_type'] === 'upload' && isset($detail['video_upload'])) {
                $videoPath = $detail['video_upload']->store('videos', 'public');
            } elseif (isset($detail['video_type']) && $detail['video_type'] === 'youtube') {
                $videoPath = $detail['video_link'];
            }

            $pdfPath = null;
            if (isset($detail['materi_pdf'])) {
                $pdfPath = $detail['materi_pdf']->store('materi', 'public');
            }

            $bimbel->details()->create([
                'judul'      => $detail['judul'],
                'deskripsi'  => $detail['deskripsi'] ?? null,
                'materi_pdf' => $pdfPath,
                'video'      => $videoPath,
                'urutan'     => $detail['urutan'] ?? 0,
                'is_active'  => $detail['is_active'] ?? true,
            ]);
        }

        return redirect()->route('bimbel.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(ItemBimbel $bimbel)
    {
        // kalau pakai cascade DB, cukup:
        $bimbel->delete();

        // kalau pakai Eloquent boot deleting, juga cukup ini:
        // $bimbel->delete();

        return redirect()->route('bimbel.index')
            ->with('success', 'Item bimbel dan semua modulnya berhasil dihapus.');
    }


    // // Tampilan Customer
    // public function customerIndex()
    // {
    //     $items = ItemBimbel::where('is_active', true)->get();
    //     return view('customer.item_bimbel.index', compact('items'));
    // }

    // public function customerShow(ItemBimbel $itemBimbel)
    // {
    //     if (!$itemBimbel->is_active) {
    //         abort(404);
    //     }
        
    //     return view('customer.item_bimbel.show', compact('itemBimbel'));
    // }
}

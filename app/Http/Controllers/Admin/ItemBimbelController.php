<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBimbel;
// use App\Models\ItemBimbelDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemBimbelController extends Controller
{
    // Tampilan Admin
    public function index()
    {
        $items = ItemBimbel::all();
        return view('admin.bimbel.index', compact('items'));
    }

    public function create()
    {
        return view('admin.bimbel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'materi_pdf' => 'nullable|file|mimes:pdf|max:2048',
        'video' => 'nullable|file|mimes:mp4,mov,avi|max:51200', // Maksimal 50MB
        'harga' => 'required|numeric|min:0',
        'is_active' => 'boolean'
    ]);

    $data = $request->all();

    // Upload PDF
    if ($request->hasFile('materi_pdf')) {
        $file = $request->file('materi_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('materi_pdf', $filename, 'public');
        $data['materi_pdf'] = $path;
    }

    // Upload Video
    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $videoPath = $video->storeAs('videos', $videoName, 'public');
        $data['video'] = $videoPath;
    }

    ItemBimbel::create($data);

    return redirect()->route('item-bimbel.index')
        ->with('success', 'Item bimbel berhasil ditambahkan.');
}

    public function show(ItemBimbel $itemBimbel)
    {
        return view('admin.bimbel.show', compact('itemBimbel'));
    }

    public function edit(ItemBimbel $itemBimbel)
    {
        return view('admin.bimbel.edit', compact('itemBimbel'));
    }

    public function update(Request $request, ItemBimbel $itemBimbel)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'materi_pdf' => 'nullable|file|mimes:pdf|max:2048',
        'video' => 'nullable|file|mimes:mp4,mov,avi|max:51200', // Maksimal 50MB
        'harga' => 'required|numeric|min:0',
        'is_active' => 'boolean'
    ]);

    $data = $request->all();

    // Upload PDF baru (jika ada)
    if ($request->hasFile('materi_pdf')) {
        // Hapus file lama jika ada
        if ($itemBimbel->materi_pdf) {
            Storage::disk('public')->delete($itemBimbel->materi_pdf);
        }

        $file = $request->file('materi_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('materi_pdf', $filename, 'public');
        $data['materi_pdf'] = $path;
    }

    // Upload Video baru (jika ada)
    if ($request->hasFile('video')) {
        // Hapus video lama jika ada
        if ($itemBimbel->video) {
            Storage::disk('public')->delete($itemBimbel->video);
        }

        $video = $request->file('video');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $videoPath = $video->storeAs('videos', $videoName, 'public');
        $data['video'] = $videoPath;
    }

    $itemBimbel->update($data);

    return redirect()->route('item-bimbel.index')
        ->with('success', 'Item bimbel berhasil diperbarui.');
}

    public function destroy(ItemBimbel $itemBimbel)
    {
        // Hapus file PDF jika ada
        if ($itemBimbel->materi_pdf) {
            Storage::disk('public')->delete($itemBimbel->materi_pdf);
        }

        $itemBimbel->delete();

        return redirect()->route('item-bimbel.index')
            ->with('success', 'Item bimbel berhasil dihapus.');
    }

    // Tampilan Customer
    public function customerIndex()
    {
        $items = ItemBimbel::where('is_active', true)->get();
        return view('customer.item_bimbel.index', compact('items'));
    }

    public function customerShow(ItemBimbel $itemBimbel)
    {
        if (!$itemBimbel->is_active) {
            abort(404);
        }
        
        return view('customer.item_bimbel.show', compact('itemBimbel'));
    }
    
}
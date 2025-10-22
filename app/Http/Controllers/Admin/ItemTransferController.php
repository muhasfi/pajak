<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemTransfer;
use App\Models\ItemTransferDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemTransferController extends Controller
{
    public function index(): View
    {
        $transfers = ItemTransfer::with('detail')->latest()->get();
        return view('admin.transfer.index', compact('transfers'));
    }
    
    public function create(): View
    {
        return view('admin.transfer.create');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Simpan data Audit
        $transfer = ItemTransfer::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $filePath = null;
            if ($request->file_option === 'upload') {
                $filePath = $request->file('file_upload')->store('transfer', 'public');
            } elseif ($request->file_option === 'link') {
                $filePath = $request->file_link;
            }

        $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('ebooks', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

        // Simpan detail transfer
        ItemTransferDetail::create([
            'item_transfer_id' => $transfer->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.transfer.index')
            ->with('success', 'Layanan Transfer berhasil dibuat.');
    }

    public function show(ItemTransfer $transfer): View
    {
        $transfer->load('detail');
        return view('transfers.show', compact('transfer'));
    }

    public function edit(ItemTransfer $transfer): View
    {
        $transfer->load('detail');
        return view('admin.transfer.edit', compact('transfer'));
    }

    public function update(Request $request, ItemTransfer $transfer): RedirectResponse
    {
       $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'deskripsi' => 'required|string',
        'benefit' => 'required|array',
        'benefit.*' => 'string|max:255',
        'file_type'   => 'required|in:upload,link,keep',
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
        'file_link'   => 'nullable|url'
        ]);

        // Ambil data litigasi beserta detail-nya
        $litigasi = ItemTransfer::with('detail')->findOrFail($transfer->id);

        // Update data utama
        $litigasi->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        // Ambil file path lama (jika ada)
        $filePath = $litigasi->detail->file_path ?? null;

        // Jika upload file baru
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('transfer', 'public');
        }
        // Jika pakai link baru
        elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }
        // Jika 'keep' maka biarkan file lama tetap digunakan

        // Update detail litigasi
        $litigasi->detail->update([
            'deskripsi' => $validated['deskripsi'],
            'benefit'   => $validated['benefit'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.transfer.index')
            ->with('success', 'Layanan Transfer berhasil diperbarui.');
    }

    public function destroy(ItemTransfer $transfer): RedirectResponse
    {
        $transfer->delete();
        return redirect()->route('admin.transfer.index')
            ->with('success', 'Data transfer berhasil dihapus.');
    }
}

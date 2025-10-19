<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemTransfer;
use App\Models\ItemTransferDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|string'
        ]);
        
        // Simpan data transfer
        $transfer = ItemTransfer::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);
        
        // Format benefit dari textarea ke array
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        
        // Simpan detail transfer
        ItemTransferDetail::create([
            'item_transfer_id' => $transfer->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => json_encode($benefits)
        ]);
        
        return redirect()->route('admin.transfer.index')
            ->with('success', 'Data transfer berhasil ditambahkan.');
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|string'
        ]);
        
        // Update data transfer
        $transfer->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);
        
        // Format benefit dari textarea ke array
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        
        // Update atau buat detail transfer
        if ($transfer->detail) {
            $transfer->detail->update([
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits)
            ]);
        } else {
            ItemTransferDetail::create([
                'item_transfer_id' => $transfer->id,
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits)
            ]);
        }

        return redirect()->route('admin.transfer.index')
            ->with('success', 'Data transfer berhasil diupdate.');
    }

    public function destroy(ItemTransfer $transfer): RedirectResponse
    {
        $transfer->delete();
        return redirect()->route('admin.transfer.index')
            ->with('success', 'Data transfer berhasil dihapus.');
    }
}

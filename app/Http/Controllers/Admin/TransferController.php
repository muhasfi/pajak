<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\TransferDetail; // Tambahkan ini
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransferController extends Controller
{
    public function index(): View
    {
        $transfers = Transfer::with('details')->latest()->paginate(5);
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
        $transfer = Transfer::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);
        
        // Format benefit dari textarea ke array
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        
        // Simpan detail transfer
        TransferDetail::create([
            'transfer_id' => $transfer->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => json_encode($benefits)
        ]);
        
        return redirect()->route('transfers.index')
            ->with('success', 'Data transfer berhasil ditambahkan.');
    }
    
    public function show(Transfer $transfer): View
    {
        $transfer->load('details');
        return view('transfers.show', compact('transfer'));
    }
    
    public function edit(Transfer $transfer): View
    {
        $transfer->load('details');
        return view('admin.transfer.edit', compact('transfer'));
    }
    
    public function update(Request $request, Transfer $transfer): RedirectResponse
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
        if ($transfer->details->count() > 0) {
            $transfer->details()->first()->update([
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits)
            ]);
        } else {
            TransferDetail::create([
                'transfer_id' => $transfer->id,
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits)
            ]);
        }
        
        return redirect()->route('transfers.index')
            ->with('success', 'Data transfer berhasil diupdate.');
    }
    
    public function destroy(Transfer $transfer): RedirectResponse
    {
        $transfer->delete();
        return redirect()->route('transfers.index')
            ->with('success', 'Data transfer berhasil dihapus.');
    }
}
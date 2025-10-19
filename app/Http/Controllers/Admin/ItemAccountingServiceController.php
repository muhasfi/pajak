<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAccountingService;
use App\Models\ItemAccountingServiceDetail;
use Illuminate\Http\Request;

class ItemAccountingServiceController extends Controller
{
     public function index()
    {
        $services = ItemAccountingService::with('details')->get();
        return view('admin.akuntansi.index', compact('services'));
    }

    public function create()
    {
        return view('admin.akuntansi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        // Create main service
        $service = ItemAccountingService::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Create service details
        ItemAccountingServiceDetail::create([
            'accounting_service_id' => $service->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil ditambahkan.');
    }

    public function show(ItemAccountingService $accountingService)
    {
        $accountingService->load('details');
        return view('admin.akuntansi.show', compact('accountingService'));
    }

    public function edit(ItemAccountingService $accountingService)
    {
        $accountingService->load('details');
        return view('admin.akuntansi.edit', compact('accountingService'));
    }

    public function update(Request $request, ItemAccountingService $accountingService)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        // Update main service
        $accountingService->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Update service details
        $accountingService->details->update([
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil diperbarui.');
    }

    public function destroy(ItemAccountingService $accountingService)
    {
        $accountingService->delete();
        return redirect()->route('admin.accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil dihapus.');
    }
}

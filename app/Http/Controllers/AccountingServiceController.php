<?php
// app/Http/Controllers/AccountingServiceController.php

namespace App\Http\Controllers;

use App\Models\AccountingService;
use App\Models\AccountingServiceDetail;
use Illuminate\Http\Request;

class AccountingServiceController extends Controller
{
    public function index()
    {
        $services = AccountingService::with('details')->get();
        return view('customer.layanan.akuntansi', compact('services'));
    }

    public function create()
    {
        return view('accounting-services.create');
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
        $service = AccountingService::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Create service details
        AccountingServiceDetail::create([
            'accounting_service_id' => $service->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil ditambahkan.');
    }

    public function show(AccountingService $accountingService)
    {
        $accountingService->load('details');
        return view('accounting-services.show', compact('accountingService'));
    }

    public function edit(AccountingService $accountingService)
    {
        $accountingService->load('details');
        return view('accounting-services.edit', compact('accountingService'));
    }

    public function update(Request $request, AccountingService $accountingService)
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

        return redirect()->route('accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil diperbarui.');
    }

    public function destroy(AccountingService $accountingService)
    {
        $accountingService->delete();
        return redirect()->route('accounting-services.index')
            ->with('success', 'Jasa akuntansi berhasil dihapus.');
    }
}
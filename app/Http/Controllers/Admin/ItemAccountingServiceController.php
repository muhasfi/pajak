<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAccountingService;
use App\Models\ItemAccountingServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Create main service
        $service = ItemAccountingService::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $filePath = null;
        if ($request->file_option === 'upload') {
            $filePath = $request->file('file_upload')->store('layanan_pt_files', 'public');
        } elseif ($request->file_option === 'link') {
            $filePath = $request->file_link;
        }

        $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('ebooks', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

        // Create service details
        ItemAccountingServiceDetail::create([
            'accounting_service_id' => $service->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url'
        ]);

        // Update main service
        $accountingService->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $detail = $accountingService->detail;
        $filePath = $detail->file_path; // default: tetap gunakan file lama

        // Tentukan apakah user upload file baru / ganti link
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            // Jika sebelumnya file lokal (bukan link), hapus file lama
            if ($filePath && !Str::startsWith($filePath, ['http://', 'https://'])) {
                Storage::disk('public')->delete($filePath);
            }

            // Simpan file baru
            $filePath = $request->file('file_upload')->store('layanan_pt_files', 'public');
        } elseif ($validated['file_type'] === 'link') {
            // Jika user mengganti menjadi link
            if ($filePath && !Str::startsWith($filePath, ['http://', 'https://'])) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $validated['file_link'];
        }

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

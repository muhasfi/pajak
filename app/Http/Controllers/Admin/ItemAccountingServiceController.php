<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAccountingService;
use App\Models\ItemAccountingServiceDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemAccountingServiceController extends Controller
{
      // Menampilkan semua akuntansi
    public function index(): View
    {
        $akuntansis = ItemAccountingService::with('detail')->get();
        return view('admin.akuntansi.index', compact('akuntansis'));
    }

    // Menampilkan form create
    public function create(): View
    {
        return view('admin.akuntansi.create');
    }

    // Menyimpan data akuntansi baru
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

        // Simpan data Akuntansi
        $akuntansi = ItemAccountingService::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        $filePath = null;
            if ($request->file_option === 'upload') {
                $filePath = $request->file('file_upload')->store('audit', 'public');
            } elseif ($request->file_option === 'link') {
                $filePath = $request->file_link;
            }

        $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('ebooks', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

        // Simpan detail akuntansi
        ItemAccountingServiceDetail::create([
            'accounting_service_id' => $akuntansi->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.accounting-services.index')
            ->with('success', 'Layanan Akuntansi berhasil dibuat.');
    }

    // Menampilkan detail akuntansi
    public function show(ItemAccountingService $akuntansi): View
    {
        // Load data akuntansi beserta relasi detailnya
        $akuntansi->load('detail');
        return view('admin.accounting-services.show', compact('akuntansi'));
    }
    public function edit(ItemAccountingService $accounting_service): View
    {
        $accounting_service->load('detail');
        return view('admin.akuntansi.edit', compact('accounting_service'));
    }

    public function update(Request $request, ItemAccountingService $accounting_service): RedirectResponse
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

        $accounting_service->load('detail');

        $accounting_service->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        $filePath = $accounting_service->detail->file_path ?? null;

        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('audit', 'public');
        } elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }

        if ($accounting_service->detail) {
            $accounting_service->detail->update([
                'deskripsi' => $validated['deskripsi'],
                'benefit'   => $validated['benefit'],
                'file_path' => $filePath,
            ]);
        } else {
            $accounting_service->detail()->create([
                'deskripsi' => $validated['deskripsi'],
                'benefit'   => $validated['benefit'],
                'file_path' => $filePath,
            ]);
        }

        return redirect()->route('admin.accounting-services.index')
            ->with('success', 'Layanan Akuntansi berhasil diperbarui.');
    }


    // Hapus data akuntansi
    public function destroy(ItemAccountingService $accounting_service): RedirectResponse
    {
        $accounting_service->delete();
        return redirect()->route('admin.accounting-services.index')->with('success', 'Akuntansi berhasil dihapus.');
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAudit;
use App\Models\ItemAuditDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemAuditController extends Controller
{
    // Menampilkan semua audit
    public function index(): View
    {
        $audits = ItemAudit::latest()->paginate(5);
        return view('admin.audit.index', compact('audits'));
    }

    // Menampilkan form create
    public function create(): View
    {
        return view('admin.audit.create');
    }

    // Menyimpan data audit baru
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
        $audit = ItemAudit::create([
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

        // Simpan detail audit
        ItemAuditDetail::create([
            'audit_id' => $audit->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.audit.index')
            ->with('success', 'Layanan Audit berhasil dibuat.');
    }

    // Menampilkan detail audit
    public function show(ItemAudit $audit): View
    {
        // Load data audit beserta relasi detailnya
        $audit->load('detail');
        return view('admin.audit.show', compact('audit'));
    }
    // Menampilkan form edit
    public function edit(ItemAudit $audit): View
    {
        $audit->load('detail');
        return view('admin.audit.edit', compact('audit'));
    }

    // Update data audit
    public function update(Request $request, ItemAudit $audit): RedirectResponse
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

        // Ambil data audit beserta detail-nya
        $audit = ItemAudit::with('detail')->findOrFail($audit->id);

        // Update data utama
        $audit->update([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
        ]);

        // Ambil file path lama (jika ada)
        $filePath = $audit->detail->file_path ?? null;

        // Jika upload file baru
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('audit', 'public');
        }
        // Jika pakai link baru
        elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }
        // Jika 'keep' maka biarkan file lama tetap digunakan

        // Update detail audit
        $audit->detail->update([
            'deskripsi' => $validated['deskripsi'],
            'benefit'   => $validated['benefit'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.audit.index')
            ->with('success', 'Layanan Audit berhasil diperbarui.');
    }

    // Hapus data audit
    public function destroy(ItemAudit $audit): RedirectResponse
    {
        $audit->delete();
        return redirect()->route('admin.audit.index')->with('success', 'Audit berhasil dihapus.');
    }
}

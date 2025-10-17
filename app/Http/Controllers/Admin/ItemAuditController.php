<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAudit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $request->validate([
            'judul' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'benefit' => 'required',
        ]);
        // Simpan data Audit
        $audit = ItemAudit::create($request->only('judul', 'harga'));
        // Simpan data AuditDetail. Konversi benefit dari textarea ke array.
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        $audit->detail()->create([
            'deskripsi' => $request->deskripsi,
            'benefit' => json_encode($benefits), // Simpan sebagai JSON
        ]);
        return redirect()->route('admin.audit.index')->with('success', 'Audit berhasil dibuat.');
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
        $request->validate([
            'judul' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'benefit' => 'required',
        ]);
        // Update data Audit
        $audit->update($request->only('judul', 'harga'));
        // Update atau Create data AuditDetail
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        $audit->detail()->updateOrCreate(
            ['audit_id' => $audit->id],
            [
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits),
            ]
        );
        return redirect()->route('admin.audit.index')->with('success', 'Audit berhasil diupdate.');
    }

    // Hapus data audit
    public function destroy(ItemAudit $audit): RedirectResponse
    {
        $audit->delete();
        return redirect()->route('admin.audit.index')->with('success', 'Audit berhasil dihapus.');
    }
}

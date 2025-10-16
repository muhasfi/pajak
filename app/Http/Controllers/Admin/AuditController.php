<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\AuditDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class AuditController extends Controller
{
    // Menampilkan semua audit
    public function index(): View
    {
        $audits = Audit::latest()->paginate(5);
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
        $audit = Audit::create($request->only('judul', 'harga'));
        // Simpan data AuditDetail. Konversi benefit dari textarea ke array.
        $benefits = array_filter(array_map('trim', explode("\n", $request->benefit)));
        $audit->auditDetails()->create([
            'deskripsi' => $request->deskripsi,
            'benefit' => json_encode($benefits), // Simpan sebagai JSON
        ]);
        return redirect()->route('audits.index')->with('success', 'Audit berhasil dibuat.');
    }
    // Menampilkan detail audit
    public function show(Audit $audit): View
    {
        // Load data audit beserta relasi detailnya
        $audit->load('auditDetails');
        return view('audits.show', compact('audit'));
    }
    // Menampilkan form edit
    public function edit(Audit $audit): View
    {
        $audit->load('auditDetails');
        return view('admin.audit.edit', compact('audit'));
    }
    // Update data audit
    public function update(Request $request, Audit $audit): RedirectResponse
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
        $audit->auditDetails()->updateOrCreate(
            ['audit_id' => $audit->id],
            [
                'deskripsi' => $request->deskripsi,
                'benefit' => json_encode($benefits),
            ]
        );
        return redirect()->route('audits.index')->with('success', 'Audit berhasil diupdate.');
    }
    // Hapus data audit
    public function destroy(Audit $audit): RedirectResponse
    {
        $audit->delete();
        return redirect()->route('audits.index')->with('success', 'Audit berhasil dihapus.');
    }
}
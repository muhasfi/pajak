<?php
namespace App\Http\Controllers;
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
        return view('customer.layanan.audit', compact('audits'));
    }

    // Menampilkan detail audit
    public function show(Audit $audit): View
    {
        // Load data audit beserta relasi detailnya
        $audit->load('auditDetails');
        return view('audits.show', compact('audit'));
    }
    // Menampilkan form edit
   
}
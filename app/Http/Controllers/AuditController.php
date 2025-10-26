<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemAudit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index(): View
    {
        $audits = ItemAudit::latest()->paginate(5);
        return view('product.layanan.audit.audit', compact('audits'));
    }

    public function show($id)
    {
        $audit = ItemAudit::with('detail')->findOrFail($id);
        return view('product.layanan.audit.audit_show', compact('audit'));
    }
}

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
        return view('product.layanan.audit', compact('audits'));
    }

    // Menampilkan detail audit
    // public function show(ItemAudit $audit): View
    // {
    //     // Load data audit beserta relasi detailnya
    //     $audit->load('auditDetails');
    //     return view('audits.show', compact('audit'));
    // }
}

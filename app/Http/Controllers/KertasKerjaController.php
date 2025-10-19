<?php

namespace App\Http\Controllers;

use App\Models\ItemPaper;
use Illuminate\Http\Request;

class KertasKerjaController extends Controller
{
    public function pph21()
    {
        $papers = ItemPaper::with('categoryPaper')
            ->whereHas('categoryPaper', fn($q) => $q->where('name', 'PPh21'))
            ->get();

        return view('product.paper.kertas_kerja_pph21.kertas_pph', compact('papers'));
    }

    public function ppn()
    {
        $papers = ItemPaper::with('categoryPaper')
            ->whereHas('categoryPaper', fn($q) => $q->where('name', 'PPN'))
            ->get();

        return view('product.paper.ppn.kertas_ppn', compact('papers'));
    }

    public function spt()
    {
        $papers = ItemPaper::with('categoryPaper')
            ->whereHas('categoryPaper', fn($q) => $q->where('name', 'SPT Tahunan'))
            ->get();

        return view('product.paper.spt_tahunan.kertas_spt_tahunan', compact('papers'));
    }

    public function spt_unifikasi()
    {
        $papers = ItemPaper::with('categoryPaper')
            ->whereHas('categoryPaper', fn($q) => $q->where('name', 'SPT Masa Unifikasi'))
            ->get();

        return view('product.paper.spt_masa_unifikasi.kertas_spt_unifikasi', compact('papers'));
    }
}

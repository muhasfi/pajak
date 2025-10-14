<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LayananPembuatanPt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayananPembuatanPtController extends Controller
{
    public function index(): View
    {
        $layanans = LayananPembuatanPt::latest()->paginate(5);
        return view('customer.layanan.layanan_pt', compact('layanans'));
    }

    // public function show(LayananPembuatanPt $layanan): View
    // {
    //     $layanan->load('detailLayanans');
    //     return view('customer.layanan.show', compact('layanan'));
    // }
}
<?php

namespace App\Http\Controllers;

use App\Models\ItemWebinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        // Ambil data webinar + detail pembicara
        $webinars = ItemWebinar::with('detailWebinar')->latest()->get();

        return view('product.pelatihan.webinar', compact('webinars'));
    }
}

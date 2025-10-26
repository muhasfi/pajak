<?php

namespace App\Http\Controllers;

use App\Models\ItemWebinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        // Ambil data webinar + detail pembicara
        $webinars = ItemWebinar::with('detail')->latest()->get();

        return view('product.pelatihan.webinar.webinar', compact('webinars'));
    }

    public function show($id)
    {
        // Ambil data webinar beserta relasi detail
        $webinar = ItemWebinar::with('detail')->findOrFail($id);

        // Ambil 1 detail pertama (karena 1 webinar bisa punya banyak detail)
        $detail = $webinar->detail->first();

        return view('product.pelatihan.webinar.webinar_show', compact('webinar', 'detail'));
    }
}

<?php
// app/Http/Controllers/CatalogController.php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Webinar::with('details');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhereHas('details', function($q) use ($search) {
                      $q->where('pembicara', 'like', "%{$search}%")
                        ->orWhere('topik', 'like', "%{$search}%");
                  });
            });
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $now = now();
            if ($request->status == 'upcoming') {
                $query->where('tanggal', '>', $now);
            } elseif ($request->status == 'ongoing') {
                $query->where('tanggal', '<=', $now)
                      ->where('tanggal', '>=', $now->copy()->subHours(3));
            } elseif ($request->status == 'completed') {
                $query->where('tanggal', '<', $now->copy()->subHours(3));
            }
        }
        
        // Filter by type (assuming you have a 'type' column in webinars table)
        if ($request->has('type') && $request->type != 'all') {
            $query->where('type', $request->type);
        }
        
        // Sort functionality
        if ($request->has('sort')) {
            if ($request->sort == 'oldest') {
                $query->orderBy('tanggal', 'asc');
            } elseif ($request->sort == 'price-low') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->sort == 'price-high') {
                $query->orderBy('harga', 'desc');
            } else {
                $query->orderBy('tanggal', 'desc');
            }
        } else {
            $query->orderBy('tanggal', 'desc');
        }
        
        $webinars = $query->paginate(9);
        
        return view('customer.pelatihan.webinars', compact('webinars'));
    }
}
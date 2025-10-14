<?php
// app/Http/Controllers/CatalogController.php

namespace App\Http\Controllers;

use App\Models\BrevetC;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = BrevetC::with(['details', 'waktus', 'lokasis']);
        
        // Filter berdasarkan jenis (Brevet C atau lainnya)
        if ($request->has('jenis') && $request->jenis !== 'all') {
            if ($request->jenis === 'brevet-c') {
                $query->where('judul', 'LIKE', '%Brevet C%')
                      ->orWhere('judul', 'LIKE', '%brevet c%')
                      ->orWhere('deskripsi', 'LIKE', '%Brevet C%');
            } else {
                $query->where('judul', 'NOT LIKE', '%Brevet C%')
                      ->where('judul', 'NOT LIKE', '%brevet c%')
                      ->where('deskripsi', 'NOT LIKE', '%Brevet C%');
            }
        }
        
        // Filter berdasarkan status
        if ($request->has('status') && $request->status !== 'all') {
            $today = now()->format('Y-m-d');
            
            if ($request->status === 'upcoming') {
                $query->where('tanggal_mulai', '>', $today);
            } elseif ($request->status === 'ongoing') {
                $query->where('tanggal_mulai', '<=', $today)
                      ->where('tanggal_selesai', '>=', $today);
            } elseif ($request->status === 'completed') {
                $query->where('tanggal_selesai', '<', $today);
            }
        }
        
        // Search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('judul', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('hari', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->orderBy('tanggal_mulai', 'asc');
                    break;
                case 'price-low':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('harga', 'desc');
                    break;
                default:
                    $query->orderBy('tanggal_mulai', 'desc');
                    break;
            }
        } else {
            $query->orderBy('tanggal_mulai', 'desc');
        }
        
        $events = $query->paginate(9);
        
        return view('catalog', compact('events'));
    }
}
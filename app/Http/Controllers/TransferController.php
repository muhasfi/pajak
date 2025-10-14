<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\TransferDetail; // Tambahkan ini
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransferController extends Controller
{
    public function index(): View
    {
        $transfers = Transfer::with('details')->latest()->paginate(5);
        return view('customer.layanan.transfer', compact('transfers'));
    }
    
 
    public function show(Transfer $transfer): View
    {
        $transfer->load('details');
        return view('transfers.show', compact('transfer'));
    }
    
    public function edit(Transfer $transfer): View
    {
        $transfer->load('details');
        return view('transfers.edit', compact('transfer'));
    }
    
    
}
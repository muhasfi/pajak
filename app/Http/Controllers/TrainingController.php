<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingDetail;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $query = Training::with('detail')
            ->where('status', 'active') // Hanya tampilkan yang aktif
            ->orderBy('tanggal', 'asc');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->has('type') && $request->type != 'all') {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Sort functionality
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'date_asc':
                    $query->orderBy('tanggal', 'asc');
                    break;
                case 'date_desc':
                    $query->orderBy('tanggal', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('harga', 'desc');
                    break;
                case 'title_asc':
                    $query->orderBy('judul', 'asc');
                    break;
                case 'title_desc':
                    $query->orderBy('judul', 'desc');
                    break;
            }
        }

        $trainings = $query->paginate(12);

        // Add additional data for display
        $trainings->getCollection()->transform(function ($training) {
            $training->day = $training->tanggal->format('d');
            $training->month = $training->tanggal->format('M');
            $training->status = $this->getEventStatus($training->tanggal);
            $training->type = $training->type ?? 'seminar'; // Default type
            $training->lokasi = $training->detail->tempat ?? 'Online';
            return $training;
        });

        return view('customer.pelatihan.training', compact('trainings'));
    }

    public function show($id)
    {
        $training = Training::with('detail')->findOrFail($id);
        
        // Add display data
        $training->day = $training->tanggal->format('d');
        $training->month = $training->tanggal->format('M');
        $training->status = $this->getEventStatus($training->tanggal);
        $training->type = $training->type ?? 'seminar';
        $training->lokasi = $training->detail->tempat ?? 'Online';
        $training->waktu_mulai = $training->detail->waktu_mulai ?? '09:00';
        $training->waktu_selesai = $training->detail->waktu_selesai ?? '17:00';

        return view('catalog.show', compact('training'));
    }

    private function getEventStatus($tanggal)
    {
        $today = Carbon::today();
        $eventDate = Carbon::parse($tanggal);

        if ($eventDate->isPast()) {
            return 'completed';
        } elseif ($eventDate->isToday()) {
            return 'ongoing';
        } else {
            return 'upcoming';
        }
    }
}
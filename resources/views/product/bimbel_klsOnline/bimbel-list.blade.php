@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Kelas Saya</h2>
    
    @if($myBimbels->isEmpty())
        <p>Belum ada bimbel yang kamu beli.</p>
    @else
        <div class="row">
            @foreach($myBimbels as $item)
                @php
                    $bimbel = $item->product;
                @endphp

                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bimbel->judul }}</h5>
                            <p class="card-text">{{ Str::limit($bimbel->deskripsi, 100) }}</p>
                            
                            @if($item->end_date && now()->lt($item->end_date))
                                <a href="{{ route('bimbel.show', $item->id) }}" 
                                   id="btn-{{ $item->id }}" 
                                   class="btn btn-primary">
                                    Lihat Materi
                                </a>
                            @else
                                <span class="badge bg-danger">Tidak bisa diakses</span>
                            @endif
                        </div>

                        <div class="card-footer">
                            @if($item->end_date)
                                <p id="countdown-{{ $item->id }}" class="mb-0 text-success"></p>
                                <script>
                                    (function() {
                                        // Format datetime ke ISO biar JS bisa parse
                                        const endDate = new Date("{{ date('Y-m-d\TH:i:s', strtotime($item->end_date)) }}").getTime();
                                        const countdownEl = document.getElementById("countdown-{{ $item->id }}");
                                        const btnEl = document.getElementById("btn-{{ $item->id }}");

                                        function updateCountdown() {
                                            const now = new Date().getTime();
                                            const distance = endDate - now;

                                            if (distance <= 0) {
                                                countdownEl.innerHTML = "<span class='text-danger'>Masa aktif habis</span>";
                                                
                                                // Ubah tombol "Lihat Materi" jadi badge expired
                                                if (btnEl) {
                                                    btnEl.outerHTML = "<span class='badge bg-danger'>Akses sudah habis</span>";
                                                }
                                                return;
                                            }

                                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                            if (days > 0) {
                                                countdownEl.innerHTML = `Sisa ${days} hari`;
                                            } else {
                                                countdownEl.innerHTML = 
                                                    `Sisa ${hours} jam ${minutes} menit ${seconds} detik`;
                                            }
                                        }

                                        updateCountdown();
                                        setInterval(updateCountdown, 1000);
                                    })();
                                </script>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

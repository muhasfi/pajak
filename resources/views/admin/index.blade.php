@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
<style>
    .stats-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        color: #fff;
        font-size: 20px;
    }
    .stats-icon.red { background-color: #f87171; }
    .stats-icon.blue { background-color: #60a5fa; }
    .stats-icon.green { background-color: #34d399; }
    .stats-icon.yellow { background-color: #fbbf24; }
    .stats-icon.purple { background-color: #a78bfa; }
</style>
@endsection

@section('content')

<div class="page-heading mb-4">
    <h3>Selamat Datang, Admin 🎉</h3>
    <p class="text-muted">Berikut adalah ringkasan data aplikasi Anda</p>
</div> 

<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <x-responsive-nav-link :href="route('admin.logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>

<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row g-3">

                <!-- Total Seminar -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body px-4 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="stats-icon red">
                                        <i class="bi bi-easel-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="text-muted font-semibold mb-1">Total Seminar</h6>
                                    <h4 class="font-extrabold mb-0">{{ $totalSeminars }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Layanan -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body px-4 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-gear-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="text-muted font-semibold mb-1">Total Layanan</h6>
                                    <h4 class="font-extrabold mb-0">{{ $totalLayanan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Bimbel -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body px-4 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="stats-icon yellow">
                                        <i class="bi bi-journal-bookmark-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="text-muted font-semibold mb-1">Total Bimbel</h6>
                                    <h4 class="font-extrabold mb-0">{{ $totalBimbel }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Buku -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body px-4 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="stats-icon purple">
                                        <i class="bi bi-book-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="text-muted font-semibold mb-1">Total Buku</h6>
                                    <h4 class="font-extrabold mb-0">{{ $totalBook }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Grafik -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-header">
                            <h4>📊 Grafik Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script>
@endsection

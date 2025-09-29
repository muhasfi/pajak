@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f9faf8;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f5f7fb;
    }
    
    .page-heading {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.15);
    }
    
    .page-heading h3 {
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .page-heading p {
        opacity: 0.9;
        margin-bottom: 0;
    }
    
    .stats-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        border: none;
        transition: all 0.3s ease;
        overflow: hidden;
        height: 100%;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .stats-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 12px;
        color: #fff;
        font-size: 24px;
        margin-right: 1rem;
    }
    
    .stats-content h6 {
        font-size: 0.875rem;
        color: var(--gray);
        margin-bottom: 0.25rem;
        font-weight: 500;
    }
    
    .stats-content h4 {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0;
    }
    
    .card-header {
        background: white;
        border-bottom: 1px solid var(--light-gray);
        padding: 1.25rem 1.5rem;
    }
    
    .card-header h4 {
        font-weight: 600;
        margin-bottom: 0;
        color: var(--dark);
    }
    
    .logout-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 1rem;
    }
    
    .logout-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        text-decoration: none;
    }
    
    .chart-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        padding: 1.5rem;
    }
</style>
@endsection

@section('content')

<div class="page-heading mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h3 class="text-light">Selamat Datang, Admin 🎉</h3>
            <p class="mb-0">Berikut adalah ringkasan data aplikasi Anda</p>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <a href="#" class="logout-btn" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bi bi-box-arrow-right me-1"></i> Log Out
            </a>
        </form>
    </div>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="row g-4">

                <!-- Total Seminar -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);">
                                    <i class="bi bi-easel-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Seminar</h6>
                                    <h4>{{ $totalSeminars }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Layanan -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #4cc9f0 0%, #3a86ff 100%);">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Layanan</h6>
                                    <h4>{{ $totalLayanan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Bimbel -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #ffd166 0%, #ff9e00 100%);">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Bimbel</h6>
                                    <h4>{{ $totalBimbel }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Buku -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #a78bfa 0%, #7b2cbf 100%);">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Buku</h6>
                                    <h4>{{ $totalBook }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Brevet AB -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #06d6a0 0%, #04a777 100%);">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Brevet AB</h6>
                                    <h4>{{ $totalBrevetAB }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Brevet C -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #118ab2 0%, #0a6c8f 100%);">
                                    <i class="bi bi-mortarboard"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Brevet C</h6>
                                    <h4>{{ $totalBrevetC }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total Webinar -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #ff9e66 0%, #e85d04 100%);">
                                    <i class="bi bi-camera-video-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total Webinar</h6>
                                    <h4>{{ $totalwebinar }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Total In House Training -->
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #f72585 0%, #b5179e 100%);">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <h6>Total In House Training</h6>
                                    <h4>{{ $totalTraining }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <!-- Grafik -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="chart-container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">📊 Grafik Penjualan</h4>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary active">Mingguan</button>
                                <button type="button" class="btn btn-sm btn-outline-primary">Bulanan</button>
                                <button type="button" class="btn btn-sm btn-outline-primary">Tahunan</button>
                            </div>
                        </div>
                        <div id="chart-profile-visit" style="min-height: 300px;"></div>
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
@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
<style>
    .stats-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 24px;
    }
    .stats-icon.red { background-color: #fff5f5; color: #dc3545; }
    .stats-icon.blue { background-color: #f0f7ff; color: #435ebe; }
    .stats-icon.purple { background-color: #f8f5ff; color: #9B59B6; }
    .stats-icon.green { background-color: #f0fff4; color: #28a745; }
    .stats-icon.orange { background-color: #fff8f0; color: #fd7e14; }
    
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.12);
    }
    .card-header {
        background: transparent;
        border-bottom: 1px solid #f0f0f0;
        padding: 1.5rem;
    }
    .card-header h4 {
        margin: 0;
        font-weight: 600;
        color: #2c3e50;
    }
    .font-extrabold {
        font-size: 1.75rem;
        font-weight: 700;
        color: #2c3e50;
    }
    .text-muted {
        font-size: 0.875rem;
    }
</style>
@endsection

@section('content')

<div class="page-heading mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Selamat Datang, Admin! 👋</h3>
        {{-- <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form> --}}
    </div>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-6 col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body px-4 py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon red me-3">
                                    <i class="iconly-boldCalendar"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="text-muted font-semibold mb-1">Pesanan Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $today }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3 col-md-6 mb-3">
                    <div class="card"> 
                        <div class="card-body px-4 py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon blue me-3">
                                    <i class="iconly-boldBuy"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="text-muted font-semibold mb-1">Pendapatan Hari Ini</h6>
                                    <h6 class="font-extrabold mb-0">Rp {{ number_format($todayOrders, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body px-4 py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon purple me-3">
                                    <i class="iconly-boldWallet"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="text-muted font-semibold mb-1">Total Pesanan</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format($totalOrders) }}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body px-4 py-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon green me-3">
                                    <i class="iconly-boldFolder"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="text-muted font-semibold mb-1">Total Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Charts Row -->
            <div class="row mb-4">
                <!-- Grafik Penjualan Bulanan -->
                <div class="col-12 col-lg-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4>Grafik Penjualan Bulanan ({{ date('Y') }})</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-monthly-sales"></div>
                        </div>
                    </div>
                </div>

                <!-- Grafik Penjualan Tahunan -->
                <div class="col-12 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4>Penjualan per Tahun</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-yearly-sales"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secondary Charts Row -->
            <div class="row">
                <!-- Grafik Total Barang Terjual per Bulan -->
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4>Total Barang Terjual per Bulan ({{ date('Y') }})</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-items-sold"></div>
                        </div>
                    </div>
                </div>

                <!-- Grafik Perbandingan -->
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4>Perbandingan Penjualan vs Barang</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-comparison"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Script langsung di sini -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data dari Controller
    const monthlyData = @json(array_values($months));
    const monthlyItems = @json(array_values($monthlyItems ?? array_fill(0, 12, 0)));
    const yearlyDataRaw = @json($yearlySales);
    
    // Konversi yearly data
    let yearlyYears = [];
    let yearlySales = [];
    
    if (yearlyDataRaw && typeof yearlyDataRaw === 'object') {
        for (const [year, total] of Object.entries(yearlyDataRaw)) {
            yearlyYears.push(year);
            yearlySales.push(parseFloat(total));
        }
    }

    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    // ===== GRAFIK PENJUALAN BULANAN =====
    const monthlyOptions = {
        series: [{
            name: 'Pendapatan',
            data: monthlyData
        }],
        chart: {
            type: 'area',
            height: 350,
            toolbar: { show: false },
            fontFamily: 'inherit',
        },
        colors: ['#435ebe'],
        dataLabels: { enabled: false },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.5,
                opacityTo: 0.1,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: monthNames,
            labels: {
                style: {
                    fontSize: '12px',
                    fontWeight: 500
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                },
                style: {
                    fontSize: '12px'
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return 'Rp ' + value.toLocaleString('id-ID');
                }
            }
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4,
        }
    };

    const monthlyChart = new ApexCharts(document.querySelector("#chart-monthly-sales"), monthlyOptions);
    monthlyChart.render();

    // ===== GRAFIK PENJUALAN TAHUNAN =====
    if (yearlySales.length > 0) {
        const yearlyOptions = {
            series: [{
                name: 'Total Penjualan',
                data: yearlySales
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    distributed: true,
                    horizontal: false,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return 'Rp ' + (val / 1000000).toFixed(1) + 'jt';
                },
                offsetY: -25,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"],
                    fontWeight: 600
                }
            },
            colors: ['#28a745', '#20c997', '#17a2b8', '#ffc107', '#fd7e14'],
            xaxis: {
                categories: yearlyYears,
                labels: {
                    style: {
                        fontSize: '12px',
                        fontWeight: 600
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return 'Rp ' + (value / 1000000).toFixed(0) + 'jt';
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                }
            },
            grid: {
                borderColor: '#f1f1f1',
            },
            legend: { show: false }
        };

        const yearlyChart = new ApexCharts(document.querySelector("#chart-yearly-sales"), yearlyOptions);
        yearlyChart.render();
    } else {
        document.querySelector("#chart-yearly-sales").innerHTML = '<p class="text-center text-muted py-5">Belum ada data penjualan</p>';
    }

    // ===== GRAFIK BARANG TERJUAL PER BULAN =====
    const itemsOptions = {
        series: [{
            name: 'Jumlah Barang',
            data: monthlyItems
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#fd7e14'],
        xaxis: {
            categories: monthNames,
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return Math.floor(value) + ' item';
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return Math.floor(value) + ' item terjual';
                }
            }
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4,
        }
    };

    const itemsChart = new ApexCharts(document.querySelector("#chart-items-sold"), itemsOptions);
    itemsChart.render();

    // ===== GRAFIK PERBANDINGAN =====
    const comparisonOptions = {
        series: [{
            name: 'Pendapatan (juta)',
            type: 'line',
            data: monthlyData.map(v => (v / 1000000).toFixed(2))
        }, {
            name: 'Barang Terjual',
            type: 'column',
            data: monthlyItems
        }],
        chart: {
            height: 350,
            type: 'line',
            toolbar: { show: false }
        },
        stroke: {
            width: [3, 0],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%',
                borderRadius: 6
            }
        },
        colors: ['#435ebe', '#ffc107'],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: monthNames
        },
        yaxis: [{
            title: {
                text: 'Pendapatan (juta)',
                style: {
                    color: '#435ebe'
                }
            },
            labels: {
                formatter: function(value) {
                    return 'Rp ' + value + 'jt';
                }
            }
        }, {
            opposite: true,
            title: {
                text: 'Jumlah Barang',
                style: {
                    color: '#ffc107'
                }
            },
            labels: {
                formatter: function(value) {
                    return Math.floor(value);
                }
            }
        }],
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        },
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4,
        }
    };

    const comparisonChart = new ApexCharts(document.querySelector("#chart-comparison"), comparisonOptions);
    comparisonChart.render();
});
</script>

@endsection
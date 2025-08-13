@extends('layout.pimpinan.nav')

@section('content')
    @include('komponen.notif')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Dashboard Pimpinan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            {{-- Cards Summary --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="small-box" style="background-color: #320A6B; color: white;">
                        <div class="inner">
                           <h3>{{ $totalLayanan }}</h3>
                            <p>Total Layanan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <a href="{{ route('layanan') }}" class="small-box-footer text-white">
                            Lihat <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="small-box" style="background-color: #065084; color: white;">
                        <div class="inner">
                            <h3>{{ $totalOrder }}</h3>
                            <p>Total Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <a href="{{ route('order') }}" class="small-box-footer text-white">
                            Lihat <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="small-box" style="background-color: #78B9B5; color: white;">
                        <div class="inner">
                            <h3>{{ $menungguOrder }}</h3>
                            <p>Dalam Proses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <a href="{{ route('pembayaran.index') }}" class="small-box-footer text-white">
                            Lihat <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $orderSelesai }}</h3>
                            <p>Order Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="{{ route('laporan') }}" class="small-box-footer text-white">
                            Laporan <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Grafik Status Order --}}
            <div class="card">
                <div class="card-header" style="background-color: #320A6B; color: white;">
                    <strong>Grafik Status Order</strong>
                </div>
                <div class="card-body">
                    <canvas id="orderChart" height="60"></canvas> {{-- Dikurangi dari 100 ke 60 --}}
                </div>
            </div>

            {{-- Grafik Pengunjung --}}
            <div class="card mt-4">
                <div class="card-header" style="background-color: #78B9B5; color: white;">
                    <strong>Grafik Pengunjung per Bulan</strong>
                </div>
                <div class="card-body">
                    <canvas id="visitorChart" height="60"></canvas> {{-- Dikurangi dari 100 ke 60 --}}
                </div>
            </div>



        </div>
    </section>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik Status Order
        const ctx = document.getElementById('orderChart').getContext('2d');
        const orderChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Selesai', 'Diproses', 'Menunggu'],
                datasets: [{
                    label: 'Jumlah Order',
                    data: [7, 3, 2],
                    backgroundColor: ['#28a745', '#ffc107', '#6c757d'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Pengunjung
        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [45, 60, 80, 100, 90, 110, 130, 125, 115, 140, 160, 170],
                    backgroundColor: 'rgba(6, 80, 132, 0.2)',
                    borderColor: '#065084',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: '#065084'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

@extends('layout.pelanggan.nav')

@section('content')
    @include('komponen.notif')
    <section class="content-header">
        <div class="container-fluid">
            <h1>Dashboard Pelanggan</h1>
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
                            <p>Dalam proses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <a href="" class="small-box-footer text-white">
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

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>Status Order</h5>
                    <canvas id="orderChart" width="400" height="200"></canvas>
                </div>
                <div class="col-md-6 " style="height: 400px">
                    <h5>Status Pembayaran</h5>
                    <canvas id="paymentChart" width="200" height="100"></canvas>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <h4 class="mb-3">Daftar Layanan</h4>
                    <div class="row">
                        @foreach ($layanans as $layanan)
                            <div class="col-md-3 mb-4">
                                <div class="card">
                                    <img src="{{ $layanan->image ?? 'https://via.placeholder.com/250x150' }}"
                                        class="card-img-top" alt="{{ $layanan->nama }}"
                                        style="height: 150px; object-fit: cover;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $layanan->nama }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>




        </div>
    </section>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik Status Order (Bar Chart)
        const orderCtx = document.getElementById('orderChart').getContext('2d');
        const orderChart = new Chart(orderCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($statusOrderData->keys()) !!}, // Selesai, Diproses, Menunggu
                datasets: [{
                    label: 'Jumlah Order',
                    data: {!! json_encode($statusOrderData->values()) !!},
                    backgroundColor: ['#28a745', '#ffc107', '#6c757d'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });

        // Grafik Status Pembayaran (Pie Chart)
        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
        const paymentChart = new Chart(paymentCtx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($statusPembayaranData->keys()) !!}, // Lunas, Menunggu, Belum Bayar
                datasets: [{
                    label: 'Jumlah Pembayaran',
                    data: {!! json_encode($statusPembayaranData->values()) !!},
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection

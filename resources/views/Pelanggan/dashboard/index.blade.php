@extends('layout.pelanggan.nav')

@section('content')

<!-- Bootstrap Bundle JS (sudah termasuk Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <h4 class="mb-3">Metode Pembayaran</h4>
                    <div class="row justify-content-center">

                        <!-- DANA -->
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card shadow-sm text-center p-3" style="border-radius: 10px;">
                                <img src="{{ asset('assets-user/img/dana.png') }}" alt="DANA" class="img-clickable"
                                    data-bs-toggle="modal" data-bs-target="#imgModal"
                                    data-img="{{ asset('assets-user/img/dana.png') }}"
                                    style="height:120px; object-fit:contain; cursor:pointer;">
                            </div>
                        </div>

                        <!-- OVO -->
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card shadow-sm text-center p-3" style="border-radius: 10px;">
                                <img src="{{ asset('assets-user/img/ovo.png') }}" alt="OVO" class="img-clickable"
                                    data-bs-toggle="modal" data-bs-target="#imgModal"
                                    data-img="{{ asset('assets-user/img/ovo.png') }}"
                                    style="height:120px; object-fit:contain; cursor:pointer;">
                            </div>
                        </div>

                        <!-- BRI -->
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card shadow-sm text-center p-3" style="border-radius: 10px;">
                                <img src="{{ asset('assets-user/img/bri.png') }}" alt="BRI" class="img-clickable"
                                    data-bs-toggle="modal" data-bs-target="#imgModal"
                                    data-img="{{ asset('assets-user/img/bri.png') }}"
                                    style="height:120px; object-fit:contain; cursor:pointer;">
                            </div>
                        </div>

                        <!-- GOPAY -->
                        <div class="col-md-3 col-6 mb-3">
                            <div class="card shadow-sm text-center p-3" style="border-radius: 10px;">
                                <img src="{{ asset('assets-user/img/gopay.png') }}" alt="Gopay" class="img-clickable"
                                    data-bs-toggle="modal" data-bs-target="#imgModal"
                                    data-img="{{ asset('assets-user/img/gopay.png') }}"
                                    style="height:120px; object-fit:contain; cursor:pointer;">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Modal Bootstrap -->
            <div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Preview">
                        </div>
                    </div>
                </div>
            </div>







            <section class="content">
                <div class="container-fluid">
                    <h4 class="mb-3">Daftar Layanan</h4>
                    <div class="row">
                        @foreach ($layanans as $layanan)
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm" style="border-radius: 10px; overflow: hidden;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $layanan->nama }}</h5>
                                        <p class="card-text text-muted mb-2">
                                            {{ $layanan->keterangan ?? '-' }}
                                        </p>
                                        <p class="fw-bold mb-3">
                                            Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                            @if ($layanan->satuan)
                                                / {{ $layanan->satuan }}
                                            @endif
                                        </p>
                                    </div>

                                    <!-- Foto layanan ditaruh di bawah full -->
                                    <div class="text-center p-2">
                                        @if ($layanan->foto_layanan)
                                            <img src="{{ asset('storage/' . $layanan->foto_layanan) }}"
                                                alt="{{ $layanan->nama }}"
                                                style="max-width:100%; height:auto; border-top:1px solid #eee; border-radius:8px;">
                                        @else
                                            <img src="https://via.placeholder.com/250x150" alt="No Image"
                                                style="max-width:100%; height:auto; border-top:1px solid #eee; border-radius:8px;">
                                        @endif
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


        const imgModal = document.getElementById('imgModal');
        imgModal.addEventListener('show.bs.modal', function(event) {
            const trigger = event.relatedTarget;
            const imgSrc = trigger.getAttribute('data-img');
            document.getElementById('modalImage').setAttribute('src', imgSrc);
        });
    </script>
@endsection

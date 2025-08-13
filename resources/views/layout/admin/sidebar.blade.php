<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #320A6B;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="background-color: #065084;">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">Kenzo Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">
                    {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-lg" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt fa-lg"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('layanan') }}"
                        class="nav-link {{ request()->routeIs('layanan') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-concierge-bell fa-lg"></i>
                        <p>Layanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('order') }}"
                        class="nav-link {{ request()->routeIs('order') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart fa-lg"></i>
                        <p>Order</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('laporan') }}"
                        class="nav-link {{ request()->routeIs('laporan') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-chart-bar fa-lg"></i>
                        <p>Laporan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pembayaran.index') }}"
                        class="nav-link {{ request()->routeIs('pembayaran.index') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-receipt fa-lg"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pelanggan') }}"
                        class="nav-link {{ request()->routeIs('pelanggan') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-users fa-lg"></i>
                        <p>Data Users</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('kurir') }}" class="nav-link {{ request()->routeIs('kurir') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-user-shield fa-lg"></i>
                        <p>Kurir</p>
                    </a>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Custom Style -->
<style>
    .nav-link.active-custom {
        background-color: #065084 !important;
        color: white !important;
        border-radius: 0.375rem;
        font-weight: 600;
    }

    .nav-link.active-custom i {
        color: white !important;
    }

    .nav-sidebar .nav-link {
        transition: all 0.2s ease-in-out;
    }

    .nav-sidebar .nav-link:hover {
        background-color: #506fa1;
        color: white;
    }
</style>

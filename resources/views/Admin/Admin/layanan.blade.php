@extends('layout.admin.nav')

@section('content')
    @include('komponen.notif')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Layanan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card"
                        style="border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">
                        <div class="card-header d-flex justify-content-end align-items-center"
                            style="background-color: #320A6B; color: white; padding: 1rem 1.5rem;">
                            <a href="#" class="btn" style="background-color: #78B9B5; color: white; border: none;">
                                <i class="fas fa-plus"></i> Tambah Layanan
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover text-center">
                                <thead style="background-color: #065084; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th class="text-start">Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Layanan Cuci -->
                                    <tr>
                                        <td>1</td>
                                        <td>Cuci</td>
                                        <td>Rp 5.000/kg</td>
                                        <td class="text-left">Layanan cuci kami menggunakan mesin cuci modern dan detergent
                                            berkualitas...</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Layanan Setrika -->
                                    <tr>
                                        <td>2</td>
                                        <td>Setrika</td>
                                        <td>Rp 3.000/pcs</td>
                                        <td class="text-left">Layanan setrika kami menggunakan setrika panas dan
                                            berkualitas...</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Layanan Dry Cleaning -->
                                    <tr>
                                        <td>3</td>
                                        <td>Dry Cleaning</td>
                                        <td>Rp 20.000/pcs</td>
                                        <td class="text-left">Layanan dry cleaning kami menggunakan bahan kimia yang aman
                                            dan berkualitas...</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Paket Hemat -->
                                    <tr>
                                        <td>4</td>
                                        <td>Paket Hemat</td>
                                        <td>Rp 8.000/kg</td>
                                        <td class="text-left">Paket layanan: Cuci + Setrika</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Paket Premium -->
                                    <tr>
                                        <td>5</td>
                                        <td>Paket Premium</td>
                                        <td>Rp 30.000/pcs</td>
                                        <td class="text-left">Paket lengkap: Cuci + Setrika + Dry Cleaning</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

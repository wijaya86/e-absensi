@extends('layout.master')
@section('content')
<!-- Content Row -->
                    <div class="row">
                        @php
                            use App\Models\Siswa;
                            use App\Models\Walikel;

                            $jumlahSiswa = Siswa::count();
                            $jumlahLaki = Siswa::where('Jenkel', 'L')->count();
                            $jumlahPerempuan = Siswa::where('Jenkel', 'P')->count();
                            $jumlahGuru = Walikel::count();
                        @endphp
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Siswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSiswa }}  /Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Guru</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahGuru }} /Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Laki- laki
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jumlahLaki }}  /Orang</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-male fa-4x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Perempuan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $jumlahPerempuan }}  /Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-female fa-4x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Aplikasi e-Absensi</h6>
                                </div>
                                <div class="card-body">
                                  <p>Aplikasi absensi adalah perangkat lunak yang dirancang untuk mencatat dan mengelola kehadiran
                                     siswa di sekolah, secara elektronik. 
                                    Aplikasi ini menggantikan metode absensi manual seperti buku daftar hadir atau mesin absen fisik,
                                     dengan sistem digital yang lebih efisien, akurat, dan transparan.</p>
                                </div>
@endsection


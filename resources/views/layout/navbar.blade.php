<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                   <img src="{{url('assets/img/absen.png')}}" width=50% >
                </div>
                <div class="sidebar-brand-text mx-3">Absensi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Absensi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
              <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('absensi.create')}}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Data Absensi</span></a>
            </li>

            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('absensi.index')}}">
                    <i class="fas fa-qrcode"></i>
                    <span>Scan Qris</span></a>
            </li>


              <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-chart-area"></i>
                    <span>Laporan Rekapitulasi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{ route('rekap.index') }}">Kehadiran Siswa</a>
                       <a class="collapse-item" href="{{ route('rekapkehadiran.index') }}"> Rekap Kehadiran Siswa</a>
                        <a class="collapse-item" href="{{ route('chart.index') }}">Presentasi Kehadiran</a>
                    </div>
                </div>
               
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
                @php
                    $user = Auth::user()->id_akses;
                @endphp
                @if($user == 1) <!-- Admin -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            
             <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedata"
                    aria-expanded="true" aria-controls="collapsedata">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data</span>
                </a>
                <div id="collapsedata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('siswa.index')}}">Data Siswa</a>
                        <a class="collapse-item" href="{{route('card.index')}}">Data Kartu</a>
                        <a class="collapse-item" href="{{route('kelasi.index')}}">Data Kelas</a>
                        <a class="collapse-item" href="{{route('walikel.index')}}">Data Wali Kelas</a>
                        <a class="collapse-item" href="{{ route('kehadiran.index')}}">Data Kehadiran</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseset"
                    aria-expanded="true" aria-controls="collapseset">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.index')}}">Data User</a>
                        <a class="collapse-item" href="{{ url('/backup-sekarang') }}">Backup Data</a>

                    </div>
                </div>
            </li>
            @endif           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{url('assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                             
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  @php
                     $user = auth()->user();
                        $role = $user->akses->akses;
                    @endphp

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard - {{ $role }} </h1>
                       
                    </div>

                    
                                   
                   <!-- Content Row -->
                    <div class="row">
                      <div class="col-lg-12 mb-">
                            <!-- Approach -->
                            @yield('content')
                            </div>

                        </div>
                    </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

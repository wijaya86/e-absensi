@extends('layout.master')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi</h6>
        <form method="GET" action="{{ route('rekapkehadiran.index') }}" class="form-inline">
            <select name="bulan" class="form-control mr-2">
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" 
                        {{ request('bulan', now()->month) == $i ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                    </option>
                @endfor
            </select>

            <select name="tahun" class="form-control mr-2">
                @for($t = now()->year - 5; $t <= now()->year + 1; $t++)
                    <option value="{{ $t }}" 
                        {{ request('tahun', now()->year) == $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                @endfor
            </select>

            <select name="kelas" class="form-control mr-2">
                <option value="all">Semua Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
                        {{ $k->NamaKelas }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-filter"></i> Filter
            </button>
        </form>
    </div>

    <div class="card-body">
        <div class="mb-3 text-right">
            <a href="{{ route('rekapkehadiran.create', request()->all()) }}" class="btn btn-danger btn-sm" target="_blank">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Nama Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Alpa</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Nama Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Alpa</th>
                        <th>Total</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($perKelas as $item)
                        <tr>
                            <td>{{ $item->NISN }}</td>
                            <td>{{ $item->NamaSiswa }}</td>
                            <td>{{ $item->NamaKelas }}</td>
                            <td>{{ $item->hadir }}</td>
                            <td>{{ $item->sakit }}</td>
                            <td>{{ $item->izin }}</td>
                            <td>{{ $item->alpa }}</td>
                            <td>{{ $item->total }}</td>                                                                            
                        </tr>  
                    @endforeach                                                                                                               
                </tbody>
            </table>
        </div>
 
@endsection

@extends('layout.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Kehadiran Keseluruhan Kelas</h6>
        <form method="GET" action="{{ route('chart.store') }}" class="d-flex">
            {{-- Filter Bulan --}}
            <select name="bulan" class="form-control mr-2">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                    </option>
                @endfor
            </select>

            {{-- Filter Tahun --}}
            <select name="tahun" class="form-control mr-2">
                @for($i = date('Y')-5; $i <= date('Y'); $i++)
                    <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>

            {{-- Filter Kelas --}}
            <select name="kelas" class="form-control mr-2">
                <option value="all" {{ $kelasId == 'all' ? 'selected' : '' }}>Semua Kelas</option>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->id }}" {{ $kelasId == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->NamaKelas }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>

    <div class="card-body d-flex justify-content-center">
    <div style="width: 400px; height: 400px;">
        <canvas id="chartKehadiran"></canvas>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    const ctx = document.getElementById('chartKehadiran').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($data->keys()) !!},
            datasets: [{
                data: {!! json_encode($data->values()) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',  // Hadir
                    'rgba(229, 231, 71, 0.92)',  // Izin
                    'rgba(6, 228, 91, 0.7)',  // Sakit
                    'rgba(239, 20, 68, 0.7)'   // Alpha
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
    responsive: true,
    plugins: {
        legend: { position: 'bottom' },
        title: { 
            display: true, 
            text: 'Rekap Presensi ' +
                  '{{ \Carbon\Carbon::createFromDate(null, (int)$bulan, 1)->translatedFormat("F") }} {{ $tahun }} ' +
                  '{{ $kelasId == "all" ? "(Semua Kelas)" : "(Kelas " . $kelasList->where("id",$kelasId)->first()->NamaKelas . ")" }}'
        },
     datalabels: {
                formatter: (value, ctx) => {
                    let sum = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                    let percentage = (value * 100 / sum).toFixed(1) + "%";
                    return value + " (" + percentage + ")";
                },
                color: "#fff",
                font: { weight: "bold" }
            }
        }
    },
    plugins: [ChartDataLabels]
    });
</script>
@endsection

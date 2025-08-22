<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }
        .page {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .card {
            width: 5.4cm;
            height: 8.56cm;
            border: 2px solid #000;
            border-radius: 6px;
            padding: 5px;
            position: relative;
            box-sizing: border-box;
            margin: 5px;
            text-align: center;
        }
        .foto {
            width: 2.5cm;
            height: 3.2cm;
            object-fit: cover;
            border: 1px solid #000;
            margin-top: 5px;
        }
        .qr {
            width: 3cm;
            height: 3cm;
            margin-top: 6px;
        }
        .footer {
           
            bottom: 0px;
            width: 100%;
            font-size: 9px;
            border-top: 1px solid #ccc;
            padding-top: 0px;
        }
    </style>
</head>
<body>
    @php $count = 0; @endphp
    <div class="page">
    @foreach($siswas as $siswa)
        <div class="card">
            <img src="{{ public_path('foto/'.$siswa->foto) }}" class="foto">
            <div>
                <br>
                <strong>{{ $siswa->NamaSiswa }}</strong><br>
                NIS: {{ $siswa->NISN }}<br>
                Kelas: {{ $siswa->kelasi->NamaKelas }}
            </div>
            @if($siswa->qrcode)
                <img src="data:image/png;base64,{{ $siswa->qrcode }}" class="qr">
            @endif
            <div class="footer">
                SMK Negeri 1 Contoh<br>
                Tahun Pelajaran 2025/2026
            </div>
        </div>
        @php $count++; @endphp

        @if($count % 9 === 0 && !$loop->last)
            </div>
            <div style="page-break-after: always;"></div>
            <div class="page">
        @endif
    @endforeach
    </div>
</body>
</html>

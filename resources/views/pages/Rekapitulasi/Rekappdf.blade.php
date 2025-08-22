<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Absensi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background: #f2f2f2; }
        h2, h3,h4 { text-align: center; margin: 0; }
        .kop { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 10px; }
        .kop img { position: absolute; top: 10px; left: 30px; width: 70px; }
        .footer { width: 100%; margin-top: 40px; text-align: right; }
        .footer .ttd { text-align: center; margin-right: 60px; float: right; }
        .footer .nama { margin-top :50px; }
        .footer img { width: 120px; }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop">
        <img src="{{ public_path('assets/img/logodinas.png') }}">
        <h2>PEMERINTAH DAERAH PROVINSI JAWABARAT</h2>
        <h2>DINAS PENDIDIKAN</h2>
        <h2>CABANG DINAS PENDIDIKAN WILIAYAH VI</h2>
        <h3>SMK NEGERI 1 KARANGTENGAH</h3>
        <h4>Jl. Jangari KM 13. Ds. Sukajadi Kec. Karangtengah Cianjur</h4>
    </div>

    <!-- Judul -->
   <h2>Laporan Rekap Absensi</h2>
    <p>Bulan: {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }} {{ $tahun }}</p>

    <!-- Tabel -->
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Kelas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekap as $r)
            <tr>
                <td>{{ $r->tanggal }}</td>
                <td>{{ $r->NISN }}</td>
                <td style="text-align: left;">{{ $r->NamaSiswa }}</td>
                <td>{{ $r->Jenkel }}</td>
                <td>{{ $r->NamaKelas }}</td>
                <td>{{ $r->kehadiran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="footer">
        <div class="ttd">
            <p>Kepala Sekolah</p>
            
            <div class="nama">
            <p>-------------------------------<br>NIP. ------------------------------</p>
            </div>
        </div>
    </div>
</body>
</html>

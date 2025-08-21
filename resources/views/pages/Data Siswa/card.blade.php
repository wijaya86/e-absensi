@extends('layout.master')
@section('content')
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kartu Absensi</h6>
                                    <a href="{{ route('card.create') }}" class="btn btn-primary btn-sm mb-3">
                                        <i class="fas fa-file-pdf"></i> Download Semua Kartu
                                    </a>
                                </div>
                                <div class="card-body">
                              @foreach($siswas as $siswa)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card shadow h-100 text-center p-2 kartu-siswa">
                
                <!-- Foto Siswa -->
                <div class="foto-wrapper">
                    <img src="{{ asset('foto/'.$siswa->foto) }}" class="foto-kartu" alt="Foto Siswa">
                </div>

                <!-- Nama & NISN -->
                <div class="mt-2">
                    <h5 class="card-title mb-1">{{ $siswa->NamaSiswa }}</h5>
                    <p class="text-muted small mb-1">NISN: {{ $siswa->NISN }}</p>
                    <p class="text-muted small mb-1">Kelas: {{ $siswa->kelasi->NamaKelas }}</p>
                </div>
                
                <!-- QR Code -->
                @if($siswa->qrcode)
                    <div class="qr-wrapper">
                        <img src="data:image/png;base64,{{ $siswa->qrcode }}" class="qr-kartu" alt="QR Code">
                    </div>
                @endif
                <!-- Footer -->
                <div class="footer-kartu">
                    <small>SMKN 1 Karangtengah</small><br>
                    <small>PPLG</small>
                </div>
            </div>
</div>

        @endforeach
                                
        </div>
        
@endsection
<style>
/* Kartu siswa mirip name tag */
.kartu-siswa {
    width: 8.56cm;
    height: 5.4cm;
    border: 2px solid #000;
    border-radius: 3px;
    background: #fff;
    position: relative;
    padding: 5px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}


/* Bingkai foto */
.foto-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 10px; /* Geser foto agak ke bawah */
}

.foto-kartu {
    width: 2.5cm;
    height: 3.2cm;
    object-fit: cover;
    border: 2px solid #000;
    background: #fff;
    z-index: 2;
}

/* QR Code */
.qr-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 1px;
}

.qr-kartu {
    width: 100px;
    height: 100px;
}
.footer-kartu {
    bottom: 1px;
    width: 100%;
    text-align: center;
    font-size: 15px;
    padding-top: 1px;
}

</style>


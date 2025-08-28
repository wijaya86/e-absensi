@extends('layout.master')
@section('content')
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absensi Manual</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('manual.store')}}" method="POST">
            @csrf

            <label for="NISN">Cari Nama Siswa</label>
            <div class="form-group">
                <input type="text" class="form-control" id="search_nama" name="search_nama" placeholder="Ketik Nama Siswa...">
                <input type="text" class="form-control" name="NISN" id="NISN" readonly>
            </div>

            <label for="tanggal">Tanggal</label>
            <div class="form-group">
                <input type="date" class="form-control" name="tanggal" 
                       value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
            </div>

            <label for="id_Kehadiran">Keterangan</label>
            <div class="form-group">
                <select name="id_Kehadiran" class="form-control">
                    <option selected>Silahkan Pilih</option>
                    @foreach ($kehadiran as $Kehadiran)
                        <option value="{{ $Kehadiran->id }}">{{ $Kehadiran->kehadiran }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
        </form>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
$(function() {
    $("#search_nama").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('manual.autocomplete') }}",
                data: { term: request.term },
                dataType: "json",
                success: function(data) {
                    console.log("Data JSON dari server:", data); // cek di console
                    response(data); // kirim ke jQuery UI autocomplete
                },
                error: function(xhr) {
                    console.error("Error AJAX:", xhr.responseText);
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            $("#search_nama").val(ui.item.label); // tampilkan nama + nisn
            $("#NISN").val(ui.item.value);        // isi otomatis NISN
            return false;
        }
    });
});
</script>
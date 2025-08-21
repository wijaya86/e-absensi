@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Scan Qr Code</h6>
                        </div>
                        <div class="card-body"> 
        <div id="reader" width="100px"></div>
    <form action="{{ route('absensi.store') }}" method="POST" id="formAbsen">
  @csrf
  <input type="hidden" name="NISN" id="NISN">
</form>
</div>

@endsection

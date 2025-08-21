@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Wali Kelas</h6>
                        </div>
                        <div class="card-body">
                       <form action="{{ route('walikel.update',$walikel->id)}}" method="POST" >
                                  @csrf
                                   @method('PUT')
                                <label for="form-control form-control-user" >NIP</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NIP" id="" value="{{ $walikel->NIP}}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Nama Guru</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NamaGuru" value="{{$walikel->NamaGuru}}" required>
                                </div>
                                <label for=" form-control form-control-user" >Kelas</label>                                
                                <div class="form-group">
                                    <select name="id_Kelas" class="form-control"  id=""> 
                                        <option selected value="{{ $walikel->id }}">{{ $walikel->kelasi->NamaKelas }}</option>
                                        <option>Silahkan Pilih</option>
                                        @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->NamaKelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                           
@endsection

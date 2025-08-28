@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
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
                       <form action="{{ route('manual.store')}}" method="POST" >
                                  @csrf
                                <label for="form-control form-control-user" >NIS</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NISN" id="" required>
                                </div>
                                <label for=" form-control form-control-user" >Tanggal</label>                                
                                <div class="form-group">
                                <input type="date" class="form-control" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Keterangan</label>                                
                                <div class="form-group">
                                    <select name="id_Kehadiran" class="form-control"  id="">
                                        <option selected>Silahkan Pilih</option>
                                        @foreach ($kehadiran as $Kehadiran)
                                        <option value="{{ $Kehadiran->id }}">{{ $Kehadiran->kehadiran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                            
                      
 
@endsection


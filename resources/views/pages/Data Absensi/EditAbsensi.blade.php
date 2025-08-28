@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Edit Absensi Manual</h6>
                        </div>
                        <div class="card-body">
                       <form action="{{ route('absensi.update',$absensi->id)}}" method="POST" >
                                  @csrf
                                   @method('PUT')
                                <label for="form-control form-control-user" >NIS</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NISN" id="" value="{{ $absensi->NISN }}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Tanggal</label>                                
                                <div class="form-group">
                                <input type="date" class="form-control" name="tanggal" value="{{ $absensi->tanggal }}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Keterangan</label>                                
                                <div class="form-group">
                                    <select name="id_Kehadiran" class="form-control"  id="">
                                         <option selected value="{{ $absensi->id_Kehadiran }}">{{ $absensi->kehadiran->kehadiran }}</option>
                                        <option >Silahkan Pilih</option>
                                        @foreach ($kehadiran as $Kehadiran)
                                        <option value="{{ $Kehadiran->id }}">{{ $Kehadiran->kehadiran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                            
                      
 
@endsection


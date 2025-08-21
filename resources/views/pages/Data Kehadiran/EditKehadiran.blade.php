@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data Kehadiran</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('kehadiran.update',$kehadiran->id)}}" method="POST" >
                                  @csrf
                                   @method('PUT')
                        <label for=" form-control form-control-user" >Kehadiran</label>                                
                                <div class="form-group">
                                    <select name="kehadiran" class="form-control"  id="">
                                        <option value="{{ $kehadiran->id }}">{{ $kehadiran->kehadiran }}</option>
                                        <option>------------</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Alpha">Alpha</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Ijin">Ijin</option>
                                        <option value="Pindah">Pindah</option>
                                    </select>
                                </div>
                                
                               
                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                             
                                
                            </form>
                            
                      
 
@endsection


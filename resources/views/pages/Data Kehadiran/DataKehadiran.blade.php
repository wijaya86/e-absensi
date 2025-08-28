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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kehadiran</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('kehadiran.store')}}" method="POST" >
                                  @csrf
                        <label for=" form-control form-control-user" >Kehadiran</label>                                
                                <div class="form-group">
                                    <select name="kehadiran" class="form-control"  id="">
                                        <option selected>Silahkan Pilih</option>
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


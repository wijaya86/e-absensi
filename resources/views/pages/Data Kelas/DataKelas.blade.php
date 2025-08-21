@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('kelasi.store')}}" method="POST" >
                                  @csrf
                                <label for="" form-control form-control-user" >Nama Kelas</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NamaKelas" id="" required>
                                </div>
                                <div class="form-group">
                                    <select name="Jurusan" class="form-control"  id="">
                                        <option selected>Silahkan Pilih</option>
                                        <option value="PPLG">PPLG</option>
                                         <option value="MPLB">MPLB</option>
                                        <option value="ATPH">ATPH</option>
                                        <option value="APAT">APAT</option>
                                        <option value="NKPI">NKPI</option>
                                    </select>
                                </div>
                               
                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                             
                                
                            </form>
                            
                      
 
@endsection


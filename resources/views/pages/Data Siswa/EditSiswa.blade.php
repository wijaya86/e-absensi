@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <p style="color:green">{{ session('success') }}</p>
                            @endif
                       <form action="{{ route('siswa.update',$siswa->id)}}" method="POST" >
                                  @csrf
                                   @method('PUT')
                                <label for="form-control form-control-user" >NIS</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NISN" id="" value="{{ $siswa->NISN }}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Nama Siswa</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NamaSiswa" id="" value="{{ $siswa->NamaSiswa }}">
                                </div>
                                <label for="form-control form-control-user">Jenis Kelamin</label><br>
                                 <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Jenkel" id="laki_laki" value="L" 
                                     {{ old('Jenkel', $siswa->Jenkel) == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Jenkel" id="perempuan" value="P"
                                     {{ old('Jenkel', $siswa->Jenkel) == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                               </div>
                                <label for=" form-control form-control-user" >Kelas</label>                                
                                <div class="form-group">
                                    <select name="id_Kelas" class="form-control"  id="">
                                        <option selected value="{{ $siswa->id_Kelas }}">{{ $siswa->kelasi->NamaKelas }}</option>
                                        <option>Silahkan Pilih</option>
                                        @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->NamaKelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                            
                      
 
@endsection


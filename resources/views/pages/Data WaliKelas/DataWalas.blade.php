@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Wali Kelas</h6>
                        </div>
                        <div class="card-body">
                       <form action="{{ route('walikel.store')}}" method="POST" >
                                  @csrf
                                <label for="form-control form-control-user" >NIP</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NIP" id="" required>
                                </div>
                                <label for=" form-control form-control-user" >Nama Guru</label>                                
                                <div class="form-group">
                                 <input type="text" class="form-control" name="NamaGuru" id="" required>
                                </div>
                                <label for=" form-control form-control-user" >Kelas</label>                                
                                <div class="form-group">
                                    <select name="id_Kelas" class="form-control"  id="">
                                        <option selected>Silahkan Pilih</option>
                                        @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->NamaKelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for=" form-control form-control-user" >Email</label>                                
                                <div class="form-group">
                                 <input type="email" class="form-control" name="Email" id="" required>
                                </div>
                                <label for=" form-control form-control-user" >Password</label>                                
                                <div class="form-group position-relative">
                                 <input type="password" class="form-control" name="Password" id="password"  required>
                                <span class="position-absolute" style="top: 35%; right: 15px; cursor: pointer;" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                                   </span>
                                
                                </div>
                                <label for=" form-control form-control-user" >Akses</label>                                
                                <div class="form-group">
                                    <select name="id_akses" class="form-control"  id="">
                                        <option selected>Silahkan Pilih</option>
                                        @foreach ($akses as $akses)
                                        <option value="{{ $akses->id }}">{{ $akses->akses }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                           
@endsection

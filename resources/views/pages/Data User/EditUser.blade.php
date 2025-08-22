@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
                        </div>
                        <div class="card-body">
                       <form action="{{ route('user.update',$user->id)}}" method="POST" >
                                  @csrf
                                @method('PUT')
                                <label for=" form-control form-control-user" >Email</label>                                
                                <div class="form-group">
                                 <input type="email" class="form-control" name="email" id="" value="{{ $user->email }}" readonly>
                                </div>
                                <label for=" form-control form-control-user" >Password</label>                                
                                <div class="form-group position-relative">
                                 <input type="password" class="form-control" name="password" id="password">
                                <span class="position-absolute" style="top: 35%; right: 15px; cursor: pointer;" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                                   </span>
                                
                                </div>
                                <label for=" form-control form-control-user" >Akses</label>                                
                                <div class="form-group"> 
                                    <select name="id_akses" class="form-control"  id="">
                                        <option selected value="{{ $user->id }}">{{ $user->akses->akses }}</option>
                                        <option>Silahkan Pilih</option>
                                        @foreach ($akses as $akses)
                                        <option value="{{ $akses->id }}">{{ $akses->akses }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" value="Simpan" class="btn btn-primary btn-user btn-block">
                               
                                
                            </form>
                           
@endsection

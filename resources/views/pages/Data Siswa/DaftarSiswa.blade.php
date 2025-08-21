@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                        </div>
                        <div class="card-body">
                           <p align="right"> <a href="{{ route('siswa.create')}}" class="btn btn-success btn-circle" data-toggle="tooltip" title="Add">
                                        <i class="fas fa-plus-square "></i>
                                    </a>
                                <a href="{{ asset('templates/template_import_siswa.xlsx') }}" class="btn btn-primary" data-toggle="tooltip">Download
                                    </a>
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Upload">Upload
                                        
                                    </a>
                                </p>
                           
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  
                                <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Kelas</th>
                                            <th>QR Code</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Kelas</th>
                                            <th>QR Code</th>
                                            <th>Tool</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($siswa as $siswa)
                                        <tr>
                                             <td>{{ $loop->iteration }}</td>
                                            <td>{{$siswa->NISN}}</td>
                                            <td>{{$siswa->NamaSiswa}}</td>
                                            <td>{{$siswa->Jenkel}}</td>
                                            <td>{{$siswa->kelasi->NamaKelas}}</td>
                                            <td>@if($siswa->qrcode)
                                            <img src="data:image/png;base64,{{ $siswa->qrcode }}">
                                            @endif</td>
                                            
                                            <td>
                                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-info-circle"></i>
                                               </a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>                                                                                  
                                        </tr> 
                                        @endforeach                                                                                                                
                                    </tbody>
                                </table>
                            </div>
                      
 <!-- Logout Modal-->
    <div class="modal fade" id="Upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <!-- @if (session('success'))
                 <p style="color:green">{{ session('success') }}</p>
                @endif -->
                <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Upload File</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-body">
                  
                        <input type="file" class="form-control" name="file" required>
                       </div>
                <div class="modal-footer">
                   
                    <button type="submit" class="btn btn-primary" >Import</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection


@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Wali kelas</h6>
                        </div>
                         @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif      
                        <div class="card-body">
                           <p align="right"> <a href="{{ route('walikel.create')}}" class="btn btn-success btn-circle" data-toggle="tooltip" title="Add">
                                        <i class="fas fa-plus-square "></i>
                                    </a>
                                    <a href="{{ asset('templates/template_walikel_import.xlsx') }}" class="btn btn-primary" data-toggle="tooltip">Download
                                    </a>
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Upload1">Upload
                                        
                                    </a>
                                
                                </p>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Wali Kelas/Jabatan</th>                                            
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                             <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Wali Kelas/Jabatan</th>
                                            <th>Tool</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         @foreach($walas as $walas)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td>{{ $walas->NIP }}</td>
                                            <td>{{ $walas->NamaGuru }}</td>
                                             <td>{{ $walas->kelasi->NamaKelas }}</td>
                                           <td>
                                               <a href="{{ route('walikel.edit', $walas->id) }}" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    </a> 
                                   <form action="{{ route('walikel.destroy', $walas->id) }}" method="POST">
                                     @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Yakin?')">
                                        <i class="fas fa-trash"></i></button>
                                    </form>
                                </td>                                                                                    
                                        </tr>  
                                        @endforeach                                                                                                               
                                    </tbody>
                                </table>
                            </div>
     <!-- Logout Modal-->
    <div class="modal fade" id="Upload1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <!-- @if (session('success'))
                 <p style="color:green">{{ session('success') }}</p>
                @endif -->
                <form action="{{ route('import1.store') }}" method="POST" enctype="multipart/form-data">
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


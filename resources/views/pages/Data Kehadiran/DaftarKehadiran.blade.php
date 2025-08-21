@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Kehadiran</h6>
                        </div>
                        <div class="card-body">
                           <p align="right"> <a href="{{ route('kehadiran.create')}}" class="btn btn-success btn-circle" data-toggle="tooltip" title="Add">
                                        <i class="fas fa-plus-square "></i>
                                    </a></p>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                  <thead>
                                        <tr>
                                            <th>Id Kehadiran</th>
                                            <th>Kehadiran</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Id Kehadiran</th>
                                            <th>Kehadiran</th>
                                            <th>Tool</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($kehadiran as $hadir)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hadir->kehadiran }}</td>
                                            <td>
                                               
                                               <a href="{{route('kehadiran.edit', $hadir->id) }}" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <form action="{{ route('kehadiran.destroy', $hadir->id) }}" method="POST">
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
                      
 
@endsection


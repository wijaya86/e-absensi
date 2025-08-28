@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                   <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  
                                <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Kelas</th>
                                            <th>Keterangan</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Tanggal</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Kelas</th>
                                            <th>Keterangan</th>
                                            <th>Tool</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($rekap as $rekap)
                                        <tr>
                                             <td>{{$rekap->tanggal}}</td>
                                            <td>{{$rekap->NISN}}</td>
                                            <td>{{$rekap->NamaSiswa}}</td>
                                            <td>{{$rekap->Jenkel}}</td>
                                            <td>{{$rekap->NamaKelas}}</td>
                                            <td>{{$rekap->kehadiran}}</td>
                                          <td>
                                               
                                               <a href="{{route('absensi.edit', $rekap->id) }}" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <form action="{{ route('absensi.destroy', $rekap->id) }}" method="POST">
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


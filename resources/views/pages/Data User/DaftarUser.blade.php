@extends('layout.master')
@section('content')
        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                        </div>
                        <div class="card-body">
                         <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  
                                <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Nama user</th>
                                            <th>Email</th>   
                                             <th>Pasword</th>
                                             <th>Akses</th>                                          
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama user</th>
                                            <th>Email</th>   
                                             <th>Pasword</th>
                                             <th>Akses</th> 
                                            <th>Tool</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         @foreach($user as $user)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                             <td>{{ $user->email }}</td>
                                              <td>{{ $user->password }}</td>
                                               <td>{{ $user->akses->akses }}</td>
                                           <td>
                                               <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    </a> 
                                    <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a></td>                                                                                  
                                        </tr>  
                                        @endforeach                                                                                                               
                                    </tbody>
                                </table>
                            </div>
                      
 
@endsection


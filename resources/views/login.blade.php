@include('layout.head')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image">
                                <div>
                                    <br>
                                    <br>
                                    <br>
                                <p align="center"><img class="img-profile rounded-circle"
                                    src="{{url('assets/img/absen.png')}}" width=75% ></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                   <form action="{{ route('login.process') }}" method="POST" class="user">
                                         @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group position-relative">
                                            <input type="password" name="password" id="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                                <span class="position-absolute" style="top: 35%; right: 15px; cursor: pointer;" onclick="togglePassword()">
                                                <i class="fas fa-eye" id="toggleIcon"></i>
                                   </span>
                                        </div>
                                      <div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                       </div>
                                    </form>
                                          @if(session('error'))
                                        <p style="color: red">{{ session('error') }}</p>
                                        @endif                             
                                </div>
                            </div>
                        </div>
                 

         


    @include('layout.footer')
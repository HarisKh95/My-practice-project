@extends('layouts.app1')

@section('content')
    <div class="container">
        {{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src={{ asset('public/img/ashkan-forouzani-l-NIPb-9Njg-unsplash.jpg') }} width="500" height="700">
                    </div>
                    <div class="col-lg-7">

                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('success'))
                                <div class="alert alert-success">
                                    <ul>
                                            <li>{{session('success')}}</li>
                                    </ul>
                                </div>
                                @endif
                            </div>

                            {{-- <form class="user" action="{{ route('newuser') }}" method="post"> --}}
                            <form action="{{ route('newuser') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-3 ">
                                        <select class="custom-select form-control form-control-user" id="role" name="role">
                                          <option selected>Select</option>
                                          <option value="Patient">Patient</option>
                                          <option value="Doctor">Doctor</option>
                                          <option value="Admin">Admin</option>
                                        </select>
                                        <div class="input-group-append">
                                          <label class="input-group-text form-control form-control-user" for="role">Role</label>
                                        </div>
                                      </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}

    </div>
@endsection
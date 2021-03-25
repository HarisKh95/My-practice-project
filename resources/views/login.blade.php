@extends('layouts.app1')

@section('content')
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                {{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
                    <div class="card-body p-0">
                        
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src={{ asset('public/img/mike-noemi-gonzalez-BkQyT1K8J6k-unsplash.jpg') }} width="500" height="800">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    </div>
                                    {{-- <form class="user"> --}}

                                    <form action="{{ route('userlogin') }}"  method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" autofocus="autofocus" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" autofocus="autofocus" id="password" name="password" placeholder="Password">
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

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Login
                                        </button>

                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}

            </div>

        </div>

    </div>
@endsection
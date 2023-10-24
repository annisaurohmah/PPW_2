@extends('auth.layout')


@section('menubar')
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Login</a>
                        <a href="{{ route('landing') }}" class="nav-item nav-link">Back to Home</a>
                    </div>
                    <a href="{{ route('register') }}" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block {{ (request()->is('register')) ? 'active' : '' }}">Register</a> 
                </div>
@endsection

@section('content')
<div class="container-xxl bg-primary hero-header">
    <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card stroke-white bg-primary-gradient text-white">
            <div class="card-header stroke-white ">Login</div>
            <div class="card-body stroke-white">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary-gradient" value="Login">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
    </div>
</div>
@endsection

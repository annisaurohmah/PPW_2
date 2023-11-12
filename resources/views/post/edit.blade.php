@extends('auth.layout')

@section('menubar')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav mx-auto py-0 ">
        <a href="#home" class="nav-item nav-link">Portofolio</a>
        <a href="{{ route('landing') }}" class="nav-item nav-link">Back to home</a>
        
    </div> 
        <a class="btn btn-reg btn-secondary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{
                        route('gallery.index') }}">Gallery</a>
        <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                     <li>
                        <a class="dropdown-item" href="{{ route('users') }}">Management Users</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    </li>
                   

                    

                </ul>
        
    </div>
</div>
@endsection

@section('content')

<div class="container-xxl bg-primary hero-header">
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="container text-white">
    
    <form action="{{ route('update', ['id' => $users->id ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="photo" class="col-md-4 col-form-label text-md-end text-start">Photo</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row g-2">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary-gradient" value="Save">
                        <a href="/users" class="col-md-3 offset-md-5 btn btn-danger"> Cancel</a>
                    </div>
    </form>
</div>

    </div></div></div>  
@endsection
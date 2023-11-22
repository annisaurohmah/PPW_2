@extends('auth.layout')

@section('menubar')
<div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#myworks" class="nav-item nav-link">My Works</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a class="btn btn-reg btn-secondary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{
                        route('gallery.index') }}">Gallery</a>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-reg btn-secondary-gradient rounded-pill py-2 px-4 d-none d-lg-block {{ (request()->is('register')) ? 'active' : '' }}">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-1 d-none d-lg-block {{ (request()->is('register')) ? 'active' : '' }}">Login</a>
                @else    
                    <div class="nav-item text-white dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item text-white">
                        <a class="nav-link" href="{{ route('users') }}">Management Users</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('users') }}">Management Users</a></li>
                        </ul>
                    </div>
                                                
                    @endguest
                    
                </div>
@endsection

@section('content')
<div class="container-xxl bg-primary hero-header">
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card stroke-white bg-primary-gradient text-white">
                    <div class="card-header d-flex justify-content-between align-items-center stroke-white">Dashboard
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary-gradient">Add Image</a>
                    </div>
                        <div class="card-body">
                            <div class="row">
                               
                                @if(count($galleries)>0)
                                    @foreach ($galleries as $gallery)
                                    <div class="col-sm-2">
                                        <div class="image-container">
                                            <a class="example-image-link" href="{{ asset('storage/posts_image/'.$gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->title }}">
                                                <img class="example-image img-fluid mb-2" src="{{ asset('storage/posts_image/small_'.$gallery->picture) }}" alt="image-1"/>
                                            </a>
                                            <div class="col gap-1 image-actions">
                                                <a class="btn btn-sm btn-primary-gradient" href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>

                                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')                    
                                                    <button onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                            <h3 class="text-white">Tidak ada data.</h3>
                                @endif
                            <div class="d-flex">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        @endsection
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
<div class="container-xxl bg-primary hero-header ">
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="container">
      <table class="table text-white">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data_users as $users)
              <tr>
                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>
                  <td>
                    @if(File::exists(public_path('storage/photos/thumbnail/'. $users->photo )) === false)
                      <p>Not Available</p></td>

                    @elseif($users->photo == null)
                      <p>Not Available</p></td>
                    @else
                      <img src="{{ asset('storage/photos/thumbnail/'. $users->photo ) }}" width="150px"></td>
                    
                    @endif
                  <td>
                    <div class="d-flex flex-row gap-3">
                      <a class="btn btn-sm btn-primary-gradient" href="{{ route('edit', ['id' => $users->id]) }}">Edit</a>
                      <form action="{{ route('destroy', $users->id) }}" method="post">
                          @csrf                    
                        <button onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                    </td>
                  </tr>
          @endforeach
        </tbody>
      </table>

        </div>
    </div></div>
@endsection
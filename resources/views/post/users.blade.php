@extends('auth.layouts')

@section('content')
<table class="table">
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
            <td><img src="{{ asset('storage/photos/thumbnail/'. $users->photo ) }}" width="150px"></td>
            <td>
              <div class="d-flex flex-row gap-3">
                <a class="btn btn-sm btn-primary" href="{{ route('edit', ['id' => $users->id]) }}">Edit</a>
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
@endsection
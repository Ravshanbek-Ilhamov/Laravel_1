@extends('adminPage.layouts.main')

@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Search form -->
            <div class="row">
                <div class="col-5">
                    <a href="/user-create" class='btn btn-primary m-2'>Create</a>
                </div>
                
                <div class="col-10">
                    <form action="{{ route('user.index') }}" method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search users..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">Clear</a>
                    </form>
                </div>
            </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{-- <strong>{{ session('error') }}</strong> --}}
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#userEdit{{$item->id}}">
                                    Edit
                                </a>

                                <form action="/user-delete/{{ $item['id'] }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="userEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ route('user.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT') <!-- Since it's an update request -->
                                            <div class="card-body">
                                                
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="exampleName">Name</label>
                                                    <input type="text" class="form-control" name="name" id="exampleName" placeholder="Enter user name" value="{{ $item->name }}">
                                                </div>
                                        
                                                <!-- Email -->
                                                <div class="form-group">
                                                    <label for="exampleEmail">Email</label>
                                                    <input type="email" class="form-control" name="email" id="exampleEmail" placeholder="Enter user email" value="{{ $item->email }}">
                                                </div>
                                        
                                                <!-- Password -->
                                                <div class="form-group">
                                                    <label for="examplePassword">Password</label>
                                                    <input type="password" class="form-control" name="password" id="examplePassword" placeholder="Enter password">
                                                    <!-- Leave password field empty so the user can set a new password only if needed -->
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="form-group">
                                                    <label for="examplePassword">Repeat Password</label>
                                                    <input type="password" class="form-control" name="  " id="examplePassword" placeholder="Enter password again">
                                                    <!-- Leave password field empty so the user can set a new password only if needed -->
                                                </div>

                                                <!-- Email Verified At -->
                                                <div class="form-group">
                                                    <label for="exampleEmailVerifiedAt">Email Verified At</label>
                                                    <input type="datetime-local" class="form-control" name="email_verified_at" id="exampleEmailVerifiedAt" 
                                                           value="{{ optional($item->email_verified_at)->format('Y-m-d\TH:i') }}">
                                                </div>
                                        
                                            </div>
                                            <!-- /.card-body -->
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </section>
</div>
@endsection

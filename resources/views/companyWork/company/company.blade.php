@extends('adminPage.layouts.main')

@section('title', 'Company List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <a href="/company-create" class='btn btn-primary m-2'>Create Company</a>
                </div>
                
                <div class="col-10">
                    <form action="{{ route('company.index') }}" method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search users..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('company.index') }}" class="btn btn-secondary ml-2">Clear</a>
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
            
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="/company-products-create?company_id={{ $item->id }}" class="btn btn-sm btn-success">Create Product</a>

                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#companyEdit{{$item->id}}">
                                    Edit
                                </a>
                                <form action="/company-delete/{{ $item->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="companyEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form action="{{ route('company.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-body">

                                                        <!-- User ID -->
                                                        <div class="form-group">
                                                            <label for="userId{{$item->id}}">User ID</label>
                                                            <input type="text" class="form-control" name="user_id" id="userId{{$item->id}}" value="{{ $item->user_id }}" readonly>
                                                        </div>

                                                        <!-- Name -->
                                                        <div class="form-group">
                                                            <label for="exampleName{{$item->id}}">Name</label>
                                                            <input type="text" class="form-control" name="name" id="exampleName{{$item->id}}" placeholder="Enter company name" value="{{ $item->name }}">
                                                        </div>

                                                        <!-- Phone Number -->
                                                        <div class="form-group">
                                                            <label for="phoneNumber{{$item->id}}">Phone Number</label>
                                                            <input type="text" class="form-control" name="phone_number" id="phoneNumber{{$item->id}}" placeholder="Enter phone number" value="{{ $item->phone_number }}">
                                                        </div>

                                                        <!-- Active Status -->
                                                        <div class="form-group">
                                                            <label for="isActive{{$item->id}}">Active</label>
                                                            <select class="form-control" name="is_active" id="isActive{{$item->id}}">
                                                                <option value="1" {{ $item->is_active ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ !$item->is_active ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $companies->links() }}
        </div>
    </section>
</div>
@endsection

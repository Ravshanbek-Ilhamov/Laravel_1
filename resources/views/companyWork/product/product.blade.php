@extends('adminPage.layouts.main')

@section('title', 'Company Product List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-10">
                    <form action="{{ route('companyProduct.index') }}" method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search users..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('companyProduct.index') }}" class="btn btn-secondary ml-2">Clear</a>
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
            <strong>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Company ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->company_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img width="100px" src="{{ asset('storage/' . $item->image_path) }}" alt="image"></td>

                            <td>{{ $item->price }} $</td>
                            <td>    
                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#companyProductEdit{{$item->id}}">
                                    Edit
                                </a>

                                <form action="/company-products-delete/{{ $item->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="companyProductEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Company Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form action="{{ route('companyProducts.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')  
                                                    <div class="card-body">

                                                        <!-- Company ID -->
                                                        <div class="form-group">
                                                            <label for="companyId{{$item->company_id}}">Company ID</label>
                                                            <input type="text" class="form-control" name="company_id" id="companyId{{$item->company_id}}" value="{{ $item->company_id }}" readonly>
                                                        </div>

                                                        <!-- Name -->
                                                        <div class="form-group">
                                                            <label for="exampleName{{$item->id}}">Name</label>
                                                            <input type="text" class="form-control" name="name" id="exampleName{{$item->id}}" placeholder="Enter company name" value="{{ $item->name }}">
                                                        </div>

                                                        <!-- Price -->
                                                        <div class="form-group">
                                                            <label for="price{{$item->id}}">Price</label>
                                                            <input type="number" class="form-control" name="price" id="price{{$item->id}}" placeholder="Enter product price" value="{{ $item->price }}" step="0.01">
                                                        </div>

                                                        <!-- Image -->
                                                        <div class="form-group">
                                                            <label for="image{{$item->id}}">Image</label>
                                                            <input type="file" class="form-control-file m-2" name="image" id="image{{$item->id}}">
                                                            <small>Current Image: <img src="{{ $item->image_path }}" alt="current image" width="50px"></small>
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
            {{ $products->links() }}
        </div>
    </section>
</div>
@endsection

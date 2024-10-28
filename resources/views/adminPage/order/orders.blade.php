@extends('adminPage.layouts.main')


@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <a href="/order-create" class = 'btn btn-primary m-2'>Create</a>
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <!-- Your content goes here -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Client ID</th>
                        <th>Seller ID</th>
                        <th>Product ID</th>
                        <th>Count</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['client_id'] }}</td>
                            <td>{{ $item['seller_id'] }}</td>
                            <td>{{ $item['product_id'] }}</td>
                            <td>{{ $item['count'] }}</td>
                            <td>{{ $item['status'] }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#orderEdit{{$item->id}}">
                                    Edit
                                </a>

                                <form action="/order-delete/{{ $item['id'] }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                  <!-- Modal -->
                                <div class="modal fade" id="orderEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{route('order.update',$item->id)}}" method="POST">
                                            @csrf
                                            @method('put');
                                            <div class="card-body">
                                                <!-- Client Selection -->
                                               <!-- Client Selection -->
                                                <div class="form-group">
                                                    <label for="clientSelect">Client</label>
                                                    <select class="form-control" name="client_id" id="clientSelect" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user['id'] }}" {{ $user['id'] == $item['client_id'] ? 'selected' : '' }}>
                                                                {{ $user['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Seller Selection -->
                                                <div class="form-group">
                                                    <label for="sellerSelect">Seller</label>
                                                    <select class="form-control" name="seller_id" id="sellerSelect" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user['id'] }}" {{ $user['id'] == $item['seller_id'] ? 'selected' : '' }}>
                                                                {{ $user['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Product Selection -->
                                                <div class="form-group">
                                                    <label for="productSelect">Product</label>
                                                    <select class="form-control" name="product_id" id="productSelect" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product['id'] }}" {{ $product['id'] == $item['product_id'] ? 'selected' : '' }}>
                                                                {{ $product['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Quantity Input -->
                                                <div class="form-group">
                                                    <label for="quantityInput">Quantity</label>
                                                    <input type="number" class="form-control" name="count" id="quantityInput" value="{{ $item['count'] }}" placeholder="Enter Quantity" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                                                </div>

                                                <!-- Status Selection -->
                                                <div class="form-group">
                                                    <label for="statusSelect">Status</label>
                                                    <select class="form-control" name="status" id="statusSelect" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                                                        <option value="pending" {{ $item['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="delivered" {{ $item['status'] == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                        <option value="preparing" {{ $item['status'] == 'preparing' ? 'selected' : '' }}>Preparing</option>
                                                    </select>
                                                </div>

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
        </div>
    </section>
</div>
  

@endsection

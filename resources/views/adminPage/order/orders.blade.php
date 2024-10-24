@extends('adminPage.layouts.main')


@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <a href="/order-create" class = 'btn btn-primary m-2'>Create</a>
        <div class="container-fluid">
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
                                <form action="/order-delete/{{ $item['id'] }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

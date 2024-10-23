@extends('adminPage.layouts.main')


@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

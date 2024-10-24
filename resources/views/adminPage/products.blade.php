@extends('adminPage.layouts.main')

@section('title', 'Index Page')

@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Your content goes here -->
        <a href="/product-create" class = 'btn btn-primary m-2'>Create</a>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['user_id'] }}</td>
                            <td>{{ $item['category_id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td> <img width="100px" src="{{ $item['image'] }}" alt="image"></td>
                            <td>{{ $item['count'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection



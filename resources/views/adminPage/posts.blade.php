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
                        <th>Category ID</th>
                        <th>Body</th>
                        <th>Likes</th>
                        <th>DisLikes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['category_id'] }}</td>
                            <td>{{ $item['body'] }}</td>
                            <td>{{ $item['likes'] }}</td>
                            <td>{{ $item['dislikes'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

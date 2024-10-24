@extends('adminPage.layouts.main')


@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <a href="/like-create" class = 'btn btn-primary m-2'>Create</a>

            <!-- Your content goes here -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Post ID</th>
                        <th>User ID</th>
                        <th>Like Or DisLike</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($likes as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['post_id'] }}</td>
                            <td>{{ $item['user_id'] }}</td>
                            <td>{{ $item['is_active'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

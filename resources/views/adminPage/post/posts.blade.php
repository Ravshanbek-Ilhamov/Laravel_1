@extends('adminPage.layouts.main')

@section('title', 'Index Page')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="/post-create" class='btn btn-primary m-2'>Create</a>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Body</th>
                        <th>Likes</th>
                        <th>Dislikes</th>
                        <th>Actions</th> <!-- Added Actions column -->
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
                            <td>
                                <form action="/post-delete/{{ $item['id'] }}" method="POST" style="display:inline;">
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

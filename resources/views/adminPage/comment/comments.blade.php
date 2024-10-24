@extends('adminPage.layouts.main')

@section('title', 'Comments List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <a href="/comment-create" class="btn btn-primary m-2">Create Comment</a>
        <div class="container-fluid">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Post</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['post_id'] }}</td>
                            <td>{{ $item['body'] }}</td>
                            <td>
                                <form action="/comment-delete/{{ $item['id'] }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

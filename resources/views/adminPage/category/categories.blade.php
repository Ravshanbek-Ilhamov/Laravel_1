@extends('adminPage.layouts.main')

@section('title', 'Category List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <a href="/category-create" class='btn btn-primary m-2'>Create Category</a>
        <div class="container-fluid">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>T/R</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tr }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="/category-edit/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a> 
                                <form action="/category-delete/{{ $item->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

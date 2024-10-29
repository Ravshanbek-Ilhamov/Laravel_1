@extends('adminPage.layouts.main')

@section('title', 'Category List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <a href="/category-create" class='btn btn-primary m-2'>Create Category</a>
        <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                    @foreach ($categories as $category)
                    <p>Category:{{$category->name}},Count:{{$category->posts->count()}}</p>
                    @php
                        $a = 1;
                    @endphp
                    @foreach ($category->posts as $post)
                      <li>{{$a}}.{{$post->title}}</li>
                      @php
                          $a++;
                      @endphp
                        {{-- <tr>
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
                        </tr> --}}
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

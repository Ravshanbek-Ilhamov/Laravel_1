@extends('adminPage.layouts.main')

@section('title', 'Category List')

@section('content')
<div class="content-wrapper">
    <section class="content">
        @if (auth()->check())
          <a href="/category-create" class='btn btn-primary m-2'>Create Category</a>
        @endif
        <div class="container-fluid">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
      
          @if (session('error'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{-- <strong>{{ session('error') }}</strong> --}}
                  <strong>{{ session('error') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          @endif

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>T/R</th>
                        <th>Name</th>
                        <th>Active</th>
                        @if (auth()->check())
                          <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item  )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tr }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->active ? 'Yes' : 'No' }}</td>
                            @if (auth()->check())
                              <td>
                                  <a href="/category-edit/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a> 
                                  <form action="/category-delete/{{ $item->id }}" method="POST" style="display:inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </form>
                              </td>
                            @endif
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </section>
    </div>
        
@endsection

@extends('adminPage.layouts.main')

@section('title', 'Create Company')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Company</h3>
                </div>
                <!-- form start -->
                <form action="/company_creation" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">Select User</label>
                            <select name="user_id" class="form-control" id="user_id" required>
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter company name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Company</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

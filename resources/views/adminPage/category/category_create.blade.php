@extends('adminPage.layouts.main')

@section('title', 'Create Category')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
        <a href="/categories" class='btn btn-primary m-2'>Category</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Category</h3>
                        </div>
                        <form action="/category_creation" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name" value="{{ old('name') }}">
                                    @error('name')
                                        <label style="color: red" for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                        
                                <!-- Tartib Raqam (TR) Field -->
                                <div class="form-group">
                                    <label for="tr">Tartib Raqam</label>
                                    <input type="number" name="tr" class="form-control" id="tr" placeholder="Enter Tartib Raqam" value="{{ old('tr') }}">
                                    @error('tr')
                                        <label style="color: red" for="tr">{{ $message }}</label>
                                    @enderror
                                </div>
                        
                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <select name="active" class="form-control" id="active">
                                        <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('active')
                                        <label style="color: red" for="active">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

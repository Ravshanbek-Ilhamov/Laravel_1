@extends('adminPage.layouts.main')

@section('title', 'Edit Category')

@section('content')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css'); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css'); ?>">

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <a href="/categories" class='btn btn-primary m-2'>Category</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <!-- Assuming this form is for updating a category -->
                        <form action="/category_update" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="card-body">
                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <label style="color: red" for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                        
                                <!-- Tartib Raqam (TR) Field -->
                                <div class="form-group">
                                    <label for="tr">Tartib Raqam</label>
                                    <input type="number" name="tr" class="form-control" id="tr" value="{{ old('tr', $category->tr) }}" required>
                                    @error('tr')
                                        <label style="color: red" for="tr">{{ $message }}</label>
                                    @enderror
                                </div>
                        
                                <!-- Active Field -->
                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <select name="active" class="form-control" id="active">
                                        <option value="1" {{ old('active', $category->active) == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('active', $category->active) == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('active')
                                        <label style="color: red" for="active">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset('dist/js/demo.js'); ?>"></script>
<!-- Page specific script -->
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection

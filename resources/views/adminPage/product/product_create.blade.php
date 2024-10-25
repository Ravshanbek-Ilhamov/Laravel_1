@extends('adminPage.layouts.main')

@section('title', 'Product Creation')

@section('content')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css'); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css'); ?>">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <a href="/products" class="btn btn-primary m-2">Products</a>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/product_creation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- User ID -->
                  <div class="form-group">
                    <label for="exampleUserId">User</label>
                    <select class="form-control" name="user_id" id="exampleUserId" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($users as $user)
                      <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                      @endforeach
                    </select>
                    @error('user_id')
                      <label style="color: red" for="exampleUserId">{{$message}}</label>
                    @enderror
                  </div>

                  <!-- Category ID -->
                  <div class="form-group">
                    <label for="exampleCategoryId">Category</label>
                    <select class="form-control" name="category_id" id="exampleCategoryId" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($categories as $category)
                      <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <label style="color: red" for="exampleCategory_id">{{$message}}</label>
                    @enderror
                  </div>

                  <!-- Name -->
                  <div class="form-group">
                    <label for="exampleName">Product Name</label>
                    <input type="text" class="form-control" name="name" id="exampleName" placeholder="Enter product name">
                    @error('name')
                      <label style="color: red" for="exampleName">{{$message}}</label>
                    @enderror
                  </div>

                  <!-- Price -->
                  <div class="form-group">
                    <label for="examplePrice">Price</label>
                    <input type="number" class="form-control" name="price" id="examplePrice" placeholder="Enter product price">
                    @error('price')
                      <label style="color: red" for="examplePrice">{{$message}}</label>
                    @enderror
                  </div>

                  <!-- Image -->
                  {{-- <div class="form-group">
                    <label for="exampleImage">Image URL</label>
                    <input type="text" class="form-control" name="image" id="exampleImage" placeholder="Enter product image URL">
                    @error('image')
                      <label style="color: red" for="exampleImage">{{$message}}</label>
                    @enderror
                  </div> --}}

                  <div class="form-group">
                    <label for="exampleimage">Image</label>
                    <input type="file" class="form-control" name="image" id="exampleimage">
                    @error('image')
                        <label style="color: red" for="exampleimage">{{ $message }}</label>
                    @enderror
                </div>

                  <!-- Count -->
                  <div class="form-group">
                    <label for="exampleCount">Count</label>
                    <input type="number" class="form-control" name="count" id="exampleCount" placeholder="Enter product count">
                    @error('count')
                      <label style="color: red" for="exampleCount">{{$message}}</label>
                    @enderror
                  </div>

                  <!-- Premium -->
                  <div class="form-group">
                    <label for="examplePremium">Premium</label>
                    <select class="form-control" name="premium" id="examplePremium">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  @error('premium')
                    <label style="color: red" for="examplePremium">{{$message}}</label>
                  @enderror
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

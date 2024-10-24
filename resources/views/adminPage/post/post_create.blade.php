@extends('adminPage.layouts.main')

@section('title', 'Post Creation')

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
      <a href="/posts" class="btn btn-primary m-2">Posts</a>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/post_creation" method="POST">
                @csrf
                <div class="card-body">
                  <!-- Category ID -->
                  <div class="form-group">
                    <label for="exampleCategoryId">Category</label>
                    <select class="form-control" name="category_id" id="exampleCategoryId" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($categories as $category)
                      <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                      @endforeach
                    </select>
                  </div>

                  <!-- Title -->
                  <div class="form-group">
                    <label for="exampleTitle">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleTitle" placeholder="Enter post title">
                  </div>

                  <!-- Body -->
                  <div class="form-group">
                    <label for="exampleBody">Body</label>
                    <textarea class="form-control" name="body" id="exampleBody" rows="5" placeholder="Enter post body"></textarea>
                  </div>

                  <!-- Likes -->
                  <div class="form-group">
                    <label for="exampleLikes">Likes</label>
                    <input type="number" class="form-control" name="likes" id="exampleLikes" placeholder="Enter number of likes" value="0">
                  </div>

                  <!-- Dislikes -->
                  <div class="form-group">
                    <label for="exampleDislikes">Dislikes</label>
                    <input type="number" class="form-control" name="dislikes" id="exampleDislikes" placeholder="Enter number of dislikes" value="0">
                  </div>
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

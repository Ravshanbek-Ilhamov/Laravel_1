@extends('adminPage.layouts.main')

@section('title', 'Comment Creation')

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
      <a href="/comments" class = 'btn btn-primary m-2'>Comment</a>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/comment_creation" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputClient1">Post</label>
                    <select class="form-control" name="post_id" id="exampleInputClient1" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($posts as $item)
                      <option value="{{$item['id']}}">{{$item['title']}}</option>
                      @endforeach
                    </select>
                  </div>                  
                  <div class="form-group">
                    <label for="exampleTextarea">Body</label>
                    <textarea class="form-control" name="body" id="exampleTextarea" rows="5" placeholder="Enter your message here..."></textarea>
                </div>                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
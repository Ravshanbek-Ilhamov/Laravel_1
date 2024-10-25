@extends('adminPage.layouts.main')

@section('title', 'User Creation')

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
      <a href="/" class="btn btn-primary m-2">Users</a>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/user_creation" method="POST">
                @csrf
                <div class="card-body">
                  
                  <!-- Name -->
                  <div class="form-group">
                    <label for="exampleName">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleName" placeholder="Enter user name">
                    @error('name')
                      <label style="color: red" for="exampleName">{{ $message }}</label>
                    @enderror
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="exampleEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleEmail" placeholder="Enter user email">
                    @error('email')
                      <label style="color: red" for="exampleEmail">{{ $message }}</label>
                    @enderror
                  </div>

                  <!-- Password -->
                  <div class="form-group">
                    <label for="examplePassword">Password</label>
                    <input type="password" class="form-control" name="password" id="examplePassword" placeholder="Enter password">
                    @error('password')
                      <label style="color: red" for="examplePassword">{{ $message }}</label>
                    @enderror
                  </div>

                  <!-- Email Verified At -->
                  <div class="form-group">
                    <label for="exampleEmailVerifiedAt">Email Verified At</label>
                    <input type="datetime-local" class="form-control" name="email_verified_at" id="exampleEmailVerifiedAt" value="{{ now()->format('Y-m-d\TH:i') }}">
                    @error('email_verified_at')
                      <label style="color: red" for="exampleEmailVerifiedAt">{{ $message }}</label>
                    @enderror
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

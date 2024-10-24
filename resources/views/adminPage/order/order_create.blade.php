@extends('adminPage.layouts.main')

@section('title', 'Order Creation')

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
      <div class="container-fluid">
        <a href="/orders" class = 'btn btn-primary m-2'>Orders</a>
        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $item)
                <div class="alert laert-danger">
                  <h5>{{$item}}</h5>
                </div>
            @endforeach
          
          
          </ul>    

        @endif
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
              <form action="/order_creation" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputClient1">Client</label>
                    <select class="form-control" name="client_id" id="exampleInputClient1" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($users as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputseller1">Seller</label>
                    <select class="form-control" name="seller_id" id="exampleInputseller1" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($users as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputProduct1">Product</label>
                    <select class="form-control" name="product_id" id="exampleInputProduct1" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      @foreach ($products as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputName1" placeholder="Quantity:" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputActive1">Status:</label>
                    <select class="form-control" name="status" id="exampleInputActive1" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ced4da;">
                      <option value="pending">Pending</option>
                      <option value="delivered">Delivered</option>
                      <option value="preparing">Preparing</option>
                    </select>
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

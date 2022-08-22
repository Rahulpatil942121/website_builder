<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Frontend/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @toastr_css
</head>
<body class="hold-transition login-page"><!--style="background-image: url( { {asset('Frontend/img/bg_image2.jpeg')} } );background-size: auto;"-->
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}" class=""><b>Forgot Password</b></a>
  </div>
  <!-- /.login-logo --> 
  <div class="card"> <!--style="background: #82717273!important;color:#fcf9f5!important;"-->
    <div class="card-body login-card-body rounded"> <!---style="background: #82717273!important;color:#fcf9f5!important;"--->
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="{{url('/Submit-Email')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        @if($errors->has('email')) <p class="alert alert-danger">{{ $errors->first('email') }}</p>@endif
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form> 

     <p class="mt-1 mb-1">
        <a href="{{url('/')}}" class="text-center">I already have a membership</a>
      </p>
      <p class="mb-0">
        <a href="{{url('/Register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Frontend/js/adminlte.min.js')}}"></script>
@jquery
    @toastr_js
    @toastr_render
</body>
</html>

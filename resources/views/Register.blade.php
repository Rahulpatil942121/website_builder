<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
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
<body class="hold-transition register-page" style="background-image: url({{asset('Frontend/img/bg_image3.jpeg')}});background-size: auto;">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('/')}}" class="text-white"><b>User Register</b></a>
  </div>

  <div class="card" style="background: #ffffff1c!important;color:#fcf9f5!important;">
    <div class="card-body register-card-body" style="background: #ffffff1c!important;color:#fcf9f5!important;">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{url('/Submit-Register')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Name" value="{{old('name')}}" required="">
          <div class="input-group-append">
            <div class="input-group-text text-white">
              <span class="fas fa-user"></span>
            </div>
          </div>
           @if($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p>@endif
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="{{old('email')}}" autocomplete="off" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text text-white">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
           @if($errors->has('email')) <p class="text-danger d-flex">{{ $errors->first('email') }}</p>@endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" autocomplete="off" minlength="8" maxlength="10" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text text-white">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           @if($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p>@endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" autocomplete="off" minlength="8" maxlength="10" placeholder="Retype password" required="">
          <div class="input-group-append">
            <div class="input-group-text text-white">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           @if($errors->has('confirm_password')) <p class="text-danger">{{ $errors->first('confirm_password') }}</p>@endif
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{url('/')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

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

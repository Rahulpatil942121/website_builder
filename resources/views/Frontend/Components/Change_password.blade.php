    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-6 m-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/Submit-Password')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="exampleInputEmail1" placeholder="Enter Old Password" required="">
                     @if($errors->has('old_password')) <p class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      {{ $errors->first('old_password') }}</p>@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" minlength="8" placeholder="New Password" required="">
                     @if($errors->has('new_password')) <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      {{ $errors->first('new_password') }}</p>@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>                    
                       <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword2" minlength="8" placeholder="Confirm Password" required="">
                     @if($errors->has('confirm_password')) <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $errors->first('confirm_password') }}</p>@endif
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
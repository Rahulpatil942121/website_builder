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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('Frontend/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active btn-sm " href="javascript::void();" data-toggle="tab">My Website</a></li>
                </ul>
              </div><!-- /.card-header -->
              @if($my_template_info)
              @foreach($my_template_info as $list)
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        @php 
                            $my_website_info = DB::table('gallerycontains')->where(['domain_id'=>$list->id,'section_id'=>7])->first();
                            
                        @endphp
                        @if($my_website_info)
                        <img class="img-circle img-bordered-sm" src="" alt="user image">
                        <span class="username">
                          <a href="javascript::void(0);">{{$my_website_info->title}}</a>
                          <div class="float-right">
                            <a href="javascript::void(0);" class=" btn-sm btn-primary @if($list->status == 0) disabled @endif">Active</a>
                            <a href="javascript::void(0);" class="btn-sm btn-danger @if($list->status == 0) disabled @endif">D-Active</a>
                          </div>
                          
                        </span>
                        @endif
                        <span class="description">{{$list->template->temp_name}} ({{$list->template->temptype->type_name}})</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row">
                          <div>
                            
                          </div>
                      </div>
                      
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->                 
 
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              @endforeach
              @endif
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
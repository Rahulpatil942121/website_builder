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
          @if(!$client_template)
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                   <h5 class="card-title">Select Website Template</h5>
                </div>
                <form action="{{url('/Check-Template')}}" method="post">
                  @csrf
                    <div class="box-body">
                      <div class="form-group">                        
                          <label for="exampleInputEmail1">Select Template Type</label>
                          <div class="d-flex">
                            <!-- <div class=""> -->
                              <select name="temp_type" class="form-control" required="">
                                <!-- <option>---- Select ----</option> -->
                                <option value="0">All Template</option>
                                @foreach($Temptype as $list)
                                  <option value="{{$list->id}}">{{$list->type_name}}</option>
                                @endforeach
                              </select>
                              
                              @if($errors->has('temp_type')) <p class="text-danger">{{ $errors->first('temp_type') }}</p>@endif
                            <!-- </div>
                            <div> -->
                              <button class="btn btn-warning ml-2" name="check">Check</button>
                            <!-- </div>  --> 
                          </div>
                      </div>
                    </div>
                </form>                 
              </div>
            </div> 
          </div>
          @else
               @foreach($client_template as $list)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  {{$list->template->temptype->type_name}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$list->template->temp_name}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Single Page Website Template</p>
                       <div>
                         <span class=""><i class="fas fa-lg fa-building"></i></span>
                           @php
                              $containlist = DB::table('temp_contains')
                              ->join('containlists','containlists.id', '=', 'temp_contains.conatin_id')
                              ->select('containlists.contain_name')
                              ->where('temp_contains.temp_id',$list->template->id)
                              ->get();

                              //print_r($containlist);
                          @endphp
                          @foreach($containlist as $iteam)
                            {{$iteam->contain_name}},
                          @endforeach
                       </div>
                       
                    </div>
                    <div class="col-5 text-center">
                     <a href="https://duticorptech.prismoptical.in/index/{{$list->domain_name}}" class="btn btn-sm btn-primary" target="_blank">Visit Site</a>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{url('/Template-Data')}}/{{$list->template->id}}" class="btn btn-sm bg-teal">
                      <!-- <i class="fas fa-comments"></i> --> Add Template Contain
                    </a>
                    <a href="https://duticorptech.prismoptical.in/index/{{$list->template->temp_name}}" class="btn btn-sm btn-primary" target="_blank">
                      <i class="nav-icon fas fa-th"></i> View Template
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          @endif


          <!-- /.col-md-6 -->
          <!-- <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div> -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
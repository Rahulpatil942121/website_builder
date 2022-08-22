    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <style>
        .card
        {
            /*background: rgb(2,0,36);*/
            /*background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(101,79,185,0.6587009803921569) 61%, rgba(0,212,255,1) 100%);*/
            /*background: rgb(238,174,202);*/
            /*background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,0.8715861344537815) 100%);*/
           background: #e5f5fc;
        }
    </style>
   

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row pt-2 pb-2" style="background: #e5f5fc;">
          <div class="col-md-4">
            <div class="card1">
              <div class="card-body">
                <div class="d-flex text-dark">
                    <h5>Template Contain List</h5>
                </div>
                @foreach($Contain as $list)
                  @php
                      $Add_Contain = DB::table('usertemplatecontains')->where(['temp_id'=>$template_id,'creater_id'=>Auth::User()->id,'conatin_id'=>$list->conatin_id])->value('conatin_id');
                  @endphp
                  <span class="btn btn-primary mt-1 {{$list->contain->class_name}} @if($list->conatin_id == $Add_Contain) disabled @endif" @if($list->conatin_id != $Add_Contain) data-toggle="modal" data-target="#{{$list->contain->class_name}}" @endif >{{$list->contain->contain_name}}</span>
              @endforeach
              </div>
            </div>
          </div> 
          <div class="col-md-5 mb-3">
            @if($client_template)
            <!--<div class="card1 card-solid">-->
            <!--  <div class="card-body pb-0">                   -->
            <!--    <div class="row d-flex align-items-stretch">                   -->
                  <div class="col-12 d-flex align-items-stretch" >
                    <div class="card bg-light m-auto" style="height: 350px;position: relative;">
                       <a href="{{url('/Template-Data')}}/{{$client_template->id}}" style="height: 100%;">
                      <iframe src="https://duticorptech.prismoptical.in/index/{{$client_template->domain_name}}" title="" style="height: inherit;width: 100%;"></iframe>
                       
                  </a>
                  @php
                      $web_template = DB::table('domaincreations')->where(['temp_id'=>$template_id,'creater_id'=>1])->value('domain_name');
                  @endphp
                      <div class="d-flex w-100 justify-content-center" style="position: absolute;top: 85%;">
                        <a href="https://duticorptech.prismoptical.in/index/{{$web_template}}" class="btn btn-sm bg-teal mr-1" target="_blank">
                             View Template
                          </a>
                          <a href="https://duticorptech.prismoptical.in/index/{{$client_template->domain_name}}" class="btn btn-sm btn-danger mr-1" target="_blank">
                             View Website
                          </a>
                           @php
                              $Exist_Contain = DB::table('usertemplatecontains')->where(['domain_id'=>$domain,'temp_id'=>$template_id,'creater_id'=>Auth::User()->id])->first();
                          @endphp
                          @if($Exist_Contain)
                            <a href="{{url('/My-Website-Info')}}/{{$template_id}}/{{$domain}}" class="btn btn-success btn-sm">Edit Website</a>
                            @else
                             <a href="javascript:void(0);" class="btn btn-success btn-sm disabled">Edit</a>
                          @endif
                    </div>
                    </div>
                   
                  </div>                 
            <!--    </div>-->
            <!--  </div>-->
              <!-- /.row -->
            <!--</div>-->
            @endif
          </div> 
           <!-- <div class="col-md-3 m-auto">
              <div class="text-center">
                 @ php
                      $ Exist_Contain = DB::table('usertemplatecontains')->where(['temp_id'=>$template_id,'creater_id'=>Auth::User()->id])->first();
                  @ endphp
                  @ if($ Exist_Contain)
                    <a href="{ {url('/My-Website-Info')} }/{ {$ template_id} }" class="btn btn-outline-warning btn-block">Edit Website</a>
                    @ else
                     <a href="javascript:void(0);" class="btn btn-outline-warning btn-block disabled">Edit Website</a>
                  @ endif
              </div>
          </div> --> 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- ================================================================================= -->
<!-- <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-solid" style="background: #e5f5fc;">
                    <div class="card-body pb-0">
                        <div class="d-flex h5">Template Info</div>
                        <div class="row d-flex align-items-stretch">
                            <! -- ------------------------- - ->
                            @ if($ Aboutus_exist)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                 About Us
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-12">
                                      <h2 class="lead"><b>Heading:- </b>{ {$ Aboutus_exist->heading} }</h2>
                                      <p class="text-muted text-sm"><b>About Us Description: </b></p>
                                      <p style="height: 150px;overflow: auto;">< ?= nl2br($ Aboutus_exist->about_description) ?>cvzvzxvzfh dfs dhdf jh dfjd df gsdg fff sadgsg dfadssa fadsg dgda gsdgd sfgdgsd rfsdf gsgsd gssdgsd gsdgsg gsdghdh fjh</p>
                                       
                                    </div>
                                    @ if($ Aboutus_exist->image)
                                    <div class="col-5 text-center">
                                      <img src="{ {asset($ Aboutus_exist->image)} }" alt="" class="img-thumbnail img-fluid">
                                    </div>
                                    @ endif
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">                                     
                                    <a href="{ {url('Edit-Aboutus')} }/{ {$ Aboutus_exist->id} }" class="btn btn-sm btn-primary">
                                      <i class="fas fa-user"></i> Edit
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @ endif
                            <! -- ----------------------------------- - ->
                              <! -- ------------------------- - ->
                            @ if($ Contact_exist)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                Contact US
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-12">
                                      <h2 class="lead"><b>Email:- </b>{ {$ Contact_exist->contact_email} }</h2>
                                      <p><b>Contact Number:-</b>{ {$ Contact_exist->contact_phone} }</p>
                                      <p><b>Other Fields:-</b>{ {$ Contact_exist->contact_otherfields} }</p>
                                      <p class="text-muted text-sm"><b>Address: </b></p>
                                      <p style="height: 150px;overflow: auto;">< ?= nl2br($ Contact_exist->contact_address) ?></p>
                                       
                                    </div>
                                    @ if($ Contact_exist->map)
                                    <div class="col-5 text-center">
                                      <img src="{ {asset($ Aboutus_exist->image)} }" alt="" class="img-thumbnail img-fluid">
                                    </div>
                                    @ endif
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">                                     
                                    <a href="{ {url('Edit-Aboutus')} }/{ {$Aboutus_exist->id} }" class="btn btn-sm btn-primary">
                                      <i class="fas fa-user"></i> Edit
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @ endif
                            <! -- ----------------------------------- - ->
                              <! -- ------------------------- - ->
                            @ if($ Social_Media)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                Social Media
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="d-flex">
                                          <span class="btn"><i class="fab fa-facebook"></i></span>
                                          <span class="form-control" style="overflow-x: auto;">{ {$ Social_Media->facebook} }</span>
                                      </div>
                                      <div class="d-flex mt-1">
                                          <span class="btn"><i class="fab fa-instagram-square"></i></span>
                                          <span class="form-control" style="overflow-x: auto;">{ {$ Social_Media->instagram} }</span>
                                      </div>
                                      <div class="d-flex mt-1">
                                          <span class="btn"><i class="fab fa-twitter"></i></span>
                                          <span class="form-control" style="overflow-x: auto;">{ {$ Social_Media->twitter} }</span>
                                      </div>
                                      <div class="d-flex mt-1">
                                          <span class="btn"><i class="fab fa-youtube"></i></span>
                                          <span class="form-control" style="overflow-x: auto;">{ {$ Social_Media->youtube} }</span>
                                      </div>
                                      <div class="d-flex mt-1">
                                          <span class="btn"><i class="fab fa-linkedin"></i></span>
                                          <span class="form-control" style="overflow-x: auto;">{ {$ Social_Media->linkedin} }</span>
                                      </div>                                       
                                    </div>                                    
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">                                     
                                    <a href="{ {url('Edit-Aboutus')} }/{ {$ Aboutus_exist->id} }" class="btn btn-sm btn-primary">
                                      <i class="fas fa-user"></i> Edit
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @ endif
                            <! -- ----------------------------------- - ->
                        </div>
                    </div>
                    <! -- /.row - ->
                </div>
            </div>
        </div>
    </div>
</div> -->



<!--======================================================================================================-->
        <!-- The About Modal -->
<div class="modal fade" id="About1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">            
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">About Us Contain</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Aboutus-Info1')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">About Us Heading <small class="text-danger">*</small></label>
                                <input type="text" name="about_heading" autocomplete="off" placeholder="About Us Heading" class="form-control" >
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Us Description <small class="text-danger">*</small></label>
                                <textarea name="aboutus_description" placeholder="Description..." class="form-control" rows="4" autocomplete="off"></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1" class="d-flex">Upload Image (Optional)</label>
                                <input type="file" name="about_image" class="form-control" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>
  <!-- ---------Start Logo------------- -->
        <!-- The Logo Modal -->
<div class="modal fade" id="About">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">About Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Aboutus-Info')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">About Us Heading <small class="text-danger">*</small></label>
                                <input type="text" name="about_heading" autocomplete="off" placeholder="About Us Heading" class="form-control" required="">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Us Description <small class="text-danger">*</small></label>
                                <textarea name="aboutus_description" placeholder="Description..." class="form-control" rows="4" autocomplete="off"></textarea>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                               <label for="exampleInputEmail1" class="d-flex">Upload Image <small class="">(Optional)</small></label>
                               <input type="file" name="aboutus_img" class="form-control" accept=".png, .jpg, .jpeg" required="">
                                
                            </div>
                        </div>                                             
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Logo------------- -->
<!-- -------------End About US------------------ -->
  <!-- ---------End Contact------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Contact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contact US Contain</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Contact-Data')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Email <small class="text-danger">*</small></label>
                                <input type="email" name="contact_email" autocomplete="off" placeholder="Email" class="form-control" required="">
                                
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Phone <small class="text-danger">*</small></label>
                                <input type="text" name="contact_phone" autocomplete="off" placeholder="Phone Number (Only Numbers)" minlength="10" maxlength="10" class="form-control" required="">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1" class="d-flex">Other Fields <small>(Optional)</small></label>
                                <input type="text" name="contact_otherfields" autocomplete="off" placeholder="(Timings,Email,etc..)" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address <small class="text-danger">*</small></label>
                                <textarea name="contact_address" autocomplete="off" placeholder="Address..." class="form-control" rows="4" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Map <small>(Optional) <b>(Embed a Map)</b></small></label>
                                <textarea name="contact_address_map" autocomplete="off" placeholder="Address Map (Embed a Map)" class="form-control" rows="2"></textarea>
                            </div>
                        </div>                          
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Contactus------------- -->
  
   <!-- --------- Image Gallery------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Gimage">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image Gallery Section Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-ImageGallery')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="imagegallery_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Image Title <small>(Optinal)</small></label>
                                <input type="text" name="image_title[]" autocomplete="off" placeholder="Image Title (Optinal)" class="form-control">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <small>(Optinal)</small></label>
                                <textarea name="image_description[]" rows="1" autocomplete="off" placeholder="Image Description..." class="form-control" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Image <small class="text-danger">*</small></label>
                               <input type="file" name="gallery_img[]" class="form-control" accept=".png, .jpg, .jpeg" required="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="imagegallery_form_add">Add More</span>
                        </div>
                        <div id="imagegallery_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Image Gallery------------- -->

   <!-- --------- Image Banner------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Banner">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Banner Section Info.</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Banner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="Banner_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Banner Title <small>(Optinal)</small></label>
                                <input type="text" name="banner_title[]" autocomplete="off" placeholder="Image Title (Optinal)" class="form-control">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Description <small>(Optinal)</small></label>
                                <textarea name="banner_description[]" rows="1" autocomplete="off" placeholder="Banner Description..." class="form-control" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Banner Image <small class="text-danger">*</small> <small>(Size 1280 X 500)</small></label>
                               <input type="file" name="banner_img[]" class="form-control" accept=".png, .jpg, .jpeg" required="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="Banner_form_add">Add More</span>
                        </div>
                        <div id="Banner_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Banner------------- -->
  
   <!-- --------- Services Section------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Services">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Services Section Info.</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Services')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="Banner_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Services Title <small class="text-danger">*</small></label>
                                <input type="text" name="services_title[]" autocomplete="off" placeholder="Services Title" class="form-control" required="">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Services Description <small>(Optinal)</small></label>
                                <textarea name="services_description[]" rows="1" autocomplete="off" placeholder="Services Description..." class="form-control" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Services Image</label>
                               <input type="file" name="services_img[]" class="form-control" accept=".png, .jpg, .jpeg" >
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="Services_form_add">Add More</span>
                        </div>
                        <div id="Services_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Services Section------------- -->
  
    <!-- --------- Backgroud Image Section------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Bgimagetext">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Backgroud Image Section Info.</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-BGImage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Section Title <small class="text-danger">*</small></label>
                                <input type="text" name="Section_title" autocomplete="off" placeholder="Section Title" class="form-control" required="">
                                
                            </div>
                        </div>                         
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Section Description <small class="text-danger">*</small></label>
                                <textarea name="section_description" rows="3" autocomplete="off" placeholder="Section Description..." class="form-control" rows="4" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Backgroud Image <small class="text-danger">*</small><small>(Size 1280 X 500)</small></label>
                               <input type="file" name="bg_image" class="form-control" accept=".png, .jpg, .jpeg" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Backgroud Image Section------------- -->
  <!-- --------- start Iconic Gallery------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Iconicimage">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Iconic Gallery Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Iconic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="Iconicimage_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Title</label>
                                <input type="text" name="iconic_title[]" autocomplete="off" placeholder="Image Title" class="form-control" required="">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <small>(Optinal)</small></label>
                                <textarea name="iconic_description[]" rows="1" autocomplete="off" placeholder="Description..." class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Image <small class="text-danger">*</small></label>
                               <input type="file" name="iconic_img[]" class="form-control" accept=".png, .jpg, .jpeg" required="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="Iconic_form_add">Add More</span>
                        </div>
                        <div id="Iconicimage_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Iconic Gallery------------- -->
  
  <!-- --------- start Testimonial------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Testimonial">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Testimonial Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Testimonial')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="Iconicimage_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Title<small class="text-danger">*</small></label>
                                <input type="text" name="Testimonial_title[]" autocomplete="off" placeholder="Image Title" class="form-control" required="">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <small class="text-danger">*</small></label>
                                <textarea name="Testimonial_description[]" rows="1" autocomplete="off" placeholder="Description..." class="form-control" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Image</label>
                               <input type="file" name="Testimonial_img[]" class="form-control" accept=".png, .jpg, .jpeg" >
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="Testimonial_form_add">Add More</span>
                        </div>
                        <div id="Testimonial_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Testimonial------------- -->
   <!-- ---------Start Logo------------- -->
        <!-- The Logo Modal -->
<div class="modal fade" id="Logo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Logo Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Title <small class="text-danger">*</small></label>
                                <input type="text" name="logo_title" autocomplete="off" placeholder="Title" class="form-control" required="">
                                
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">                                
                               <label for="exampleInputEmail1" class="d-flex">Upload Logo Image <small class="text-danger">*</small></label>
                               <input type="file" name="Logo_img" class="form-control" accept=".png, .jpg, .jpeg" required="">
                                
                            </div>
                        </div>                                             
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Logo------------- -->
   
   <!-- ---------Start Social Media------------- -->
        <!-- The Social Media Modal -->
<div class="modal fade" id="Socialmedia">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Social Media Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-SocialMedia')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                              </div>
                              <input type="url" class="form-control media" name="facebook" autocomplete="off" placeholder="facebook Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                              </div>
                              <input type="url" class="form-control media" name="instagram" autocomplete="off" placeholder="Instagram Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                              </div>
                              <input type="url" class="form-control media" name="twitter" autocomplete="off" placeholder="Twitter Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                              </div>
                              <input type="url" class="form-control media" name="youtube" autocomplete="off" placeholder="Youtube Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                              </div>
                              <input type="url" class="form-control media" name="linkedin" autocomplete="off" placeholder="Linkedin Link">
                            </div>
                        </div>                                        
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" id="SocialMedia_btn" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Social Media------------- -->

   <!-- ---------  Our Team ------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Team">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Our Team</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Our-Team')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="imagegallery_form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Title <small>(Optinal)</small></label>
                                <input type="text" name="team_title[]" autocomplete="off" placeholder="Image Title (Optinal)" class="form-control">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description <small>(Optinal)</small></label>
                                <textarea name="team_description[]" rows="1" autocomplete="off" placeholder="Image Description..." class="form-control" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Upload Image <small class="text-danger">*</small></label>
                               <input type="file" name="team_img[]" class="form-control" accept=".png, .jpg, .jpeg" required="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: auto;padding-top: 10px;">
                             <span class="btn btn-danger margin" id="team_form_add">Add More</span>
                        </div>
                        <div id="team_form_div" class="col-12 row">
                            
                        </div>                           
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" name="submit">Submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>

  <!-- ---------End Our Team------------- -->

   <!-- The Long Text Modal -->
<div class="modal fade" id="longtext">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">            
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Long Text Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Longtext')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">                         
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" id="input_long_text">Description <small class="text-danger">*</small></label>
                               <textarea name="longtext_description" class="form-control border textarea" placeholder="Place some text here" rows="4" ></textarea>

                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary margin" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary margin" id="btn_long_text" name="submit">submit</button>
                        </div>
                    </div>
                </form>                
            </div>        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">          
        </div> -->        
      </div>
    </div>
  </div>
<!-- -------------End Long Text------------------ -->
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

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex">
                    <h5>Template Contain List</h5>
                </div>
                @foreach($Contain as $list)
                  @php
                      $Add_Contain = DB::table('usertemplatecontains')->where(['temp_id'=>$template_id,'creater_id'=>Auth::User()->id,'conatin_id'=>$list->conatin_id])->value('conatin_id');
                  @endphp
                  <span class="btn btn-warning mt-1 {{$list->contain->class_name}} @if($list->conatin_id == $Add_Contain) disabled @endif" @if($list->conatin_id != $Add_Contain) data-toggle="modal" data-target="#{{$list->contain->class_name}}" @endif >{{$list->contain->contain_name}}</span>
              @endforeach
              </div>
            </div>
          </div> 

           
        </div>
        <!-- ================================== -->
        <div class="d-flex">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




        <!-- The About Modal -->
<div class="modal fade" id="About">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">About Us Section Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Client-Aboutus-Data')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">About Us Heading <small class="text-danger">*</small></label>
                                <input type="text" name="about_heading" autocomplete="off" placeholder="About Us Heading" class="form-control" maxlength="50" required="">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Us Description <small class="text-danger">*</small></label>
                                <textarea name="aboutus_description" placeholder="Description..." class="form-control" rows="4" maxlength="150" autocomplete="off" required=""></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1" class="d-flex">Upload Image (Optional)</label>
                                <input type="file" name="aboutus_img" class="form-control" accept="image/png">
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
<!-- -------------End About US------------------ -->
<!-- ---------Contact------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Contact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contact US Section Info</h4>
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
                                <input type="email" name="contact_otherfields" autocomplete="off" placeholder="(Timings,Email,etc..)" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address <small class="text-danger">*</small></label>
                                <textarea name="contact_address" autocomplete="off" placeholder="Address..." class="form-control" rows="4" required=""></textarea>
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
                               <input type="file" name="gallery_img[]" class="form-control" accept="image/png" required="">
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
                                <label for="exampleInputEmail1" class="d-flex">Upload Banner Image <small class="text-danger">*</small><small>(Size 1280 X 500)</small></label>
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
                                <label for="exampleInputEmail1" class="d-flex">Title <small>(Optinal)</small></label>
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
                              <input type="url" class="form-control media" autocomplete="off" name="instagram" placeholder="Instagram Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                              </div>
                              <input type="url" class="form-control media" autocomplete="off" name="twitter" placeholder="Twitter Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                              </div>
                              <input type="url" class="form-control media" autocomplete="off" name="youtube" placeholder="Youtube Link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                              </div>
                              <input type="url" class="form-control media" autocomplete="off" name="linkedin" placeholder="Linkedin Link">
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

         
<style>
  @media screen and (max-width: 767px) {
  .col-0 {
    display: none!important;
  }
  .btn-outline-primary
  {
    float: right!important;
    margin-bottom: 4px!important;
  }
  form .row
  {   
    padding: 6px!important;
  } 
}
  
</style>
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
        
        <!-- ================================================================================= -->
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="card card-solid" style="background: #e5f5fc;">
                  <div class="card-body pb-0">
                    <div class="d-flex h5">Template Info</div>
                    <div class="row d-flex align-items-stretch">
                      <!-- ------------------------- -->
                      @if($Aboutus_exist)
                      <div class="col-12 col-sm-12 col-md-12 align-items-stretch">
                        <div class="card bg-light">
                          <div class="card-header text-muted border-bottom-0">
                            About Us
                          </div>
                          <form class="w-100" method="" action="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body pt-0">
                              <div class="row">
                                <div class="col-md-3">
                                  <span class="">Heading</span>
                                  <input type="hidden" name="aboutus_id" value="{{$Aboutus_exist->id}}" class="form-control" required="">
                                  <input type="text" name="about_heading" value="{{$Aboutus_exist->heading}}" class="form-control my-2" >
                                  <!--<span class="">About Us Description :-</span>-->
                                  <!--<textarea class="form-control" rows="3" name="aboutus_description">< ? = nl2br($ Aboutus_exist->about_description) ?></textarea>-->
                                </div>
                                <div class="col-md-4">
                                  <span class="">About Us Description</span>
                                  <textarea class="form-control" rows="3" name="aboutus_description"><?= nl2br($Aboutus_exist->about_description) ?></textarea>
                                </div>
                                <!--@ if($ Aboutus_exist->image)-->
                                <div class="col-6 col-md-2 m-auto">
                                    <span class="">Image</span>
                                  <img src="{{asset($Aboutus_exist->image)}}" alt="" class="img-thumbnail img-fluid" style="height: 75px;width: 100%;">
                                </div>
                                <!--@ endif-->
                                <div class="col-6 col-md-2 text-center">
                                    <span class="">Change Image</span>
                                  <input type="file" name="aboutus_img" accept="image/png" class="form-control my-2">
                                </div>
                                <div class="col-md-1 m-auto text-center">
                                  <a href="{{url('Edit-Aboutus')}}/{{$Aboutus_exist->id}}" class="btn btn-sm btn-primary disabled">
                                    Update
                                  </a>
                                </div>
                              </div>
                            </div>
                            <!--<div class="card-footer mb-0">-->
                            <!--  <div class="text-right">-->
                            <!--    <a href="{ {url('Edit-Aboutus')} }/{ {$ Aboutus_exist->id} }" class="btn btn-sm btn-primary disabled">-->
                            <!--      <i class="fas fa-user"></i> Update-->
                            <!--    </a>-->
                            <!--  </div>-->
                            <!--</div>-->
                          </form>
                        </div>
                      </div>
                      @endif
                      <!-- ----------------------------------- -->
                      <!-- ------------------------- -->
                      @if($Contact_exist)
                      <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch">
                        <div class="card bg-light w-100">
                          <div class="card-header text-muted border-bottom-0">
                            Contact US
                          </div>
                          <form class="w-100" method="" action="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body pt-0" >
                                <div class="row">
                                    <div class="col-md-10 row">
                                        <div class="col-md-3">
                                          <span class="">Email</span>
                                          <input type="hidden" name="contact_id" value="{{$Contact_exist->id}}" class="form-control" required="">
                                          <input type="email" name="email" class="form-control my-2" value="{{$Contact_exist->contact_email}}">
                                        </div>
                                        <div class="col-md-3">
                                          <span>Contact</span>
                                          <input type="text" name="contact_phone" value="{{$Contact_exist->contact_phone}}" class="form-control my-2" placeholder="Contact Number" required="">
                                        </div>
                                        <div class="col-md-5">
                                          <span>Other Fields</span>
                                          <textarea name="other_fields" class="form-control" rows="2" placeholder="Other Fields (Timing, Phone)">{{$Contact_exist->contact_otherfields}}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                          <span>Address</span>
                                          <textarea name="Address" class="form-control" rows="2" placeholder="Other Fields (Timing, Phone)" style="overflow: auto;">{{nl2br($Contact_exist->contact_address)}}
                                          </textarea>
                                        </div>
                                        <div class="col-md-5">
                                          <span>Map <small>(Embed a map)</small></span>
                                          <textarea name="address_map" class="form-control" rows="2" placeholder="Embed a map" style="overflow: auto;">{{nl2br($Contact_exist->address_map)}}
                                          </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2 m-auto">
                                        <a href="{{url('Edit-Aboutus')}}/{{$Aboutus_exist->id}}" class="btn btn-sm btn-primary disabled">
                                        Update
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="card-footer">-->
                            <!--  <div class="text-right">-->
                            <!--    <a href="{{url('Edit-Aboutus')}}/{{$Aboutus_exist->id}}" class="btn btn-sm btn-primary disabled">-->
                            <!--      <i class="fas fa-user"></i> Update-->
                            <!--    </a>-->
                            <!--  </div>-->
                            <!--</div>-->
                          </form>
                        </div>
                      </div>
                      @endif
                      <!-- ----------------------------------- -->
                      <!-- ------------------------- -->
                      @if($Social_Media)
                      <div class="col-12 col-sm-12 col-md-12 align-items-stretch">
                        <div class="card bg-light">
                          <div class="card-header text-muted border-bottom-0">
                            Social Media
                          </div>
                          <div class="card-body pt-0">
                            <div class="row">
                              <div class="col-md-10 row">
                                <div class="col-md-4 mb-1">
                                    <div class="d-flex border">
                                      <span class="btn"><i class="fab fa-facebook"></i></span>
                                      <input type="url" class="form-control" style="overflow-x: auto;" placeholder="facebook Url" value="{{$Social_Media->facebook}}">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="d-flex border">
                                      <span class="btn"><i class="fab fa-instagram-square"></i></span>
                                      <input type="url" class="form-control" style="overflow-x: auto;" placeholder="Instagram Url" value="{{$Social_Media->instagram}}">
                                    </div>  
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="d-flex border">
                                      <span class="btn"><i class="fab fa-twitter"></i></span>
                                      <input type="url" class="form-control" style="overflow-x: auto;" placeholder="Twitter Url" value="{{$Social_Media->twitter}}">
                                    </div>  
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="d-flex border">
                                      <span class="btn"><i class="fab fa-youtube"></i></span>
                                      <input type="url" class="form-control" style="overflow-x: auto;" placeholder="Youtube Url" value="{{$Social_Media->youtube}}">
                                    </div>  
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="d-flex border">
                                      <span class="btn"><i class="fab fa-linkedin"></i></span>
                                      <input type="url" class="form-control" style="overflow-x: auto;" placeholder="Linkedin Url" value="{{$Social_Media->linkedin}}">
                                    </div>  
                                </div>
                              </div>
                              <div class="col-md-2">
                                  <a href="{{url('Edit-Aboutus')}}/{{$Aboutus_exist->id}}" class="btn btn-sm btn-primary disabled">
                                <i class="fas fa-user"></i> Update
                              </a>
                              </div>
                            </div>
                          </div>
                          <!--<div class="card-footer">-->
                          <!--  <div class="text-right">-->
                          <!--    <a href="{ {url('Edit-Aboutus')} }/{ {$ Aboutus_exist->id} }" class="btn btn-sm btn-primary disabled">-->
                          <!--      <i class="fas fa-user"></i> Update-->
                          <!--    </a>-->
                          <!--  </div>-->
                          <!--</div>-->
                        </div>
                      </div>
                      @endif
                      <!-- ----------------------------------- -->
                    </div>
                    <div class="row d-flex align-items-stretch">
                      <!-- ------------------------- -->
                      @if($Gallerycontain)
                      @foreach($Gallerycontain as $list)
                      <div class="col-12 d-flex align-items-stretch">
                        <div class="card bg-light w-100">
                          <div class="card-header text-muted border-bottom-0">
                            {{$list->contain->contain_name}}
                          </div>
                          <div class="card-body pt-0">
                            <div class="row text-center mb-2" id="">
                        <div class="col-0 col-md-2">
                           <!--  <div class="form-group">       -->                           
                                <label for="exampleInputEmail1" class="d-flex">Image Title</label>
                           <!--  </div> -->
                        </div>                         
                        <div class="col-0 col-md-4">
                            <!-- <div class="form-group"> -->
                                <label for="exampleInputEmail1">Description </label>
                            <!-- </div> -->
                        </div>
                        <div class="col-0 col-6 col-md-2">
                            <!-- <div class="form-group"> -->
                                <label for="exampleInputEmail1">Image</label>
                            <!-- </div> -->
                        </div>
                        <div class="col-0 col-6 col-md-2">
                            <!-- <div class="form-group">   -->                              
                                <label for="exampleInputEmail1" class="d-flex">Change Image <small class="text-danger"></small></label>
                           <!--  </div> -->
                        </div>
                        <div class="col-md-2">
                             <span class="btn btn-outline-primary btn-sm">Add More</span>
                        </div>                         
                    </div> 
                    @php
                          $website_data = DB::table('gallerycontains')->where(['domain_id'=>$list->domain_id,'section_id'=>$list->section_id])->get();
                    @endphp
                        @foreach($website_data as $iteam)
                      <form action="{{url('/Submit-Client-ImageGallery')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-auto border" id="">
                        <div class="col-md-2 m-auto">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$iteam->id}}" required="">
                               <!--  <label for="exampleInputEmail1" class="d-flex">Image Title <small>(Optinal)</small></label> -->
                                <input type="text" name="image_title[]" autocomplete="off" placeholder="Image Title" value="{{$iteam->title}}" class="form-control">
                                
                            </div>
                        </div>                         
                        <div class="col-md-4 m-auto">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Description <small>(Optinal)</small></label> -->
                                <textarea name="image_description[]" rows="2" autocomplete="off" placeholder="Image Description..." class="form-control" >{{$iteam->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-6 col-md-2 m-auto">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Description <small>(Optinal)</small></label> -->
                               <img src="{{asset($iteam->image)}}" class="img-thumbnail img-fluid" style="height: 75px;width: 100%;">
                            </div>
                        </div>
                        <div class="col-6 col-md-2 m-auto">
                            <div class="form-group">                                
                                <!-- <label for="exampleInputEmail1" class="d-flex">Change Image <small class="text-danger"></small></label> -->
                               <input type="file" name="gallery_img[]" class="form-control" accept="image/png" required="">
                            </div>
                        </div>
                        <div class="col-md-2 my-3 pt-1" style="">
                             <a href="{{url('/Delete-Gallery')}}/{{$iteam->id}}" class="btn btn-danger btn-sm disabled">X</a>
                             <button type="submit" name="submit" class="btn btn-primary btn-sm disabled">Update </button>
                        </div> 
                         
                    </div>                     
                </form> 
                @endforeach
                          </div>
                          <!-- <div class="card-footer">
                            <div class="text-right">
                              <a href="{ {url('Edit-Aboutus')} }/{ {$ Aboutus_exist->id} }" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Update
                              </a>
                            </div>
                          </div> -->
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- ----------------------------------- -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
              </div>
            </div>
          </div>
          <div class="overlay dark">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
          </div>
        </div>
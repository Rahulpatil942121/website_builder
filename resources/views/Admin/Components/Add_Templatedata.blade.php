<section class="content-header">
    <h1>
    {{$title}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12 m-auto">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{$title}}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        @foreach($Contain as $list)
                            @php
                                $Add_Contain = DB::table('usertemplatecontains')->where(['temp_id'=>$template_id,'creater_id'=>Auth::User()->id,'conatin_id'=>$list->conatin_id])->value('conatin_id');
                            @endphp
                            <span class="btn btn-warning {{$list->contain->class_name}} @if($list->conatin_id == $Add_Contain) disabled @endif" data-toggle="modal" data-target="#{{$list->contain->class_name}}" >{{$list->contain->contain_name}}</span>
                        @endforeach
                        </div><!-- /.box -->
                    </div>
                </div>
            </section><!-- /.content -->


            <!-- ====================== -->

        <!-- The About Modal -->
<div class="modal fade" id="About">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">About Us Contain</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Aboutus-Data')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">About Us Heading</label>
                                <input type="text" name="about_heading" placeholder="About Us Heading" class="form-control" required="">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Us Description</label>
                                <textarea name="aboutus_description" placeholder="Description..." class="form-control" rows="4" required=""></textarea>

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
  <!-- ---------End Contact------------- -->
        <!-- The Contact Modal -->
<div class="modal fade" id="Contact">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Contact US Contain</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('/Submit-Contain-Data')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="temp_id" class="form-control" value="{{$template_id}}" required="">
                                <label for="exampleInputEmail1" class="d-flex">Email</label>
                                <input type="email" name="contact_email" placeholder="Email" class="form-control" required="">
                                
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="exampleInputEmail1" class="d-flex">Phone</label>
                                <input type="text" name="contact_phone" placeholder="Phone Number (Only Numbers)" minlength="10" maxlength="10" class="form-control" required="">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1" class="d-flex">Other Fields <small>(Optional)</small></label>
                                <input type="email" name="contact_otherfields" placeholder="(Timings,Email,etc..)" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea name="contact_address" placeholder="Address..." class="form-control" rows="4" required=""></textarea>
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
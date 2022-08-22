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
                    <form role="form" id="basic-form" action="{{url('/Submit-Template')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">                                 
                                    <label for="exampleInputEmail1">Template Name</label>
                                    <input type="hidden" name="template_id" value="{{$template_id}}" class="form-control" required="">
                                    <input type="text" name="template_name" value="{{$template->template->temp_name}}" autocomplete="off" placeholder="Enter Template Name" class="form-control" readonly="">
                                    
                                    @if($errors->has('template_name')) <p class="text-danger">{{ $errors->first('template_name') }}</p>@endif
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">                                 
                                    <label for="exampleInputEmail1">Template Uploaded Folder Name</label>
                                    <input type="text" name="temp_folder_name" value="{{$template->template->folder_name}}" autocomplete="off" placeholder="Enter Folder Name(No Any Space)" class="form-control" required="">
                                    
                                    @if($errors->has('temp_folder_name')) <p class="text-danger">{{ $errors->first('temp_folder_name') }}</p>@endif
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">                                 
                                <label for="exampleInputEmail1">Template Type</label>
                                  <select class="form-control" name="temp_type" required="">
                                    <option value="">Select Template Type</option>
                                    @foreach($Temptype as $list)
                                       <option value="{{$list->id}}" @if($template->template->temp_type == $list->id) selected @endif>{{$list->type_name}}</option>
                                    @endforeach  
                                 </select>
                                @if($errors->has('status')) <p class="text-danger">{{ $errors->first('status') }}</p>@endif
                            </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">                                 
                                <label for="exampleInputEmail1">Status</label>
                                  <select class="form-control" name="status" required="">
                                       <option value="0"  @if($template->template->status == 0) selected @endif>De-Active</option>
                                      <option value="1"  @if($template->template->status ==1) selected @endif>Active</option>
                                 </select>
                                @if($errors->has('status')) <p class="text-danger">{{ $errors->first('status') }}</p>@endif
                            </div> 
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label>Conatin List</label>
                                </div>                                
                                @if($Contain)
                                    @foreach($Contain as $list)
                                    <div class="col-md-3">
                                        <div class="form-group">                                 
                                             <label>
                                                <input type="checkbox" name="temp_contain[]" value="{{$list->id}}" class="minimal-red" @if(DB::table('temp_contains')->where(['temp_id'=>$template_id,'conatin_id'=>$list->id])->exists()) checked @endif />
                                                {{$list->contain_name}}
                                            </label>
                                        </div> 
                                    </div>
                                     @endforeach
                                 @endif
                                <!-- ------------------- -->
                            </div> 
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset"  class="btn btn-secondary">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>                         
                        </div><!-- /.box -->
                    </div>
                </div>
            </section><!-- /.content
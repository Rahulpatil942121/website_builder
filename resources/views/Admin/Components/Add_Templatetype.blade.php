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
        <div class="col-md-6 m-auto">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{$title}}</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    @if(!$Temptype)
                    <form role="form" id="basic-form" action="{{url('/Submit-Temptype')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1">Template Type Name</label>
                                <input type="text" name="temptype_name" value="{{old('temptype')}}" autocomplete="off" placeholder="Enter Template Type Name" class="form-control" required="">
                                
                                @if($errors->has('temptype')) <p class="text-danger">{{ $errors->first('temptype') }}</p>@endif
                            </div> 
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1">Status</label>
                                  <select class="form-control" name="status" required="">
                                       <option value="0">De-Active</option>
                                      <option value="1">Active</option>
                                 </select>
                                @if($errors->has('status')) <p class="text-danger">{{ $errors->first('status') }}</p>@endif
                            </div>                           
                            
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset"  class="btn btn-secondary">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        @else
                        <!-- ======================================= -->
                            <form role="form" id="basic-form" action="{{url('/Submit-Temptype')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1">Template Type Name</label>
                                <input type="hidden" name="temptype_id" value="{{$Temptype->id}}" class="form-control" required="">
                                <input type="text" name="temptype_name" value="{{$Temptype->type_name}}" autocomplete="off" placeholder="Enter Template Type Name" class="form-control" required="">
                                
                                @if($errors->has('temptype_name')) <p class="text-danger">{{ $errors->first('temptype_name') }}</p>@endif
                            </div> 
                            <div class="form-group">                                 
                                <label for="exampleInputEmail1">Status</label>
                                  <select class="form-control" name="status" required="">
                                       <option value="0" @if($Temptype->status == 0) selected @endif >De-Active</option>
                                      <option value="1" @if($Temptype->status == 1) selected @endif>Active</option>
                                 </select>
                                @if($errors->has('status')) <p class="text-danger">{{ $errors->first('status') }}</p>@endif
                            </div>                           
                            
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset"  class="btn btn-secondary">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        @endif
                        </div><!-- /.box -->
                    </div>
                </div>
            </section><!-- /.content
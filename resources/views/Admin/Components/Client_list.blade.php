 
<section class="content-header">
    <h1>
    {{$title}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> {{$title}}</h3>
            </div><!-- /.box-header -->
            <!-- /.box-header -->
            <!--<div class="row" style="">-->
            <!--    <a href="{ {url('/Add-Template')} }" class="btn btn-primary" style="float: right;margin-right: 40px;margin-bottom: 2px;">Add Template</a>-->
            <!--</div>-->
            
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Profile</th>
                            <th>No. Site</th>
                            <th>Status</th>
                            <th>Action</th>                                           
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                       @foreach($Client as $list)                    
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->email}}</td>                            
                            <td>@if(isset($list->image))
                                <img src="{{asset($list->image)}}" class="img-circle" alt="User Image" style="width: 43px;height: 43px;">
                            @else
                            <img src="{{asset('Admin/img/avatar3.png')}}" class="img-circle" alt="User Image" style="width: 43px;height: 43px;">
                            @endif</td>
                            <td>
                                @php
                                    $site_count = DB::table('domaincreations')->where('creater_id',$list->id)->count();
                                @endphp
                                {{$site_count}}
                            </td>
                            <td>@if($list->status == 1) Active @else De-Active @endif</td>
                            <td>
                                @if($list->status == 1)
                                <a href="{{url('/Client-Status')}}/{{$list->id}}" class="btn btn-sm margin btn-danger">D-Active</a>
                                @else
                                <a href="{{url('/Client-Status')}}/{{$list->id}}" class="btn btn-sm margin btn-primary">Active</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Profile</th>
                        <th>No. Site</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
                </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                </section><!-- /.content
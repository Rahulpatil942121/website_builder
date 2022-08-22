 
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
            <div class="row" style="">
                <a href="{{url('/Add-Contain')}}" class="btn btn-primary" style="float: right;margin-right: 40px;margin-bottom: 2px;">Add Contain</a>
            </div>
            
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Contain Name</th>                             
                            <th>Status</th>
                            <th>Action</th>                                          
                        </tr>
                    </thead>
                    <tbody>
                        @php $i =1; @endphp 
                        @foreach($Containlist as $list)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$list->contain_name}}</td>
                            <td>@if($list->status== 1) Active @else De-Active @endif</td>
                            <td><a href="{{url('/Edit-Contain')}}/{{$list->id}}" class="btn btn-sm margin btn-info"><i class="fa fa-fw fa-pencil"></i></a>
                                <a href="{{url('/Delete-Contain')}}/{{$list->id}}" class="btn btn-sm margin btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Contain Name</th>                             
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
                </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                </section><!-- /.content
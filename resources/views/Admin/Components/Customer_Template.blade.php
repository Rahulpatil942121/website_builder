 
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
                            <th>Template Name</th>
                            <th>Folder Name</th>
                            <th>Template Type</th>
                            <th>Visit Site</th>
                            <th>Status</th>
                            <th>Action</th>                                           
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                       @foreach($Template as $list)                    
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$list->domain_name}}</td>
                            <td>{{$list->template->folder_name}}</td>
                            <td>{{$list->template->temptype->type_name}}</td>
                            <td><a href="https://duticorptech.prismoptical.in/index/{{$list->domain_name}}" target="_balank">View site</a></td>
                            <td>@if($list->status == 1) Active @else De-Active @endif</td>
                            <td>
                                <!-- <a href="{ {url('/Edit-Template')} }/{ {$ list->template->id} }" class="btn btn-sm margin btn-info"><i class="fa fa-fw fa-pencil"></i></a>
                                <a href="{ {url('/Delete-Template')} }/{ {$ list->template->id} }" class="btn btn-sm margin btn-danger"><i class="fa fa-fw fa-trash-o"></i></a> -->
                                <!--<a href="{ {url('/Add-Template-Data')} }/{{$ list->template->id} }" class="btn btn-sm margin btn-warning"><i class="fa fa-fw fa-arrow-circle-right"></i></a>-->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Template Name</th>
                        <th>Folder Name</th>
                        <th>Template Type</th>
                        <th>Visit Site</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
                </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                </section><!-- /.content
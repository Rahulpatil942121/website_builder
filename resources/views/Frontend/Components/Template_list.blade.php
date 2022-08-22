<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row d-flex align-items-stretch">
              @if(count($errors) > 0)              
                  @foreach($errors->all() as $error)
                      <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
              @endif
            
            @foreach($Templatetb as $list)
            <div class="col-12 row">
              <div class="col-12 col-md-4 d-flex align-items-stretch" style="position: relative;">
              <div class="card bg-light w-100" style="height: 375px;">                
                <iframe src="https://duticorptech.prismoptical.in/index/{{$list->temp_name}}" title="" style="height: inherit;width: 100%;"></iframe>                 
           
              </div>
              <!-- <div class="w-100" style="position: absolute;top: 83%;left: 15px;">
                  <a href="{{url('/Template-Data')}}/{{$list->id}}" class="btn btn-sm bg-teal">
                      <! -- <i class="fas fa-comments"></i> - -> 
                      Add Template Contain
                    </a>
                    <a href="https://duticorptech.prismoptical.in/index/{{$list->temp_name}}" class="btn btn-sm btn-primary" target="_blank">
                      <i class="nav-icon fas fa-th"></i> View Template
                    </a>
              </div> -->
            </div>
            <!-- --------------------- -->
            <div class="col-md-8 d-flex align-items-stretch">
              <div class="card bg-light w-100">
                <div class="card-header text-center border-bottom-0 h4">
                  <!-- Template Type :- { {$ list->temptype->type_name} } -->
                  Template Details
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <table class="table table-bordered m-auto text-left">
                      <tr>
                        <td class="w-25">Template Type</td>
                        <td class="w-75">{{$list->temptype->type_name}}</td>
                      </tr>
                      <tr>
                        <td>Price</td>
                        <td>4500 Rs</td>
                      </tr>
                      <tr>
                        <td>Built with Tech.</td>
                        <td>HTML, CSS, Bootstrap 4, Javascript, Jquery </td>
                      </tr>
                      
                      <tr>
                        <td>License Under</td>
                        <td>Duti Corp</td>
                      </tr>
                    </table>
                    <!-- <div class="col-10 row m-auto">
                      <div class="col-4">
                        <b>Template Type</b>
                      </div>
                      <div class="col-md-8">
                        { {$ list->temptype->type_name} }
                      </div>
                      <div class="col-4">
                        <b>Release Date</b>
                      </div>
                      <div class="col-md-8">
                        < ?= date('d-m-Y') ?>
                      </div>
                      <div class="col-4">
                        <b>Release Date</b>
                      </div>
                      <div class="col-md-8">
                        < ?= date('d-m-Y') ?>
                      </div>
                      <div class="col-md-4">
                        <b>Built with Tech</b>
                      </div>
                      <div class="col-md-8">
                        
                      </div>
                    </div> -->
                    <div class="col-12 pt-2">
                     <!--  <h2 class="lead"><b>{{$list->temp_name}}</b></h2> -->
                      <p class="text-muted text-sm"><b>Description :- </b> Single Page Website Template</p>
                      <!-- //substr($big, 0, 100); -->
                       <!-- <div>
                         <span class=""><i class="fas fa-lg fa-building"></i></span>
                           @ php
                              $ containlist = DB::table('temp_contains')
                              ->join('containlists','containlists.id', '=', 'temp_contains.conatin_id')
                              ->select('containlists.contain_name')
                              ->where('temp_contains.temp_id',$list->id)
                              ->orderByRaw("FIELD(temp_contains.conatin_id , 7,2,3,5,1,8,6,9,10,4,11) ASC")
                              ->get();

                              //print_r($ containlist);
                          @ endphp
                          @ foreach($ containlist as $ iteam)
                            { {$iteam->contain_name} },
                          @ endforeach
                       </div> -->
                       
                    </div>
                    <!-- <div class="col-5 text-center">
                      <img src="{{asset('Frontend/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                    </div> -->
                  </div>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-start">
                    <!-- <a href="{ {url('/New-Template-Data')} }/{ {$ list->id} }" class="btn btn-sm  btn-outline-primary mr-2"> -->
                      <span class="btn btn-sm btn-outline-primary mr-2 btn_create" datalist="{{$list->id}}" data-toggle="modal" data-target="#myModal">
                        Create New Website
                      </span>
                      <!-- <i class="fas fa-comments"></i> --> 
                    <!-- </a> -->
                    <a href="https://duticorptech.prismoptical.in/index/{{$list->temp_name}}" class="btn btn-sm btn-primary" target="_blank">
                     <!--  <i class="nav-icon fas fa-th"> </i> -->
                       View Template
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
            @endforeach
            <div class="col-12 d-flex justify-content-center">
              {{ $Templatetb->links("pagination::bootstrap-4") }}
            </div>
            
          </div>
        </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
   
  </section>

  <!-- =============================== -->

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Business Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form class="w-100" action="{{url('/Submit-Business-Name')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row d-flex align-items-stretch">
            <div class="col-md-12 m-auto row border rounded p-4">
              <div class="col-12 text-center mb-2">
                <h3>Business Information</h3>
              </div>
              <div class="form-group w-100 row">
                <div class="col-md-4">
                  <span>Business Name</span>
                </div>
                <div class="col-md-8">
                  <input type="hidden" name="template_id" id="template_id" class="form-control" required="">
                  <input type="text" name="business_name" class="form-control p-2" autocomplete="off" placeholder="Budiness Name" required="">
                </div>
              </div>
              <!-- <div class="form-group w-100 row">
                <div class="col-md-4">
                  <span>Business Name</span>
                </div>
                <div class="col-md-8">
                  <input type="text" name="business_name" class="form-control p-2" placeholder="Budiness Name" required="">
                </div>
              </div> -->
              <div class="form-group w-100 row">
                <div class="col-md-4">
                  <span>Upload Logo</span>
                </div>
                <div class="col-md-8">
                  <input type="file" name="business_logo" class="form-control" required="">
                </div>
              </div>
              <div class="col-12 row p-2 justify-content-center">
                <button type="submit" class="btn btn-primary btn-block">Next</button>
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
</div>
<!-- ================================ -->

<!-- <style>
  .dt-buttons
  {
    display: none;
  }
</style>
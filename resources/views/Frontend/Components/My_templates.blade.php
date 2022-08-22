<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row d-flex align-items-stretch">
            
            @foreach($client_template as $list)
            <div class="col-12 row">
              <div class="col-12 col-md-4 d-flex align-items-stretch" style="position: relative;">
              <div class="card bg-light w-100" style="height: 375px;">                
                <iframe src="https://duticorptech.prismoptical.in/index/{{$list->domain_name}}" title="" style="height: inherit;width: 100%;"></iframe>                 
           
              </div>            
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
                        <td class="w-75">{{$list->template->temptype->type_name}}</td>
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
                    <div class="col-12 pt-2">
                     <!--  <h2 class="lead"><b>{{$list->temp_name}}</b></h2> -->
                      <p class="text-muted text-sm"><b>Description :- </b> Single Page Website Template</p>
                      <!-- //substr($big, 0, 100); -->
                       <div>
                         <span class=""><i class="fas fa-lg fa-building"></i></span>
                            @php
                              $containlist = DB::table('usertemplatecontains')
                              ->join('containlists','containlists.id', '=', 'usertemplatecontains.conatin_id')
                              ->select('containlists.contain_name')
                              ->where(['usertemplatecontains.temp_id'=>$list->template->id,'usertemplatecontains.creater_id'=>Auth::User()->id])
                              ->orderByRaw("FIELD(usertemplatecontains.conatin_id , 7,2,3,5,1,8,6,9,10,4,11) ASC")
                              ->get();

                              //print_r($containlist);
                          @endphp
                          @foreach($containlist as $iteam)
                            {{$iteam->contain_name}},
                          @endforeach
                       </div>
                       
                    </div>
                   
                  </div>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-start">
                    <a href="{{url('/Template-Data')}}/{{$list->temp_id}}/{{$list->id}}" class="btn btn-sm  btn-outline-primary mr-2">
                      <!-- <i class="fas fa-comments"></i> --> My Website
                    </a>
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
              {{ $client_template->links("pagination::bootstrap-4") }}
            </div>
            
          </div>
        </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  
 
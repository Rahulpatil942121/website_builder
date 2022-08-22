<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            
            @foreach($Templatetb as $list)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch" style="position: relative;">
              <div class="card bg-light" style="height: 300px;">
                 <a href="{{url('/Template-Data')}}/{{$list->id}}" style="height: 100%;">
                <iframe src="https://duticorptech.prismoptical.in/index/{{$list->temp_name}}" title="" style="height: inherit;">
</iframe>
                 
            </a>
              </div>
              <div class="w-100" style="position: absolute;top: 83%;left: 15px;">
                  <a href="{{url('/Template-Data')}}/{{$list->id}}" class="btn btn-sm bg-teal">
                      <!-- <i class="fas fa-comments"></i> --> Add Template Contain
                    </a>
                    <a href="https://duticorptech.prismoptical.in/index/{{$list->temp_name}}" class="btn btn-sm btn-primary" target="_blank">
                      <i class="nav-icon fas fa-th"></i> View Template
                    </a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  

<!-- <style>
  .dt-buttons
  {
    display: none;
  }
</style>
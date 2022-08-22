<!DOCTYPE html> 
<html lang="en">
@include('Frontend/Common/Header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

  @if($flag == 1)
      @include('Frontend/Components/Dashboard')
  @elseif($flag == 2)
      @include('Frontend/Components/Template_list')
  @elseif($flag == 3)
      @include('Frontend/Components/Add_Templatedata')
  @elseif($flag == 4)
      @include('Frontend/Components/My_templates')
  @elseif($flag == 5)
      @include('Frontend/Components/My_templateinfo')
  <!-- @ elseif($ flag == 6)
      @ include('Frontend/Components/Add_businessInfo')  --> 
    @elseif($flag == 6)
      @include('Frontend/Components/Profile')  
    @elseif($flag == 7)
      @include('Frontend/Components/Change_password')  
  @endif    

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <div class="overlay dark" style="display: none;">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
          </div>

          <style type="text/css">
            .overlay{
                position: absolute;
                background: rgba(0,0,0,.5);
                align-items: center;
                display: flex;
                justify-content: center;
                z-index: 50;
                top: 0;
                left: 0;
                height: 100vh;
                width: 100vw;
            }
          </style>
 @include('Frontend/Common/Footer')
</body>
</html>

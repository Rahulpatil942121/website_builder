@include('Admin/Common/header')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    @if($flag == 1)
      @include('Admin/Components/Dashboard')
    @elseif($flag == 2)
      @include('Admin/Components/Template_List')
    @elseif($flag == 3)
      @include('Admin/Components/Contain_List') 
    @elseif($flag == 4)
      @include('Admin/Components/Add_Contain')
    @elseif($flag == 5)
      @include('Admin/Components/Add_Template')
    @elseif($flag == 6)
      @include('Admin/Components/Template_type')
    @elseif($flag == 7)
      @include('Admin/Components/Add_Templatetype')
    @elseif($flag == 8)
      @include('Admin/Components/Add_Templatedata')
    @elseif($flag == 9)
      @include('Admin/Components/Customer_Template') 
    @elseif($flag == 10)
      @include('Admin/Components/Edit_template')
    @elseif($flag == 11)
      @include('Admin/Components/Admin_profile')
    @elseif($flag == 12)
      @include('Admin/Components/Client_list')           
    @endif
</aside><!-- /.right-side -->
@include('Admin/Common/footer')
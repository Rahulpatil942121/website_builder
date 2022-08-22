 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 <!--  <footer class="main-footer">
    <! -- To the right - ->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    Default to the left
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div> -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
 
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Frontend/js/adminlte.min.js')}}"></script>
 <script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
 @toastr_js
 @toastr_render
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script>
  $(document).ready(function()
    {
      $('.textarea').summernote();
       
    $('#btn_long_text').click(function()
    {
        if(!$('.textarea').val())
        {
            $('#input_long_text').css('color','red');
           //alert("Plz Required this!!!!");
           return false;
        }
    });
      // ============================
        $('.btn_create').click(function()
          {
              $('#template_id').val($(this).attr('datalist'));
          });

      // ==================================

        $('#imagegallery_form_add').click(function()
          {

              $('#imagegallery_form_div').append('<div class="col-12 row"><div class="col-md-3"><div class="form-group"> <input type="text" name="image_title[]" autocomplete="off" placeholder="Image Title (Optinal)" class="form-control"></div></div><div class="col-md-4"><div class="form-group"><textarea name="image_description[]" rows="1" autocomplete="off" placeholder="Image Description..." class="form-control" rows="4" ></textarea></div></div><div class="col-md-3"><div class="form-group"><input type="file" name="gallery_img[]" class="form-control" accept="image/png" required=""></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
          });

        $("#imagegallery_form_div").on('click','.remove',function()
      {
        $(this).parent().parent().remove();
      });


        // ===============================================


        $('#Banner_form_add').click(function()
          {

              $('#Banner_form_div').append('<div class="col-12 row"><div class="col-md-3"><div class="form-group"> <input type="text" name="banner_title[]" autocomplete="off" placeholder="Banner Title (Optinal)" class="form-control"></div></div><div class="col-md-4"><div class="form-group"><textarea name="banner_description[]" rows="1" autocomplete="off" placeholder="Banner Description..." class="form-control" rows="1" ></textarea></div></div><div class="col-md-3"><div class="form-group"><input type="file" name="banner_img[]" class="form-control" accept=".png, .jpg, .jpeg" required=""></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
          });

        $("#Banner_form_div").on('click','.remove',function()
      {
        $(this).parent().parent().remove();
      });

        // =========================================

        $('#Services_form_add').click(function()
          {
              $('#Services_form_div').append('<div class="col-12 row"><div class="col-md-3"><div class="form-group"> <input type="text" name="services_title[]" autocomplete="off" placeholder="Services Title" class="form-control" required=""></div></div><div class="col-md-4"><div class="form-group"><textarea name="services_description[]" rows="1" autocomplete="off" placeholder="Services Description..." class="form-control" rows="1" ></textarea></div></div><div class="col-md-3"><div class="form-group"><input type="file" name="services_img[]" class="form-control" accept=".png, .jpg, .jpeg"></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
           
          });

        $("#Services_form_div").on('click','.remove',function()
      {
        $(this).parent().parent().remove();
      });

        // =====================================

        $('#Iconic_form_add').click(function()
          {

              $('#Iconicimage_form_div').append('<div class="col-12 row"><div class="col-md-3"><div class="form-group"> <input type="text" name="iconic_title[]" autocomplete="off" placeholder="Title" class="form-control" required=""></div></div><div class="col-md-4"><div class="form-group"><textarea name="iconic_description[]" rows="1" autocomplete="off" placeholder="Description..." class="form-control" rows="1" ></textarea></div></div><div class="col-md-3"><div class="form-group"><input type="file" name="iconic_img[]" class="form-control" accept=".png, .jpg, .jpeg" required=""></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
          });

        $("#Iconicimage_form_div").on('click','.remove',function()
      {
        $(this).parent().parent().remove();
      });

        // =====================================

        $('#Testimonial_form_add').click(function()
          {

              $('#Testimonial_form_div').append('<div class="col-12 row"><div class="col-md-3"><div class="form-group"> <input type="text" name="Testimonial_title[]" autocomplete="off" placeholder="Title" class="form-control" required=""></div></div><div class="col-md-4"><div class="form-group"><textarea name="Testimonial_description[]" rows="1" autocomplete="off" placeholder="Description..." class="form-control" rows="1" required=""></textarea></div></div><div class="col-md-3"><div class="form-group"><input type="file" name="Testimonial_img[]" class="form-control" accept=".png, .jpg, .jpeg"></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
          });

        $("#Testimonial_form_div").on('click','.remove',function()
      {
        $(this).parent().parent().remove();
      });

        // =====================================

      //   $('#socialmedia_form_add').click(function()
      //     {

      //         $('#socialmedia_div').append('<div class="col-12 row"><div class="col-md-4"><div class="form-group">  <input type="text" name="Social_Media[]" autocomplete="off" placeholder="Social Media Name" class="form-control" required=""></div></div><div class="col-md-6"><div class="form-group"> <input type="url" name="Social_Media_url[]" autocomplete="off" placeholder="Social Media URL" class="form-control" required=""></div></div><div class="col-md-2"><span class="btn btn-danger margin remove">X</span></div></div>');
      //     });

      //   $("#socialmedia_div").on('click','.remove',function()
      // {
      //   $(this).parent().parent().remove();
      // });

      $('#SocialMedia_btn').click(function()
        {
          //alert('SocialMedia');
            if($('.media').val().length === 0)
            {
              alert('At List One Social Media Link!!!');
              return false;
            }
        });

    });
</script>
 
   
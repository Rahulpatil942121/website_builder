     
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{asset('Admin/js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{asset('Admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
         
        <script src="{{asset('Admin/js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>       

        <!-- AdminLTE App -->
        <script src="{{asset('Admin/js/AdminLTE/app.js')}}" type="text/javascript"></script>
         
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

         <!-- DATA TABES SCRIPT -->
        <script src="{{asset('Admin/js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{asset('Admin/js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <!-- ----------------------------- -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.js"></script> -->
        <!-- -------------toastr---------------------- -->
        <!-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>  -->
         @toastr_js
    @toastr_render 

         <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true
                });
            });

            $("#basic-form,#any_form").validate();


        </script>  

        <script type="text/javascript">
            $(document).ready(function()
            {
              $('.comp_delete').click(function()
              {
                  if(confirm('Are you sure you want to Delete?') == true)
                  {
                    return true;
                  }
                  else
                  {
                      return false;
                  }
              });
              
               
              $("#files").change(function() {
                   $('#btnimg_submit').click();
                });
                // $.ajax({                 
                //     type: "get",          
                //     url: "https://www.universal-tutorial.com/api/getaccesstoken",
                //     success : function(response)
                //     {   
                //         //console.log(response.auth_token);                        
                //         getcountry(response.auth_token);  
                //     },

                //    headers: {
                //             "Accept": "application/json",
                //             "api-token": "XkP1lAjhE4zuFm3NBB94g4qnESfref78-QEyPlyms29PhVtOryi2UI2dGtHUN8ngbSg",
                //             "user-email": "rahulpatil942121@gmail.com"
                //           }
                //     });


                // function getcountry(auth_token)
                // {
                //     $.ajax({                 
                //     type: "get",          
                //     url: "https://www.universal-tutorial.com/api/countries/",
                //     success : function(response)
                //     {   
                //         //console.log(response);                        
                //         //getstate(auth_token); 

                //         var len = response.length;
                //         //console.log(len);
                //            $('#ddlcountry1').html('<option value="">Select Country</option>');
                //           if(len > 0)
                //          {
                //            var select = "";
                //           var exit_country = $('#extcountry_name').val();
                //            for(var i = 0;i < len;i++)
                //            {  
                //            //console.log(response[i].country_name);
                //               if(exit_country == response[i].country_name)
                //               {
                //                 select = "selected";
                //               }
                //               else{ select = "";}                             
                //               $('#ddlcountry1').append('<option value="'+ response[i].country_name +'" '+select+' >'+ response[i].country_name +'</option>');                               
                             
                //            }  
                //          } 
                //           //$('.ddlcountry').change(); 
                //     },

                //    headers: 
                //    {
                //         "Authorization": "Bearer "+ auth_token,
                //         "Accept": "application/json"
                //       }
                //     });
                // }
                // -------------------------------------

                // $('#ddlcountry').change(function()
                // {
                //   $.ajax({                 
                //     type: "get",          
                //     url: "https://www.universal-tutorial.com/api/getaccesstoken",
                //     success : function(response)
                //     {   
                //         //console.log(response.auth_token);                        
                //         getstate(response.auth_token);  
                //     },

                //    headers: {
                //             "Accept": "application/json",
                //             "api-token": "XkP1lAjhE4zuFm3NBB94g4qnESfref78-QEyPlyms29PhVtOryi2UI2dGtHUN8ngbSg",
                //             "user-email": "rahulpatil942121@gmail.com"
                //           }
                //     });


                // }).change();



                // function getstate(auth_token)
                // {
                //     let country_name = $('#ddlcountry').val();
                //     //let exit_state = $('#state_id').attr('datalist');
                //     //alert(exit_state);
                //     $.ajax({                 
                //         type: "get",          
                //         url: "https://www.universal-tutorial.com/api/states/"+country_name,
                //         success : function(response)
                //         {   
                //            //console.log(response[0].state_name);
                //            var len = response.length;
                //            $('#ddlstate').html('<option value="">Select State</option>');
                //            if(len > 0)
                //          {
                //              var select = "";
                //               var exit_state = $('#extstate_name').val();
                //            for(var i = 0;i < len;i++)
                //            {    
                //               if(exit_state == response[i].state_name)
                //               {
                //                 select = "selected";
                //               }
                //               else{ select = "";} 
                                                           
                //               $('#ddlstate').append('<option value="'+ response[i].state_name +'" '+select+'>'+ response[i].state_name +'</option>');                               
                             
                //            }  
                //          } 
                //           $('#ddlstate').change();
                              
                //         },

                //        headers: 
                //        {
                //             "Authorization": "Bearer "+ auth_token,
                //             "Accept": "application/json"
                //         }
                //     });

                // }


                    // $('.btn_delete').click(function()
                    // {
                    //   if(confirm('Are you sure you want to Delete?') == true)
                    //   {
                    //     return true;
                    //   }
                    //   else
                    //   {
                    //       return false;
                    //   }
                    // });
                 
                });

              // $('.comp_approval').click(function()
              //   {
              //       if(confirm('Are you sure you want to Approval This?') == true)
              //     {
              //       return true;
              //     }
              //     else
              //     {
              //         return false;
              //     }
              //   });

     // -------------------------------

        // $('#ddlstate').change(function()
        // {
        //     //alert($(this).val());

             // $.ajax({                 
             //        type: "get",          
             //        url: "https://www.universal-tutorial.com/api/getaccesstoken",
             //        success : function(response)
             //        {   
             //            //console.log(response.auth_token);                        
             //            getcity(response.auth_token);  
             //        },

             //       headers: {
             //                "Accept": "application/json",
             //                "api-token": "XkP1lAjhE4zuFm3NBB94g4qnESfref78-QEyPlyms29PhVtOryi2UI2dGtHUN8ngbSg",
             //                "user-email": "rahulpatil942121@gmail.com"
             //              }
             //        });

                // function getcity(auth_token)
                // {
                //     let state_name = $('#ddlstate').val();                     
                //     //alert(exit_city);
                //     $.ajax({                 
                //         type: "get",          
                //         url: "https://www.universal-tutorial.com/api/cities/"+state_name,
                //         success : function(response)
                //         {  
                //             //console.log(response);
                //            var len = response.length;
                //            $('#city_name').html('<option value="">Select City</option>');
                //            if(len > 0)
                //          {
                //            for(var i = 0;i < len;i++)
                //            {
                //               $('#city_name').append('<option value="'+ response[i].city_name +'">'+ response[i].city_name +'</option>');                         
                //             }  
                //          } 
                              
                //         },

                //        headers: 
                //        {
                //             "Authorization": "Bearer "+ auth_token,
                //             "Accept": "application/json"
                //         }
                //     });

        //         }
        // });
        </script> 
        <!-- <script type="text/javascript">
          $(document).ready(function()
            {

                

              $('#ddldepartment').change(function()
              {
                  //alert($(this).val());
                  var dept_id = $(this).val();

                  $.ajax({
                 
                    type: "post",          
                    url: "{{ url('Check-Department-Head') }}",
                    dataType: "json",
                    data: {"_token": "{{csrf_token()}}",
                    "deptment_id": dept_id},
                    success : function(response)
                    {
                      //console.log(response);
                      var len = response['data'].length;
                      //console.log(len);                  

                      $('#ddldepartmenthead option').remove();
                      $('#ddldepartmenthead').html('<option value="0">Select Department Head</option>'); 
                                        
                        if(len > 0)
                        {
                            var select = "";
                            var exit_depthead = $('#extdepthead_id').val();
                          
                          for(var i = 0;i < len;i++)
                          {

                            if(exit_depthead == response['data'][i].id)
                              {
                                select = "selected";
                              }else{ select =''; }

                            $('#ddldepartmenthead').append('<option value="'+ response['data'][i].id +'" '+select+'>'+ response['data'][i].name +'</option>');
                          }  
                        }
                        // else
                        // {
                        //   $('#ddldepartmenthead').html('<option value="0">Select Department Head</option>');
                        // }
                    }
                  });
                }).change();

              $('#submit').click(function()
                {
                  if($('#ddldepartmenthead').val() == 0)
                  {
                   if(confirm('Are you sure This Employee Not Undered Department Head?') == true)
                      {
                        return true;
                      }
                      else
                      {
                          return false;
                      }
                  }
                });
              // -----------------------------------------
              $('#country').change(function()
              {
                    var country_name = $('#country').val();

                  if(country_name)
                {
                  $.ajax({                       
                      type: "post",          
                      url: "{{ url('check-State') }}",
                      dataType: "json",
                      data: {"_token": "{{ csrf_token() }}",
                      "country_name": country_name},
                      success : function(response)
                      {
                        //console.log(response);
                        var len = response['data'].length;
                        //console.log(len);                  

                        $('#state option').remove(); 
                        $('#state').html('<option value="">Select State</option>');                  
                          if(len > 0)
                          {
                              var select = "";
                              var exit_state = $('#extstate_name').val();

                            for(var i = 0;i < len;i++)
                            {
                              if(exit_state == response['data'][i].state_name)
                              {
                                select = "selected";
                              }else{ select =''; }

                              $('#state').append('<option value="'+ response['data'][i].state_name +'"'+select+'>'+ response['data'][i].state_name +'</option>');
                            }  
                          }
                      }
                    });
                }
                else
                {
                  alert("Please Select Country");
                }  
              }).change();

              $('#state').change(function()
              {                 

                  $.ajax({                 
                    type: "get",          
                    url: "https://www.universal-tutorial.com/api/getaccesstoken",
                    success : function(response)
                    {   
                        //console.log(response.auth_token);                        
                        state_city(response.auth_token);  
                    },

                   headers: {
                            "Accept": "application/json",
                            "api-token": "XkP1lAjhE4zuFm3NBB94g4qnESfref78-QEyPlyms29PhVtOryi2UI2dGtHUN8ngbSg",
                            "user-email": "rahulpatil942121@gmail.com"
                          }
                    });
                }).change();

                  function state_city(auth_token)
                {
                    let state_name = $('#state').val();                     
                    //alert(exit_city);
                    $.ajax({                 
                        type: "get",          
                        url: "https://www.universal-tutorial.com/api/cities/"+state_name,
                        success : function(response)
                        {  
                            //console.log(response);
                           var len = response.length;
                           $('#city_name').html('<option value="">Select City</option>');
                           if(len > 0)
                         {
                            var select = "";
                            var exit_city = $('#extcity_name').val();
                            
                           for(var i = 0;i < len;i++)
                           {
                            if(exit_city == response[i].city_name)
                              {
                                select = "selected";
                              }else{ select =''; }
                              $('#city_name').append('<option value="'+ response[i].city_name +'" '+select+'>'+ response[i].city_name +'</option>');                         
                            }  
                         } 
                              
                        },

                       headers: 
                       {
                            "Authorization": "Bearer "+ auth_token,
                            "Accept": "application/json"
                        }
                    });

                }
             

            });
        </script> -->
        <!-- ---------------Client Form------------------------------ -->
       <!--  <script type="text/javascript">
          $(document).ready(function()
            {
              $('#cust_country').change(function()
                {
                     var country_name = $('#cust_country').val();

                  if(country_name)
                {
                  $.ajax({                       
                      type: "post",          
                      url: "{{ url('check-State') }}",
                      dataType: "json",
                      data: {"_token": "{{ csrf_token() }}",
                      "country_name": country_name},
                      success : function(response)
                      {
                        //console.log(response);
                        var len = response['data'].length;
                        //console.log(len);                  

                        $('#cust_state option').remove(); 
                        $('#cust_state').html('<option value="">Select State</option>');                  
                          if(len > 0)
                          {
                              var select = "";
                              var exit_state = $('#extstate_name').val();

                            for(var i = 0;i < len;i++)
                            {
                              if(exit_state == response['data'][i].state_name)
                              {
                                select = "selected";
                              }else{ select =''; }

                              $('#cust_state').append('<option value="'+ response['data'][i].state_name +'"'+select+'>'+ response['data'][i].state_name +'</option>');
                            }

                            $('#cust_state').change();  
                          }
                      }
                    });
                }
                else
                {
                  //< ?php Toastr::error("Please Select Country"); ? >
                  alert("Please Select Country");
                } 
                }).change();

              // -----------------------

              $('#cust_state').change(function()
                {
                     var country_name = $('#cust_country').val();
                     var state_name = $('#cust_state').val();

                  if(state_name)
                {
                  $.ajax({                       
                      type: "post",          
                      url: "{{ url('check-State-City') }}",
                      dataType: "json",
                      data: {"_token": "{{ csrf_token() }}",
                      "country_name": country_name,
                      "state_name":state_name},
                      success : function(response)
                      {
                        //console.log(response);
                        var len = response['data'].length;
                        //console.log(len);                  

                        $('#city_location option').remove(); 
                        $('#city_location').html('<option value="">Select City</option>');                  
                          if(len > 0)
                          {
                              var select = "";
                              var exit_city = $('#extcity_name').val();

                            for(var i = 0;i < len;i++)
                            {
                              if(exit_city == response['data'][i].city_name)
                              {
                                select = "selected";
                              }else{ select =''; }

                              $('#city_location').append('<option value="'+ response['data'][i].city_name +'"'+select+'>'+ response['data'][i].city_name +'</option>');
                            }  
                          }
                      }
                    });
                }
                else
                {
                  //< ?php Toastr::error("Please Select State"); ? >
                  alert("Please Select State");
                } 
                });

              // --------------------------------------


              $('#assign_emp').change(function()
                {
                     var emp_name = $('#assign_emp').val();
                    // alert(emp_name);

                  if(emp_name)
                {
                  $.ajax({                       
                      type: "post",          
                      url: "{{ url('check-Employee') }}",
                      dataType: "json",
                      data: {"_token": "{{ csrf_token() }}",                      
                      "emp_name":emp_name},
                      success : function(response)
                      {
                        //console.log(response);
                        //console.log(response['data'].dept_name);
                        //var len = response['data'].length;
                        if(response)
                        {
                            $('#emp_deptname').val(response['data'].dept_name);
                            var head_id = response['data'].emp_id;

                              $.ajax({                       
                                  type: "post",          
                                  url: "{{ url('/Get-Department-Head') }}",
                                  dataType: "json",
                                  data: {"_token": "{{ csrf_token() }}",                      
                                  "head_id":head_id},
                                  success : function(response)
                                  {
                                    //console.log(response);
                                    //console.log(response['data'].dept_name);

                                    $('#dept_headname').val(response['data'].name);
             
                                  }
                                });
                        }
                      }
                    });
                }
                // else
                // {
                //   alert("Please Select Employee");
                // } 
                }).change();

            });
        </script> -->

        <!-- <script>
          $(document).ready(function()
            {

              $('.btn_preview').click(function()
                {
                    //alert($(this).attr('datalist'));

                     var client_id = $(this).attr('datalist');

                              $.ajax({                       
                                  type: "post",          
                                  url: "{{ url('/Get-Client-Info') }}",
                                  dataType: "json",
                                  data: {"_token": "{{ csrf_token() }}",                      
                                  "client_id":client_id},
                                  success : function(response)
                                  {
                                    //console.log(response);
                                     
                                     if(response)
                                     {
                                        let visit_status = "Active";
                                        let mail_status = "Active";
                                        let ch_remarks = "Checked";

                                      $('#client_name').text(response['data'].client_name);
                                      $('#industry').text(response['data'].industry_name);
                                      $('#Country').text(response['data'].country);
                                      $('#State').text(response['data'].state);
                                      $('#City').text(response['data'].location);
                                      $('#Sub_Location').text(response['data'].sub_location);
                                      $('#Contact_Person').text(response['data'].contact_person);
                                      $('#contact_no').text(response['data'].contact_no);
                                      $('#Person_Email').text(response['data'].person_email);
                                      $('#Designation').text(response['data'].relationtobusiness);
                                      $('#Remark').val(response['data'].tele_discussion);
                                      if(response['data'].visit_status == 0)
                                      {
                                        visit_status = "De-Active";
                                      }
                                      $('#Visit_Status').text(visit_status);
                                      if(response['data'].mail_status == 0)
                                      {
                                        mail_status = "De-Active";
                                      }
                                      $('#Mail_Status').text(mail_status);
                                      $('#assign_emp').text(response['data'].name);
                                      $('#emp_code').text(response['data'].emp_code);
                                      $('#dept_name').text(response['data'].dept_name);
                                        if(response['data'].ch_remarks == 0)
                                        {
                                          ch_remarks = "Un-Checked";
                                        }
                                      $('#Remember').text(ch_remarks);
                                      $('#add_date').text(response['data'].Add_datetime);
                                      // ------------------------
                                       $.ajax({                       
                                              type: "post",          
                                              url: "{{url('/Get-Client-Assignnext-Emp')}}",
                                              dataType: "json",
                                              data: {"_token": "{{ csrf_token() }}",                      
                                              "client_id":client_id},
                                              success : function(response)
                                              {
                                                console.log(response);

                                                var len = response['data'].length;
                                                //console.log(len); 
                                                $('#next_proccess div').remove();

                                                if(len > 0)
                                                { 

                                                  for(var i = 0;i < len;i++)
                                                  {
                                                     
                                                    if(i == 0)
                                                    {
                                                       $('#next_proccess').html('<div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">'+ response['data'][i].dept_name +'</label><label id="add_date" class="form-control">'+ response['data'][i].name +'</label></div></div>');
                                                    }
                                                    else
                                                    {
                                                       $('#next_proccess').append('<option value="'+ response['data'][i].city_name +'"'+select+'>'+ response['data'][i].city_name +'</option>');
                                                     }                                                  
                                                  }  
                                                } 
                                              } 

                                            });
                                     }
             
                                  }
                                });

                });
            });
        </script> -->


        <!-- -------------------- -->
<!-- 
        <script>
          $(document).ready(function()
            {
              $('#btn_submit').hide();
               $('#getFile').change(function(){
                  // alert($(this).val());

                  if($(this).val())
                  {
                    $('#btn_submit').show();
                  }
                  else
                  {
                    $('#btn_submit').hide();
                  }

               });
            }); 
        </script> -->
        <!-- <script>
          $(document).ready(function()
          {
              $('#submit').click(function()
                {
                    if($('#up_image').val() || $('#up_video').val())
                    {
                      return true;
                    }
                    else
                    {
                      alert("Please Upload Image / Video");
                      return false;
                    }
                });
          });
        </script> -->

        <!-- ------------------------------------------------ -->
       <!--  <script>
          $(document).ready(function()
            {
               $('#message_boxEmp').click(function() 
               {
                //alert("Hello");
                if($('#emp_message').val())
                {
                    $.ajax({
                        url: "{{url('/')}}",
                        type: 'post',
                        dataType: 'json',
                        data: $('#Emp_message').serialize(),
                        success: function(data) 
                        {
                                   // ... do something with the data...
                                 

                        }
                    });
                  }
                  else
                  {
                    $('#emp_message').attr('border','red');
                  }
                });
            });
        </script> -->
<!-- -----------Customer List---------------------------------- -->
       <!--  <script>
          $(document).ready(function()
            {
                // $('#opration').multiselect({
                //   columns: 1,
                //   placeholder: 'Select Opration'
                // });
                $('.assign_emp').click(function()
                  {
                      //alert($(this).attr('datalist'));
                      $('#assign_client_id').val($(this).attr('datalist'));
                  });

                $('#dept_nameget_emp').change(function()
                  {
                      if($('#dept_nameget_emp').val())
                      {
                        $.ajax({
                          url: "{{url('/Dept-Get-employee')}}",
                          type: 'post',
                          dataType: 'json',                           
                          data: {"_token": "{{ csrf_token() }}",                      
                          "dept_id":$('#dept_nameget_emp').val()},
                          success: function(response) 
                          {
                              console.log(response);    // ... do something with the data...
                              var len = response['data'].length;
                              //console.log(len);                  

                              $('#emp_list option').remove(); 
                              $('#emp_list').html('<option value="">Select Employee</option>');

                              if(len > 0)
                              {
                                  var select = "";
                                  //var exit_city = $('#extcity_name').val();

                                for(var i = 0;i < len;i++)
                                {
                                  // if(exit_city == response['data'][i].city_name)
                                  // {
                                  //   select = "selected";
                                  // }else{ select =''; }

                                  $('#emp_list').append('<option value="'+ response['data'][i].id +'"'+select+'>'+ response['data'][i].name +'</option>');
                                }  
                              }                         
                                   
                          }
                      });
                    }
                  });
            });
        </script> -->


    </body>
</html>
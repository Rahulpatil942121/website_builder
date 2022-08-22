<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;  
use App\Models\User;
use App\Models\Temptype;
use App\Models\Templatetb;
use App\Models\Temp_contain;
use App\Models\Usertemplatecontain;
use App\Models\Aboutus_tepmlate;
use App\Models\Domaincreation;
use App\Models\Contactus_template;
use App\Models\Gallerycontain;
use App\Models\Socialmedia;
use Auth;
use DB;

class Clientcontroller extends Controller
{
    //

    public function index(Request $req)
    {
    	//dd($req);
    	 $validated = $req->validate([
            'login_id' => 'required|email',
            'password' => 'required',
        ]);
        $password = Hash::make($req->password);
       // dd($password);
        // $result1 = User::get();
        $userdata = array(
            'email'     => $req->login_id,
            'password'  => $req->password
        );         
        if(Auth::attempt($userdata))
        {
             // dd(Auth::User()->name);
            // dd(Auth::User()->role);
            // $req->session()->put('Admin_Login',true);
            // $req->session()->put('Admin_Id',Auth::User()->id);
            if(Auth::User()->status == 0 || Auth::User()->role != 2)
            {
            	 //dd(Auth::User()->name);
                //$req->session()->flash('alert-danger', 'Login ID Not Active!!');
                Toastr::error("Login ID Not Active!!");
                return redirect('/logout');
            }            

            //$data['flag'] = 1;

            Toastr::success("Hello ". Auth::User()->name);

            return redirect('/Home');            
        }
        else 
        {
            $req->session()->flash('alert-danger', 'Login ID Not Existing!!');
           // dd("Not Exsting");
           return back()->withInput();
        }
    }
    
     // -------------------------------------------

    public function Submit_Register(Request $req)
    {
       // dd($req);

         $this->validate($req,[
            'name'=>'required',                   
            'email'=>'required|email|unique:users',             
            'password'=>'required|min:8',
            'confirm_password'=>'required|min:8|same:password',             
         ]);
         
            $data = new User;
            $data->name=$req->name;
            $data->email=$req->email;  
            $data->password= Hash::make(12345678);             
            $result = $data->save();

        if($result)
        {
            Toastr::success("Account Created Successfully!!!"); 
            return redirect('/');
        } 
        else
        {
            Toastr::error("Email Id Already Exist!!!");
            return back()->withInput();
        }   
    }


    // ----------------------------------------------

    public function Homepage()
    {
    	//dd('hi');
        $data['flag'] = 1;
        $data['inline'] = 0;
        $data['Temptype'] = Temptype::where('status',1)->get();
        $data['client_template'] = Domaincreation::where('creater_id',Auth::User()->id)->get();        
        return view('/Frontend/Webviews/Manageviews',$data);
    }
    // public function Template_List()
    // {
    //     $data['flag'] = 2;
    //     $data['inline'] = 1;
    //     $data['title'] = "Template List";         
    //     return view('/Frontend/Webviews/Manageviews',$data); 
    // }
    // ==========================================
    
       public function Check_Template()
    {
         $data['flag'] = 2;
        $data['inline'] = 0;
        $data['title'] = "Templates";
        // if($req->temp_type == 0)
        // {
            // $data['Templatetb'] = Templatetb::where(['status'=>1])->orderBy('temp_type','asc')->orderBy('id', 'DESC')->get();
        $data['Templatetb'] = Templatetb::where(['status'=>1])->orderBy('temp_type','asc')->orderBy('id', 'DESC')->paginate(1);
        // }

        // else
        // {
        //     $data['Templatetb'] = Templatetb::where(['status'=>1,'temp_type'=>$req->temp_type])->orderBy('temp_type','asc')->get();  
        // }   
        // $data['client_template'] = Domaincreation::where('creater_id',Auth::User()->id)->orderBy('id', 'DESC')->get();
       // dd($data['client_template']);
        return view('/Frontend/Webviews/Manageviews',$data);
    }

    // ------------------------------------

    public function My_Template()
    {
        $data['flag'] = 4;
        $data['inline'] = 0;
        $data['title'] = "My Templates";
        $data['client_template'] = Domaincreation::where('creater_id',Auth::User()->id)->orderBy('id', 'DESC')->paginate(5);
        return view('/Frontend/Webviews/Manageviews',$data);
    }
    
    
    // ======================================

    //  public function Check_Template(Request $req)
    //  {
    //     //dd($req);

    //         $this->validate($req,[                 
    //             'temp_type'=>'required|numeric',                          
    //          ]);             

    //     $data['flag'] = 2;
    //     $data['inline'] = 0;
    //     $data['title'] = "Templates";
    //     if($req->temp_type == 0)
    //     {
    //         $data['Templatetb'] = Templatetb::where(['status'=>1])->orderBy('temp_type','asc')->get();
    //     }
    //     else
    //     {
    //         $data['Templatetb'] = Templatetb::where(['status'=>1,'temp_type'=>$req->temp_type])->orderBy('temp_type','asc')->get();  
    //     }                
    //     return view('/Frontend/Webviews/Manageviews',$data);
    //  }
    // ======================================

    public function Submit_Business_Name(Request $req)
    {
        //dd($req);


          $this->validate($req,[
                'template_id'=>'required',
                'business_name'=>'required',
                'business_logo'=>'required|image|mimes:png,jpg,jpeg',                          
             ]);  
          //|dimensions:min_width=1280,min_height=500,max_width=1280,max_height=500

            $domain_id = $this->checktemplate_InClient($req->template_id);
            //dd($domain_id);
            // dd($req->file('gallery_img'));
             if($req->has('business_logo'))
             {
                 
                $file = $req->file('business_logo');
               //dd($file);
                $filename = 'logo_img'.time().'.'.$file->extension();
                $destinationPath = public_path('/images/Logo');       
                // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                $ap_image = url('/public/images/Logo/'.$filename);
                $image = 'images/Logo/'.$filename;
                

                
                $data = new Gallerycontain;
                $data->domain_id=$domain_id;
                $data->temp_id=$req->template_id;
                $data->creater_id=Auth::User()->id;
                $data->section_id=7;
                $data->title=$req->business_name;                     
                $data->apimage=$ap_image;
                $data->image=$image;
                $result = $data->save();

                if($result)
                {
                     $file->move($destinationPath, $filename);                     
                } 
                $data = new Usertemplatecontain;
                $data->domain_id=$domain_id;
                $data->temp_id=$req->template_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =7;
                $data->save();
                Toastr::success("Logo Inserted Successfully!!!");  
                // ======================================================    

                return redirect("/Template-Data/$req->template_id/$domain_id");
             }
             else
             {
               Toastr::error("Logo Image Required!!!");
             }
             
             return back();

    }
    // =======================================

    public function Add_NewTemplate_Data($template_id)
    {
        if(DB::table('templatetbs')->where(['id'=>$template_id,'status'=>1])->exists())
        {
            $data['flag'] = 6;
            $data['inline'] = 0; 
            $data['title'] = "Templates Data";
            $data['template_id'] = $template_id;
            $data['Contain'] = Temp_contain::where('temp_id',$template_id)->get();            

             // $data['client_template'] = Domaincreation::where(['temp_id'=>$template_id,'creater_id'=>Auth::User()->id])->first();

            return view('/Frontend/Webviews/Manageviews',$data);            
        }
        else
        {
            Toastr::error("Template Not Exsting!!");
            return redirect('/Home');
        }
    }
// -------------------------------------
     public function Add_Template_Data($template_id,$domain_id)
     {
        //dd("Hi");
        if(DB::table('templatetbs')->where(['id'=>$template_id,'status'=>1])->exists())
        {
            $data['flag'] = 3;
            $data['inline'] = 0; 
            $data['title'] = "Templates Data";
            $data['template_id'] = $template_id;
            $data['domain'] = $domain_id;
            $data['Contain'] = Temp_contain::where('temp_id',$template_id)->get();
            // $data['Aboutus_exist'] = Aboutus_tepmlate::where(['temp_id'=>$template_id,'creater_id'=> Auth::User()->id])->first();
            // $data['Contact_exist'] = Contactus_template::where(['temp_id'=>$template_id,'creater_id'=> Auth::User()->id])->first();
            // $data['Social_Media'] = Socialmedia::where(['temp_id'=>$template_id,'creater_id'=> Auth::User()->id])->first();

             $data['client_template'] = Domaincreation::where(['id'=>$domain_id,'temp_id'=>$template_id,'creater_id'=>Auth::User()->id])->first();

            return view('/Frontend/Webviews/Manageviews',$data);            
        }
        else
        {
            Toastr::error("Template Not Exsting!!");
            return redirect('/Home');
        }
     }

     // -------------------------------------
      public function My_Website_Info($temp_id,$domain_id)
     {
        $data['flag'] = 5;
        $data['inline'] = 0;
        $data['title'] = "My Website Info";
        $data['template_id'] = $temp_id;
        $data['Aboutus_exist'] = Aboutus_tepmlate::where(['domain_id'=>$domain_id,'temp_id'=>$temp_id,'creater_id'=> Auth::User()->id])->first();
        $data['Contact_exist'] = Contactus_template::where(['domain_id'=>$domain_id,'temp_id'=>$temp_id,'creater_id'=> Auth::User()->id])->first();
        $data['Social_Media'] = Socialmedia::where(['domain_id'=>$domain_id,'temp_id'=>$temp_id,'creater_id'=> Auth::User()->id])->first();
        $data['Gallerycontain'] = Gallerycontain::where(['domain_id'=>$domain_id])->groupBy('section_id')->get();
        //dd($data['Gallerycontain']);
        return view('/Frontend/Webviews/Manageviews',$data);
     }


     // --------------------------------------

     public function Submit_Aboutus_Data(Request $req)
     {
        //dd($req);

        $this->validate($req,[
                'temp_id'=>'required',
                'about_heading'=>'required', 
                'aboutus_description'=>'required',
                'aboutus_img'=>'nullable|image|mimes:png,jpg,jpeg',                          
             ]);

         $image = "";
         $ap_image = "";

         $this->checktemplate_InClient($req->temp_id);
        // dd("Hi");
         if($req->has('aboutus_img'))
         {
             $file = $req->file('aboutus_img');
           // dd($file);
            $filename = 'aboutus'.time().'.'.$file->extension();
            $destinationPath = public_path('/images/Aboutus');       
            $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Aboutus/'.$filename;
            $image = 'images/Aboutus/'.$filename;

         } 


            $data = new Usertemplatecontain;
            $data->temp_id=$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->conatin_id =3;
            $data->save();

            $data = new Aboutus_tepmlate;
            $data->temp_id =$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->heading=$req->about_heading;
            $data->about_description=$req->aboutus_description;                 
            $data->apimage=$ap_image; 
            $data->image=$image;                           
            $result = $data->save();

            if($req->has('aboutus_img'))
           {
              $file->move($destinationPath, $filename);
           } 
        if($result)
        {           
            Toastr::success("Aboutus Data Inserted Successfully!!!"); 
        }
        else
        {
            Toastr::error("Aboutus Data Not Inserted!!!");
        }

        return back(); 
     }

     // --------------------------------------------

     public function checktemplate_InClient($temp_id)
     {
       // dd($temp_id);


       // if(DB::table('domaincreations')->where(['temp_id'=>$temp_id,'creater_id'=>Auth::User()->id])->doesntExist())
       //  {
               start:

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $doimain = substr(str_shuffle($chars),0,20);
            //$doimain = random_strings(15);
            //dd($doimain);
             if(DB::table('domaincreations')->where(['domain_name'=>$doimain])->exists())
            {
                goto start;
            }    

            $datatb = new Domaincreation;
            $datatb->domain_name=$doimain; 
            $datatb->temp_id=$temp_id;                 
            $datatb->creater_id=Auth::User()->id;
            $datatb->role=Auth::User()->role;                 
            $datatb->status=0;                           
            $datatb->save();
            return $datatb->id;
        // }  

        
     }


     // ----------------------------------------

     public function Submit_Contact_Data(Request $req)
     {        

         $this->validate($req,[
                'temp_id'=>'required',
                'contact_email'=>'required|email', 
                'contact_phone'=>'required|digits:10|numeric',
                'contact_otherfields'=>'nullable',
                'contact_address'=>'required',
                'contact_address_map'=>'nullable',                          
             ]);

            $this->checktemplate_InClient($req->temp_id);

            $data = new Usertemplatecontain;
            $data->temp_id=$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->conatin_id =4;
            $data->save();

            $data = new Contactus_template;
            $data->temp_id =$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->contact_email=$req->contact_email;
            $data->contact_phone=$req->contact_phone;                 
            $data->contact_otherfields=$req->contact_otherfields; 
            $data->contact_address=$req->contact_address;
            $data->address_map=$req->contact_address_map;                           
            $result = $data->save();

        if($result)
        {             
            Toastr::success("Contact Us Inserted Successfully!!!"); 
        }
        else
        {
            Toastr::error("Contact Us Not Inserted!!!");
        }

        return back(); 


        //dd($req);
     }
     
    //  ======================================================
     
     public function Submit_Client_ImageGallery(Request $req)
     {
        //dd($req);
        
         $this->validate($req,[
                'temp_id'=>'required',
                'image_title'=>'nullable', 
                'image_description'=>'nullable',
                //'gallery_img'=>'required|image|mimes:png,jpg,jpeg',                                         
             ]);


            $image = "";
            $ap_image = "";$i = 0;

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('gallery_img'))
             {
                foreach ($req->file('gallery_img') as $value) 
                {
                    $file = $value;
                   //dd($file);
                    $filename = 'gallery_img'.time().$i.'.'.$file->extension();
                    $destinationPath = public_path('/images/Gallery');       
                    // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                    $ap_image = url('/public/images/Gallery/'.$filename);
                    $image = 'images/Gallery/'.$filename;
                    

                    
                    $data = new Gallerycontain;
                    $data->temp_id=$req->temp_id;
                    $data->creater_id=Auth::User()->id;
                    $data->section_id=1;
                    $data->title=$req->image_title[$i];
                    $data->description=$req->image_description[$i];
                    $data->apimage=$ap_image;
                    $data->image=$image;
                    $result = $data->save();

                    if($result)
                    {
                         $file->move($destinationPath, $filename);                     
                    }

                    $i++;
                   
                } 

                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =1;
                $data->save();


                Toastr::success("Gallery Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Gallery Image Required!!!");
             }

        return back(); 

     }

     public function Submit_Client_Banner(Request $req)
     {
       // dd($req);

        $this->validate($req,[
                'temp_id'=>'required',
                'banner_title'=>'nullable', 
                'banner_description'=>'nullable',
                //'gallery_img'=>'required|image|mimes:png,jpg,jpeg',                                         
             ]);


         $image = "";
            $ap_image = "";$i = 0;

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('banner_img'))
             {
                foreach ($req->file('banner_img') as $value) 
                {
                    $file = $value;
                   //dd($file);
                    $filename = 'banner_img'.time().$i.'.'.$file->extension();
                    $destinationPath = public_path('/images/Banner');       
                    // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                    $ap_image = url('/public/images/Banner/'.$filename);
                    $image = 'images/Banner/'.$filename;
                    

                    
                    $data = new Gallerycontain;
                    $data->temp_id=$req->temp_id;
                    $data->creater_id=Auth::User()->id;
                    $data->section_id=2;
                    $data->title=$req->banner_title[$i];
                    $data->description=$req->banner_description[$i];
                    $data->apimage=$ap_image;
                    $data->image=$image;
                    $result = $data->save();

                    if($result)
                    {
                         $file->move($destinationPath, $filename);                     
                    }

                    $i++;
                   
                } 

                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =2;
                $data->save();


                Toastr::success("Banner Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Banner Image Required!!!");
             }

        return back(); 
     }
     
     // ------------------------------------------------

     public function Submit_Client_Services(Request $req)
     {      

         $this->validate($req,[
                'temp_id'=>'required',
                'services_title.*'=>'required', 
                'services_description.*'=>'nullable',
                'services_img.*'=>'required|image|mimes:png,jpg,jpeg',                                         
             ]);

         //dd($req);
         $image = "";
            $ap_image = "";$i = 0;

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('services_img'))
             {
                foreach ($req->file('services_img') as $value) 
                {
                    $file = $value;
                   //dd($file);
                    $filename = 'services_img'.time().$i.'.'.$file->extension();
                    $destinationPath = public_path('/images/Services');       
                    // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                    $ap_image = url('/public/images/Services/'.$filename);
                    $image = 'images/Services/'.$filename;
                    

                    
                    $data = new Gallerycontain;
                    $data->temp_id=$req->temp_id;
                    $data->creater_id=Auth::User()->id;
                    $data->section_id=5;
                    $data->title=$req->services_title[$i];
                    $data->description=$req->services_description[$i];
                    $data->apimage=$ap_image;
                    $data->image=$image;
                    $result = $data->save();

                    if($result)
                    {
                         $file->move($destinationPath, $filename);                     
                    }
                    $i++;
                   
                } 

                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =5;
                $data->save();


                Toastr::success("Our Services Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Our Services Image Required!!!");
             }

        return back(); 

     }
     
     // --------------------------------


     public function Submit_Client_BGImage(Request $req)
     {
        //dd($req);
        $this->validate($req,[
                'temp_id'=>'required',
                'Section_title'=>'required', 
                'section_description'=>'required',
                'bg_image'=>'required|image|mimes:png,jpg,jpeg',    
                // |dimensions:min_width=1280,min_height=500,max_width=1280,max_height=500
             ]);


            $image = "";
            $ap_image = "";$i = 0;

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('bg_image'))
             {
                 
                    $file =$req->file('bg_image');
                   //dd($file);
                    $filename = 'aboutbg_img'.time().$i.'.'.$file->extension();
                    $destinationPath = public_path('/images/Aboutus');       
                    // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                    $ap_image = url('/public/images/Aboutus/'.$filename);
                    $image = 'images/Aboutus/'.$filename;
                    

                    
                    $data = new Gallerycontain;
                    $data->temp_id=$req->temp_id;
                    $data->creater_id=Auth::User()->id;
                    $data->section_id=8;
                    $data->title=$req->Section_title;
                    $data->description=$req->section_description;
                    $data->apimage=$ap_image;
                    $data->image=$image;
                    $result = $data->save();

                    if($result)
                    {
                         $file->move($destinationPath, $filename);                     
                    }
                    $i++;                   
                

                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =8;
                $data->save();

                Toastr::success("Section Info. Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Section Image Required!!!");
             }

        return back(); 

     }
     
    //  ---------------------------------------------
    
     public function Submit_Client_Iconic(Request $req)
     {
        //dd($req);

         $this->validate($req,[
                'temp_id'=>'required',
                'iconic_title.*'=>'required', 
                'iconic_description.*'=>'nullable',
                'iconic_img.*'=>'required|image|mimes:png,jpg,jpeg',                                         
             ]);


         $image = "";
            $ap_image = "";$i = 0;

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('iconic_img'))
             {
                foreach ($req->file('iconic_img') as $value) 
                {
                    $file = $value;
                   //dd($file);
                    $filename = 'iconic_img'.time().$i.'.'.$file->extension();
                    $destinationPath = public_path('/images/Gallery');       
                    // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                    $ap_image = url('/public/images/Gallery/'.$filename);
                    $image = 'images/Gallery/'.$filename;
                    

                    
                    $data = new Gallerycontain;
                    $data->temp_id=$req->temp_id;
                    $data->creater_id=Auth::User()->id;
                    $data->section_id=9;
                    $data->title=$req->iconic_title[$i];
                    $data->description=$req->iconic_description[$i];
                    $data->apimage=$ap_image;
                    $data->image=$image;
                    $result = $data->save();

                    if($result)
                    {
                         $file->move($destinationPath, $filename);                     
                    }

                    $i++;
                   
                } 

                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =9;
                $data->save();


                Toastr::success("Gallery Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Gallery Image Required!!!");
             }

        return back(); 

     }
     
    //  ==========================================================
     public function Submit_Client_Testimonial(Request $req)
     {
        //dd($req);

         $this->validate($req,[
                'temp_id'=>'required',
                'Testimonial_title.*'=>'required', 
                'Testimonial_description.*'=>'required',
                'Testimonial_img.*'=>'nullable|image|mimes:png,jpg,jpeg',                          
             ]);         
         
         $image = "";
         $ap_image = "";$i = 0;
         //dd($req->file('Testimonial_img')[$i]);

         $this->checktemplate_InClient($req->temp_id);
         //dd("Hi");

         foreach ($req->Testimonial_title as $value) 
        {
             if(!empty($req->file('Testimonial_img')[$i]))
             {
                 $file = $req->file('Testimonial_img')[$i];
               // dd($file);
                $filename = 'testimonial'.time().$i.'.'.$file->extension();
                $destinationPath = public_path('/images/Testimonial');       
                $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Testimonial/'.$filename;
                $image = 'images/Testimonial/'.$filename;

             }            

            $data = new Gallerycontain;
            $data->temp_id=$req->temp_id;
            $data->creater_id=Auth::User()->id;
            $data->section_id=10;
            $data->title=$value;
            $data->description=$req->Testimonial_description[$i];
            $data->apimage=$ap_image;
            $data->image=$image;
            $result = $data->save();

            if(!empty($req->file('Testimonial_img')[$i]))
           {
              $file->move($destinationPath, $filename);
           } 

           $i++;
        }   

           $data = new Usertemplatecontain;
            $data->temp_id=$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->conatin_id =10;
            $result = $data->save();

        if($result)
        {           
            Toastr::success("Testimonial Data Inserted Successfully!!!"); 
        }
        else
        {
            Toastr::error("Testimonial Data Not Inserted!!!");
        }

        return back(); 

     }
    //  =========================================
      

     public function Submit_Client_Logo(Request $req)
     {
        //dd($req);

          $this->validate($req,[
                'temp_id'=>'required',
                'logo_title'=>'required',
                'Logo_img'=>'required|image|mimes:png,jpg,jpeg',                          
             ]);  
          //|dimensions:min_width=1280,min_height=500,max_width=1280,max_height=500

            $this->checktemplate_InClient($req->temp_id);
            // dd($req->file('gallery_img'));
             if($req->has('Logo_img'))
             {
                 
                $file = $req->file('Logo_img');
               //dd($file);
                $filename = 'logo_img'.time().'.'.$file->extension();
                $destinationPath = public_path('/images/Logo');       
                // $ap_image = $_SERVER['SERVER_NAME'].'/public/images/Gallery/'.$filename;
                $ap_image = url('/public/images/Logo/'.$filename);
                $image = 'images/Logo/'.$filename;
                

                
                $data = new Gallerycontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id=Auth::User()->id;
                $data->section_id=7;
                $data->title=$req->logo_title;                     
                $data->apimage=$ap_image;
                $data->image=$image;
                $result = $data->save();

                if($result)
                {
                     $file->move($destinationPath, $filename);                     
                } 
                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =7;
                $data->save();


                Toastr::success("Logo Inserted Successfully!!!");          

             }
             else
             {
               Toastr::error("Logo Image Required!!!");
             }
             
             return back();
     }
     
     // =======================================

     
     public function Submit_Client_SocialMedia(Request $req)
     {
        //dd($req);

          $this->validate($req,[
                'temp_id'=>'required',
                'facebook'=>'nullable|url',
                'instagram'=>'nullable|url',
                'twitter'=>'nullable|url',
                'youtube'=>'nullable|url',
                'linkedin'=>'nullable|url',                                          
             ]); 

           $this->checktemplate_InClient($req->temp_id);

            $data = new Socialmedia;
            $data->temp_id=$req->temp_id;
            $data->creater_id=Auth::User()->id;
            $data->section_id=11;
            $data->facebook=$req->facebook;                     
            $data->instagram=$req->instagram;
            $data->twitter=$req->twitter;
            $data->youtube=$req->youtube;
            $data->linkedin=$req->linkedin;            
            $result = $data->save(); 
            if($result)
            {
                $data = new Usertemplatecontain;
                $data->temp_id=$req->temp_id;
                $data->creater_id =Auth::User()->id;
                $data->conatin_id =11;
                $data->save();  

                Toastr::success("Social Media Inserted Successfully!!!");
            }
            else
            {
                Toastr::error("Social Media Not Inserted!!!");
            } 
        return back();
          
     }

      public function Submit_Client_Longtext(Request $req)
     {
        //dd($req);

        $this->validate($req,[
                'temp_id'=>'required',
                'description'=>'required',
             ]);

            $this->checktemplate_InClient($req->temp_id);

            $data = new Usertemplatecontain;
            $data->temp_id=$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->conatin_id =4;
            $data->save();

            $data = new Contactus_template;
            $data->temp_id =$req->temp_id;
            $data->creater_id =Auth::User()->id;
            $data->contact_email=$req->contact_email;
            $data->contact_phone=$req->contact_phone;                 
            $data->contact_otherfields=$req->contact_otherfields; 
            $data->contact_address=$req->contact_address;
            $data->address_map=$req->contact_address_map;                           
            $result = $data->save();

        if($result)
        {             
            Toastr::success("Contact Us Inserted Successfully!!!"); 
        }
        else
        {
            Toastr::error("Contact Us Not Inserted!!!");
        }

        return back(); 


     }

     public function My_Profile()
     {
        $data['flag'] = 6;
        $data['inline'] = 0;
        $data['title'] = "Profile";
        $data['user'] = User::where('id',Auth::User()->id)->first();
        $data['my_template'] = Domaincreation::where('creater_id',Auth::User()->id)->count();
        $data['my_template_info'] = Domaincreation::where('creater_id',Auth::User()->id)->get();        
        return view('/Frontend/Webviews/Manageviews',$data);
     }

     public function Submit_Email(Request $req)
     {
        if(!Auth::user())
        {
            $this->validate($req,[                            
                'email'=>'required|email|exists:users',  
             ]);

            //echo "Exist"; 

            start : 
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $hash_code = substr(str_shuffle($permitted_chars), 0, 12);
            //dd($hash_code);

            $check = User::where('forgot_pass_No',$hash_code)->first(); 
            if ($check) 
            {
                goto start;
            }      
            $user_db = User::where('email',$req->email)->where('role',2)->first(); 
            if($user_db)
            {
                $result = DB::table('users')->where('email', $req->email)->where('role',2)->update([
                    'forgot_pass_No' => $hash_code, 
                    'forgot_pass'=> DB::raw('forgot_pass+1'), 
                ]);

                if($result)
                {
                    $page_url =  url('/Verify-Email');
                // dd($page_url);
                    $to = "rahulpatil942121@gmail.com";
                    $subject = "Batteriez24.com";
    
                    $message = "<b>Your Account verification Email .</b>";
                    $message .= "Please verify your Email Id for Change Password click on this link <h5>$page_url/$hash_code</h5>";
                    
                   // dd($message);
                    $header = "From:mymail16@1618033.in \r\n";
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n"; 
    
                    $retval = mail ($to,$subject,$message,$header);

                    toastr()->success('Send Password Reset Link on Your Mail Id');
                }
                else
                {
                    toastr()->error('Not Send Password Reset Link on Your Mail Id');
                     
                }
            }
            else
            {
                toastr()->error('Email Address Not Existing');                
            }
        }
        
        return back();
         
     }

     public function verify_email($key_id)
     {
        if(!Auth::user())
        {
            //dd($key_id);
            $check_user = User::where('forgot_pass_No',$key_id)->where('role',2)->first();
            if($check_user)
            {                 
                $data['verify_key'] = $key_id;
                return view('Verify_email',$data);
            }
            else
            {
                toastr()->error('Your Account Verification Not Match');
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }
    }

    public function Submit_New_Password(Request $req)
    {
        //dd($req);
        $this->validate($req,[
                'verify_key' => 'required',                 
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:new_password',  
            ]);
            $check_user = User::where('forgot_pass_No',$req->verify_key)->where('role',2)->first();

            if($check_user)
            {
                $result = DB::table('users')->where('role',2)->where('forgot_pass_No',$req->verify_key)->update([
                    'forgot_pass_No' => "", 
                    'password' => Hash::make($req->new_password),
                    'forgot_pass'=>0,
                ]);
                if($result)
                {
                    toastr()->success('Password Updated successfully');
                    return redirect('/');
                }
                else
                {
                    toastr()->error('Your Account Password Not Updated');
                    return back();
                }

            }
            else
            {
                toastr()->error('Your Account Detail Not Match');
                 
            }
            return back();
    }

    // ===============================

    public function Change_Password()
    {
        $data['flag'] = 7;
        $data['inline'] = 0;
        $data['title'] = "Change Password";
        return view('/Frontend/Webviews/Manageviews',$data);
    }

    public function Submit_Password(Request $req)
    {
        //dd($req);

         $this->validate($req,[
                'old_password' => 'required',                 
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:new_password',  
            ]);

         if(Auth::attempt(array('email' => Auth::user()->email, 'password' => $req->old_password)))
            {
                $result = DB::table('users')->where('email', Auth::user()->email)->where('role',2)->update([                      
                    'password' => Hash::make($req->new_password),
                ]);
                if($result)
                {
                    
                    toastr()->success('Password Updated successfully');
                    return redirect('/logout');
                }
                else
                {
                    toastr()->error('Your Account Password Not Updated');                   
                }
            }
            else
            {
                toastr()->error('old Password Not Match');              
            }

            return back();
    }
}

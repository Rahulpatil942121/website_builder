<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;  
use App\Models\User;
use App\Models\Containlist;
use App\Models\Templatetb;
use App\Models\Temptype;
use App\Models\Temp_contain;
use App\Models\Domaincreation;
use App\Models\Aboutus_tepmlate;
use App\Models\Usertemplatecontain;
use App\Models\Contactus_template;
use Auth;
use DB;

class Admincontroller extends Controller
{
    //
     public function index(Request $req)
    {
       // dd($req);
        $validated = $req->validate([
            'userid' => 'required|email',
            'password' => 'required',
        ]);
        $password = Hash::make($req->password);
       // dd($password);
        // $result1 = User::get();
        $userdata = array(
            'email'     => $req->userid,
            'password'  => $req->password
        );         
        if(Auth::attempt($userdata))
        {
            // dd("Success");
            // dd(Auth::User()->role);
            // $req->session()->put('Admin_Login',true);
            // $req->session()->put('Admin_Id',Auth::User()->id);
            if(Auth::User()->status == 0 || Auth::User()->role != 1)
            {
                $req->session()->flash('alert-danger', 'Login ID Not Active!!');
                return redirect('/logout');
            }

            $data['flag'] = 1;

            Toastr::success("Hello ". Auth::User()->name);

            return redirect('/Dashboard');            
        }
        else 
        {
            $req->session()->flash('alert-danger', 'Login ID Not Existing!!');
           // dd("Not Exsting");
           return back()->withInput();
        }
    }

    public function Dashboard()
    {
    	$data['flag'] = 1;
    	$data['inline'] = 0;
        return view('/Admin/Webviews/Manageviews',$data);
    }    

    public function Contain_List()
    {
        $data['flag'] = 3;
        $data['inline'] = 1;
        $data['title'] = "Contain List";
        $data['Containlist'] = Containlist::all();
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Add_Contain()
    {
        $data['flag'] = 4;
        $data['inline'] = 1;
        $data['title'] = "Add Contain";
        $data['Contain'] = "";
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Submit_Contain(Request $req)
    {
        //dd($req);

         $this->validate($req,[
                'contain_name'=>'required', 
                'status'=>'required|numeric',                          
             ]);

         if($req->has('contain_id'))
         {
            if(DB::table('containlists')->where('id','!=',$req->contain_id)->where('contain_name',$req->contain_name)->doesntExist())
            {  

                 $result = Containlist::where('id',$req->contain_id)
                ->update([
                    'contain_name'=>$req->contain_name,
                    'status'=>$req->status,
                ]);             
                 
                 if($result)
                {
                   Toastr::success("Contain Updated Successfully!!!");                
                   return redirect('/Contain-List'); 
                }
                else
                {
                    Toastr::error("Contain Not Updated");
                    return back();
                }
            }
            else
            {
                Toastr::error("Contain Name Allready Exist!!");
                return back()->withInput();
            }
         }
         else
         {

            if(DB::table('containlists')->where('contain_name',$req->contain_name)->doesntExist())
            {                
                $data = new Containlist;
                $data->contain_name=$req->contain_name;                 
                $data->status=$req->status;                           
                $result = $data->save();

                 if($result)
                {
                   Toastr::success("Contain Saved Successfully!!!");                
                   return redirect('/Contain-List'); 
                }
                else
                {
                    Toastr::error("Contain Not Saved");
                    return back();
                }
            }
            else
            {
                Toastr::error("Contain Name Allready Exist!!");
                return back()->withInput();
            }
        }
    }

    public function Edit_Contain($contain_id)
    {
        //dd($contain_id);
        if($contain_id)
        {

            if(DB::table('containlists')->where('id', $contain_id)->exists())
            {
                $data['flag'] = 4;
                $data['inline'] = 1;
                $data['title'] = "Add Contain";
                $data['Contain'] = Containlist::where('id',$contain_id)->first();
                return view('/Admin/Webviews/Manageviews',$data);
            }
        }
        else
        {   
            Toastr::error("Contain Not Exist!!");
            return back();
        }
    }


    public function Delete_Contain($contain_id)
    {
        //dd($contain_id);

        if($contain_id)
        {

            if(DB::table('containlists')->where('id', $contain_id)->exists())
            {
                Toastr::error("Contain Not Deleted!!");
                return back();
            }
        }
        else
        {   
            Toastr::error("Contain Not Exist!!");
            return back();
        }
    }


    // ========================================================
    public function Template_List()
    {
        $data['flag'] = 2;
        $data['inline'] = 1;
        $data['title'] = "Template List";
       // $data['Template'] = Templatetb::all();
        $data['Template'] = Domaincreation::where('creater_id',1)->get();
        //dd($data['Template']);
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Add_Template()
    {
        $data['flag'] = 5;
        $data['inline'] = 1;
        $data['title'] = "Add Template";
        $data['Contain'] = Containlist::where('status',1)->get();
        $data['Temptype'] = Temptype::where('status',1)->get();
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Submit_Template(Request $req)
    {
       // dd($req);

        $this->validate($req,[
                'template_name'=>'required',
                'temp_folder_name'=>'required', 
                'temp_type'=>'required',
                //'temp_contain'=>'required',
                'status'=>'required|numeric',                          
             ]);
        if(!$req->has('template_id'))
        {
           // dd("Insert");

            if(DB::table('templatetbs')->where('temp_name',$req->template_name)->orWhere('folder_name',$req->temp_folder_name)->doesntExist())
                {                
                    $data = new Templatetb;
                    $data->temp_name=$req->template_name;                 
                    $data->folder_name=$req->temp_folder_name;
                    $data->temp_type=$req->temp_type;                 
                    $data->status=$req->status;                           
                    $data->save();

                    $datatb = new Domaincreation;
                    $datatb->domain_name=$req->template_name; 
                    $datatb->temp_id=$data->id;                 
                    $datatb->creater_id=Auth::User()->id;
                    $datatb->role=Auth::User()->role;                 
                    $datatb->status=$req->status;                           
                    $datatb->save();


                    if($req->has('temp_contain'))
                    {
                        foreach($req->temp_contain as $list)
                        {
                            $tbdata = new Temp_contain;
                            $tbdata->temp_id= $data->id;
                            $tbdata->conatin_id=$list;
                            $result = $tbdata->save();
                        }
                    }    

                     if($result)
                    {
                       Toastr::success("Template Saved Successfully!!!");                
                       return redirect('/Template-List'); 
                    }
                    else
                    {
                        Toastr::error("Template Not Saved");
                        return back()->withInput();;
                    }
                }
                else
                {
                    Toastr::error("Template Name Or Folder Name Allready Exist!!");
                    return back()->withInput();
                }

        }
        else
        {
           // dd("Update");
            if(DB::table('templatetbs')->where('id','!=',$req->template_id)->Where('folder_name',$req->temp_folder_name)->doesntExist())
            {
                     $result = Templatetb::where('id',$req->template_id)
                ->update([
                    // 'temp_name'=>$req->template_name,
                    'folder_name'=>$req->temp_folder_name,
                    'temp_type'=>$req->temp_type,
                    'status'=>$req->status,
                ]); 

                $result = Domaincreation::where('temp_id',$req->template_id)
                ->update([
                    // 'domain_name'=>$req->template_name,                     
                    'status'=>$req->status,
                ]);  

                 if($req->has('temp_contain'))
                {
                    DB::table('temp_contains')->where('temp_id',$req->template_id)->delete();
                    foreach($req->temp_contain as $list)
                    {

                        if(DB::table('temp_contains')->where('temp_id',$req->template_id)->where('conatin_id',$list)->doesntExist())
                        {

                            $tbdata = new Temp_contain;
                            $tbdata->temp_id= $req->template_id;
                            $tbdata->conatin_id=$list;
                            $result = $tbdata->save();
                        }
                    }    

                }

                Toastr::success("Template Updated Successfully!!!");                
                return redirect('/Template-List');
            }
            else
            {
                Toastr::error("Template Name Or Folder Name Allready Exist!!");
                return back();
            }

        }

    }

    // =======================================================

    public function Add_Template_Data($temp_id)
    {
        $data['flag'] = 8;
        $data['inline'] = 1;
        $data['title'] = "Add Template Data";
        $data['template_id'] = $temp_id;
        $data['Contain'] = Temp_contain::where('temp_id',$temp_id)->get();
         
        //dd($data['Add_Contain']);
        return view('/Admin/Webviews/Manageviews',$data);
    }

    // =============================================

    public function Template_Type()
    {
        $data['flag'] = 6;
        $data['inline'] = 1;
        $data['title'] = "Template Type";
        $data['Temptype'] = Temptype::all();
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Add_Template_Type()
    {
        $data['flag'] = 7;
        $data['inline'] = 1;
        $data['title'] = "Add Template Type";
        $data['Temptype'] = "";
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Submit_Temptype(Request $req)
    {
        //dd($req);

         $this->validate($req,[
                'temptype_name'=>'required', 
                'status'=>'required|numeric',                          
             ]);

         if($req->has('temptype_id'))
         {
            if(DB::table('temptypes')->where('id','!=',$req->temptype_id)->where('type_name',$req->temptype_name)->doesntExist())
            {  

                 $result = Temptype::where('id',$req->temptype_id)
                ->update([
                    'type_name'=>$req->temptype_name,
                    'status'=>$req->status,
                ]);             
                 
                 if($result)
                {
                   Toastr::success("Template Type Updated Successfully!!!");                
                   return redirect('/Template-Type'); 
                }
                else
                {
                    Toastr::error("Template Type Not Updated");
                    return back()->withInput();;
                }
            }
            else
            {
                Toastr::error("Template Type Name Allready Exist!!");
                return back()->withInput();
            }
         }
         else
         {

            if(DB::table('temptypes')->where('type_name',$req->temptype_name)->doesntExist())
            {                
                $data = new Temptype;
                $data->type_name=$req->temptype_name;                 
                $data->status=$req->status;                           
                $result = $data->save();

                 if($result)
                {
                   Toastr::success("Template Type Saved Successfully!!!");                
                   return redirect('/Template-Type'); 
                }
                else
                {
                    Toastr::error("Template Type Not Saved");
                    return back()->withInput();;
                }
            }
            else
            {
                Toastr::error("Template Type Name Allready Exist!!");
                return back()->withInput();
            }
        }
    }

    public function Edit_Templatetype($temptype_id)
    {
        if($temptype_id)
        {

            if(DB::table('temptypes')->where('id', $temptype_id)->exists())
            {
                $data['flag'] = 7;
                $data['inline'] = 1;
                $data['title'] = "Edit Template Type";
                $data['Temptype'] = Temptype::where('id',$temptype_id)->first();
                return view('/Admin/Webviews/Manageviews',$data);
            }
        }
        else
        {   
            Toastr::error("Template Type Not Exist!!");
            return back();
        }
    }

    public function Delete_Templatetype($temptype_id)
    {
        if($temptype_id)
        {

            if(DB::table('temptypes')->where('id', $temptype_id)->exists())
            {
                Toastr::error("Template Type Not Deleted!!");
                return back();
            }
        }
        else
        {   
            Toastr::error("Template Type Not Exist!!");
            return back();
        }
    }

    // ==============================================

    public function Submit_Aboutus_Data(Request $req)
    {
        //dd($_SERVER['SERVER_NAME']);

         $this->validate($req,[
                'temp_id'=>'required',
                'about_heading'=>'required', 
                'aboutus_description'=>'required',
                'aboutus_img'=>'nullable|image|mimes:png',                          
             ]);

         $image = "";
         $ap_image = "";
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

            if($result && $req->has('aboutus_img'))
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

    // ----------------------------------------

    public function Submit_Contain_Data(Request $req)
    {
        //dd($req);

          $this->validate($req,[
                'temp_id'=>'required',
                'contact_email'=>'required|email', 
                'contact_phone'=>'required|digits:10|numeric',
                'contact_otherfields'=>'nullable',
                'contact_address'=>'required',                          
             ]);

        
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
            $result = $data->save();

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
    // =========================================

     public function Customer_Template()
    {
        $data['flag'] = 9;
        $data['inline'] = 0;
        $data['title'] = "Client Template List";
       // $data['Template'] = Templatetb::all();
        $data['Template'] = Domaincreation::where('creater_id','!=',1)->get();
        //dd($data['Template']);
        return view('/Admin/Webviews/Manageviews',$data);
    }
// ------------------------------------

    public function Edit_Template($temp_id)
    {
       // dd($temp_id);        

         if($temp_id)
        {

            if(DB::table('domaincreations')->where(['temp_id'=> $temp_id,'creater_id'=>1])->exists())
            {
                $data['flag'] = 10;
                $data['inline'] = 1;                
                $data['title'] = "Edit Template";
                $data['template_id'] = $temp_id;
                $data['template'] = Domaincreation::where(['temp_id'=>$temp_id,'creater_id'=>1,'role'=>1])->first(); 
                $data['Contain'] = Containlist::where('status',1)->get();
                $data['Temptype'] = Temptype::where('status',1)->get();
                return view('/Admin/Webviews/Manageviews',$data);
            }
        }
        else
        {   
            Toastr::error("Template Not Exist!!");
            return back();
        }
    }

    // ==========================================

    public function Admin_Profile()
    {
        $data['flag'] = 11;
        $data['inline'] = 0;                
        $data['title'] = "Profile";
        $data['User'] = User::where(['id'=>Auth::User()->id,'role'=>1])->select('id','name','email','image')->first(); 
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Admin_Password(Request $req)
    {
        //dd($req);

         $this->validate($req,[
                'old_password' => 'required',                 
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:new_password',  
            ]);

         if(Auth::attempt(array('email' => Auth::user()->email, 'password' => $req->old_password)))
            {
                $result = DB::table('users')->where('email', Auth::user()->email)->where('role',1)->update([                      
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
    // ================================

    public function Admin_Profile_Image(Request $req)
    {
       // dd($req);

        $this->validate($req,[                  
                'profile_image'=>'required|image|mimes:png,jpg,jpeg',                          
             ]);  

            $file = $req->file('profile_image');
           //dd($file);
            $filename = 'logo_img'.time().'.'.$file->extension();
            $destinationPath = public_path('/images/Profile'); 
            $ap_image = url('/public/images/Profile/'.$filename);
            $image = 'images/Profile/'.$filename;

            $result = DB::table('users')->where('email', Auth::user()->email)->where('role',1)->update([                      
                    'image' => $image,
                ]);
            if($result)
            {
                $file->move($destinationPath, $filename);
                toastr()->success('Profile Image successfully');                     
            }
            else
            {
                toastr()->error('Profile Image Not Updated');                   
            } 

            return back();                
    }

    public function Client_List()
    {
        $data['flag'] = 12;
        $data['inline'] = 2;                
        $data['title'] = "Client List";
        $data['Client'] = User::where('role',2)->select('id','name','email','image','status')->get(); 
        return view('/Admin/Webviews/Manageviews',$data);
    }

    public function Client_Status($client_id)
    {
        if(DB::table('users')->where(['id'=> $client_id,'role'=>2])->exists())
        {
            $chnage_status = 0;
            if(DB::table('users')->where(['id'=> $client_id,'role'=>2])->value('status') == 0)
            {
                $chnage_status = 1;
            } 

            $result = DB::table('users')->where(['id'=> $client_id,'role'=>2])->update([                      
                    'status' => $chnage_status,
            ]);
            if($result)
            {
                toastr()->success('Account Updated successfully!!!');                    
            }
            else
            {
                toastr()->error('Account Not Updated!!!');                   
            }  
        }
        else
        {
            toastr()->error('Account Not Exist!!!');
        }

        return back();
    }
   
} 

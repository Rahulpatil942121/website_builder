<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus_tepmlate;

class Apicontroller extends Controller
{
    //



    public function get_aboutus($temp_id,$user_id,$section_id)
    {
    	$dept_user =  Aboutus_tepmlate::where(['temp_id'=>$temp_id,'creater_id'=>$user_id,'section_id'=>$section_id])->first();

    	return $dept_user;
    }




}

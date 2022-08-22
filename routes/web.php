<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Clientcontroller;
use App\Http\Controllers\Admin\Admincontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	//toastr()->success('Data has been saved successfully!');
	//Toastr::success("Hello ". Auth::User()->name);
    return view('Login');
});

Route::get('/login', function () 
{
    //dd("Hi");
    //toastr()->success('Data has been saved successfully!');
    //Toastr::success("Hello ". Auth::User()->name);
    return view('AdminLogin');
});

Route::get('/Register', function () {
	//toastr()->success('Data has been saved successfully!');
	//Toastr::success("Hello ". Auth::User()->name);
    return view('Register');
});
Route::get('/Forgot-Password', function () {
    //toastr()->success('Data has been saved successfully!');
    //Toastr::success("Hello ". Auth::User()->name);
    return view('Forgot_Password');
});


Route::get('/logout', function ()
{
    Auth::logout();
    Session::flush();
    return redirect('/');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode1 = Artisan::call('config:cache');
    $exitCode2 = Artisan::call('view:clear');
    $exitCode3  = Artisan::call('route:clear');
    dd("Cache is cleared");
});

Route::post('/Submit-Login',[Clientcontroller::class, 'index']);
Route::post('/Submit-Admin',[Admincontroller::class, 'index']);

Route::post('/Submit-Register',[Clientcontroller::class, 'Submit_Register']);
Route::post('/Submit-Email', [Clientcontroller::class, 'Submit_Email']);

Route::get('/Verify-Email/{key_id}', [Clientcontroller::class, 'verify_email']);
Route::post('/Submit-New-Password', [Clientcontroller::class, 'Submit_New_Password']);

// ----------------------------------------------




Route::group(['middleware'=>'Admin_Login'],function()
{
    Route::get('/Dashboard', [Admincontroller::class, 'Dashboard']);
    Route::get('/Template-List', [Admincontroller::class, 'Template_List']);
    Route::get('/Add-Template', [Admincontroller::class, 'Add_Template']);
    Route::get('/Contain-List', [Admincontroller::class, 'Contain_List']);
    Route::get('/Add-Contain', [Admincontroller::class, 'Add_Contain']);
    Route::post('/Submit-Contain', [Admincontroller::class, 'Submit_Contain']);

    Route::get('/Edit-Contain/{id}', [Admincontroller::class, 'Edit_Contain']);
    Route::get('/Delete-Contain/{id}', [Admincontroller::class, 'Delete_Contain']);
    Route::get('/Template-Type', [Admincontroller::class, 'Template_Type']);
    Route::get('/Add-Template-Type', [Admincontroller::class, 'Add_Template_Type']);
    Route::get('/Edit-Template-Type/{id}', [Admincontroller::class, 'Edit_Templatetype']);
    Route::get('/Delete-Template-Type/{id}', [Admincontroller::class, 'Delete_Templatetype']);
    
    Route::post('/Submit-Temptype', [Admincontroller::class, 'Submit_Temptype']);
    Route::post('/Submit-Template', [Admincontroller::class, 'Submit_Template']);


    Route::get('/Add-Template-Data/{id}', [Admincontroller::class, 'Add_Template_Data']);
    // ------------------------------------------
    Route::get('/Client-Template', [Admincontroller::class, 'Customer_Template']);
    Route::get('/Edit-Template/{id}', [Admincontroller::class, 'Edit_Template']);
    // =======================================================
    Route::post('/Submit-Aboutus-Data', [Admincontroller::class, 'Submit_Aboutus_Data']);
    Route::post('/Submit-Contain-Data', [Admincontroller::class, 'Submit_Contain_Data']);   
    Route::get('/Admin-Profile', [Admincontroller::class, 'Admin_Profile']);
    Route::post('/Admin-Password', [Admincontroller::class, 'Admin_Password']);
    Route::post('/Admin-Profile-Image', [Admincontroller::class, 'Admin_Profile_Image']); 
    // ===================================
    Route::get('/Client-List', [Admincontroller::class, 'Client_List']);
    Route::get('/Client-Status/{id}', [Admincontroller::class, 'Client_Status']);
   
    
});

Route::group(['middleware'=>'Client_Login'],function()
{
	//Route::get('/Home', [Clientcontroller::class, 'Homepage']);
    Route::get('/Home', [Clientcontroller::class, 'Check_Template']);
    //Route::post('/Check-Template', [Clientcontroller::class, 'Check_Template']);
    
    // ---------------------------------
    Route::get('/New-Template-Data/{temp_id}', [Clientcontroller::class, 'Add_NewTemplate_Data']); 
    // ------------------
    Route::get('/Template-Data/{temp_id}/{domain_id}', [Clientcontroller::class, 'Add_Template_Data']); 

    Route::post('/Submit-Client-Aboutus-Data', [Clientcontroller::class, 'Submit_Aboutus_Data']);
    Route::post('/Submit-Client-Contact-Data', [Clientcontroller::class, 'Submit_Contact_Data']);
    // -------------------------------------
    Route::post('/Submit-Client-ImageGallery', [Clientcontroller::class, 'Submit_Client_ImageGallery']);
    Route::post('/Submit-Client-Banner', [Clientcontroller::class, 'Submit_Client_Banner']);
    // -----------------------------------------

    Route::post('/Submit-Client-Services', [Clientcontroller::class, 'Submit_Client_Services']);
    Route::post('/Submit-Client-BGImage', [Clientcontroller::class, 'Submit_Client_BGImage']);
    Route::post('/Submit-Client-Iconic', [Clientcontroller::class, 'Submit_Client_Iconic']);
    Route::post('/Submit-Client-Testimonial', [Clientcontroller::class, 'Submit_Client_Testimonial']);
    Route::post('/Submit-Client-Logo', [Clientcontroller::class, 'Submit_Client_Logo']);
    Route::post('/Submit-Client-SocialMedia', [Clientcontroller::class, 'Submit_Client_SocialMedia']);

    // ----------------------------------
     Route::get('/My-Template', [Clientcontroller::class, 'My_Template']);
     Route::get('/My-Website-Info/{temp_id}/{domain_id}', [Clientcontroller::class, 'My_Website_Info']);
     // ===========================================
    Route::post('/Submit-Business-Name', [Clientcontroller::class, 'Submit_Business_Name']);
    Route::post('/Submit-Client-Longtext', [Clientcontroller::class, 'Submit_Client_Longtext']); 

    Route::get('/My-Profile', [Clientcontroller::class, 'My_Profile']);    
    Route::get('/Change-Password', [Clientcontroller::class, 'Change_Password']);
    Route::post('/Submit-Password', [Clientcontroller::class, 'Submit_Password']);

});


// =========================================================

Route::get('/Template-Info/{temp_id}', [Clientcontroller::class, 'Template_Info']);


// =========================================================



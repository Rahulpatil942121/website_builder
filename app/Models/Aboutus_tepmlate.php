<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus_tepmlate extends Model
{
    use HasFactory;

    protected $table = "aboutus_tepmlates";

    protected $fillable = [
    	'id',
    	'temp_id',
    	'creater_id',
    	'heading',
    	'about_description',
    	'apimage',
    	'image',
    ];

}

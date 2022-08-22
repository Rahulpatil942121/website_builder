<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus_template extends Model
{
    use HasFactory;

    protected $table = "contactus_templates";

    protected $fillable = [
    	'id',
    	'temp_id',
    	'creater_id',
    	'contact_email',
    	'contact_phone',
    	'contact_otherfields',
    	'contact_address',
    ];

}

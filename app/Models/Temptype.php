<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temptype extends Model
{
    use HasFactory;

     protected $table = "temptypes";

    protected $fillable = [
    	'type_name',    	 
    	'status',
    ];
}

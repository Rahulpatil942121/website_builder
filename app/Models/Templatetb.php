<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templatetb extends Model
{
    use HasFactory;

    protected $table = "templatetbs";

    protected $fillable = [
    	'temp_name',
    	'folder_name',
    	'temp_type',
    ];
 
	public function temptype()
    {
        return $this->belongsTo(Temptype::class,'temp_type','id');
    }

     

}

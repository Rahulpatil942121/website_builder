<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertemplatecontain extends Model
{
    use HasFactory;

    protected $table = "usertemplatecontains";

    protected $fillable = [
    	'id',
    	'temp_id',
    	'creater_id',
    	'conatin_id',
    	'status',
    ];

     public function contain()
    {
        return $this->belongsTo(Containlist::class, 'conatin_id','id');
    }
}

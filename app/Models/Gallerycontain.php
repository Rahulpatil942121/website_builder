<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerycontain extends Model
{
    use HasFactory;

    protected $table = 'gallerycontains';

    protected $fillable = [
    	'id',
    	'temp_id',
    	'creater_id',
    	'section_id',
    	'title',
    	'description',
    	'apimage',
    	'image',
    	'apvideo',
    	'video',
    ];

     public function contain()
    {
        return $this->belongsTo(Containlist::class, 'section_id','id');
    }
}

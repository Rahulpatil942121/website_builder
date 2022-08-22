<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp_contain extends Model
{
    use HasFactory;

    protected $table = "temp_contains";

    protected $fillable = [
    	'temp_id',
    	'conatin_id',
    	'class_name',
    	'status',
    ];

    public function contain()
    {
        return $this->belongsTo(Containlist::class, 'conatin_id','id');
    }
}

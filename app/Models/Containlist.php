<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Containlist extends Model
{
    use HasFactory;

    protected $table = "containlists";

    protected $fillable = [
    	'id',
    	'contain_name',
    	'status',
    ];

}

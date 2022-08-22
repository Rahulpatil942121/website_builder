<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaincreation extends Model
{
    use HasFactory;

     protected $table = "domaincreations";

    protected $fillable = [
    	'domain_name',
    	'temp_id',
    	'creater_id',
    	'role',
    	'status',
    ];

    public function template()
    {
        return $this->belongsTo(Templatetb::class, 'temp_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'creater_id','id');
    }
}

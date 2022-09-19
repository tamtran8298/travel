<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    protected $table = "financing";


    public $fillable = [
    	'id',
    	'description',    	
    	'crated_at',
    	'updated_at'
    ];
}

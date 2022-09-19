<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "config";
    public $fillable = [
    	'host',
    	'port',
    	'encryption',
    	'email',
    	'password'
    ];
}

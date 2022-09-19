<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Title extends Model
{
    protected $table = "title";


    public $fillable = [
    	'id',
    	'description',    	
    	'crated_at',
    	'updated_at'
    ];
}

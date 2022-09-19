<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{    
    protected $table = "menu_items";

    public function childs(){
    	return $this->hasMany('App\MenuItem','parent_id');
    }
}

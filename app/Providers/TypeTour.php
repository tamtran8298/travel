<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_tour extends Model
{
    protected $table = "type_tour";

    public function getAll(){
    	return $this->all();
    }

    public function getBySlug($slug){
    	return $this->where('slug',$slug)
    			->where('status',1)
    			->first();
    }
}

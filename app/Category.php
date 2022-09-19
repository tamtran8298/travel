<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public function getAll(){
    	return $this->all();
    }

    public function getBySlug($slug){
    	return $this->where('slug',$slug)
    			->where('status',1)
    			->first();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTour extends Model
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
    public function getImgById($id){
    	
    	$value=TypeTour::find($id);
        $img= $value->image;
        return $img;
    }
    public function getNameById($id){

        $value=TypeTour::find($id);
        $name= $value->name;
        return $name;
    }
    public function getAllById($id){
    	
    	return $this->where('id',$id)->where('status',1)->get('image');
    }

    

}

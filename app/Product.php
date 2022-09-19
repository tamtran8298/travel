<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";


    public function getBySlugCategory($slugCate){
    	return $this->select('product.*')
    			->join('category','category.id','product_category_id')
    			->where('category.slug',$slugCate)
    			->where('category.status',1)
    			->where('product.status',1)
    			->paginate(8);
    }

    public function getBySlug($slugProduct){
    	return $this->where('slug',$slugProduct)
    	->where('status',1)
    	->first();
    }

    public function get6ByCateId($cateId){
    	return $this->where('status',1)->inRandomOrder()->take(6)->get();
    }
}

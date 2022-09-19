<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ShopController extends Controller
{
	private $category;
	private $product;
  
	public function __construct(){
		$this->category = new Category;
		$this->product = new Product;
	}

    public function index($slugCategory){
    	$data['category'] = $this->category->getBySlug($slugCategory);
    	$data['product'] = $this->product->getBySlugCategory($slugCategory);

    	return view('website.shop.index',$data);
    }

    public function detail($slugProduct){
    	$data['product'] = $this->product->getBySlug($slugProduct);

    	$data['random6product'] = $this->product->get6ByCateId($data['product']->product_category_id); //echo $data['6product'];die;

    	return view('website.shop.detail',$data);
    }
    
}

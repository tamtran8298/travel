<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Special;
use App\SpecialForm;

class SpecialController extends Controller
{
	private $special;
  
	public function __construct(){
		$this->special = new Special;
		$this->specialForm = new SpecialForm;
     
	}

   	public function index(){
   		
   		return view('website.special.index');
   	}

   	public function getPostByPage(Request $request){ //dd($request->all());
    	$take = 3;
    	$skip = $request->page * $take;

    	$data = $this->special->getByPostTypeSlug($request->slug, $take, $skip);
    	// echo $data; die;
    	return response()->json(['status'=>1,'data'=>$data]);
    }

    public function postForm(Request $request){
    	$arr = [
    		'name' => $request->name,
    		'phone' => $request->phone,
    		'email' => $request->email,
    		'date' => formatDateDB($request->date),
    		'description' => $request->description
    	]; //dd($arr);

    	$data = $this->specialForm->createByArr($arr);

    	return response()->json(['status'=>1]);
    }
    
}

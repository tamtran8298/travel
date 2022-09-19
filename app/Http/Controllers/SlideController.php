<?php

namespace App\Http\Controllers;

use App\Functions\General;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
	private $slide ;

	public function __construct(){
		$this->slide = new Slide;
	}

    public function index()
    {
    	return view('admin.slide.index');
    }

    public function getEdit(Request $request){
    	$data = $this->slide->getSlideByID($request->id);

    	$result = [
            'status' => 1,
            'data' =>  $data,           
        ];

        return response()->json($result);
    }

    public function postEdit(Request $request)
    {
    	if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }

    	$arr = [
    		'title' => $request->title,
    		'description' => $request->description,
    		'image' => $image ?? null,
    		'link' => $request->link,
    	];
    	
    	if(!isset($image)){
    		unset($arr['image']);
    	}

    	$this->slide->updateByArr($request->id,$arr);

    	$result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
    	return view('admin.slide.add_or_edit');
    }

    public function postAdd(Request $request){
    	if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }   

    	$arr = [
    		'title' => $request->title,
    		'description' => $request->description,
    		'image' => $image,
    		'link' => $request->link,
    	];

    	$this->slide->createByArr($arr);

    	return redirect()->route('slide')->with('success','Created successfully');
    }

    public function datatable(){
    	return $this->slide->datatable();
    }

    public function delete(Request $request){
    	$this->slide->deleteById($request->id);

    	$result = [
    		'status'=>1
    	] ;

    	return response()->json($result);
    }

    
}

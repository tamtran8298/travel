<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SlideTitle;

class SlideTitleController extends Controller
{	

	private $slideTitle;

    public function __construct(){
    	$this->slideTitle = new SlideTitle;
    }

    public function index(){
    	return view('admin.slide_title.index');
    }

    public function getEdit(Request $request){
    	$data = $this->slideTitle->getById($request->id);

    	$result = [
    		'status' => 1,
    		'data' => $data
    	];

    	return response()->json($result);
    }

    public function postEdit(Request $request){
    	$arr = [
    		'title' => $request->title,
    		'description' => $request->description,
    	];

    	$this->slideTitle->updateById($request->id , $arr);
    	
    	$result = [
    		'status' => 1
    	];

    	return response()->json($result);
    }

    public function getAdd(){
    	return view('admin.slide_title.add_or_edit');
    }

    public function postAdd(Request $request){
    	$arr = [
    		'title' => $request->title,
    		'description' => $request->description,
    	];

    	$this->slideTitle->createByArr($arr);

    	return redirect()->route('slideTitle');
    }

    public function delete(Request $request){
    	$this->slideTitle->deleteById($request->id);

    	$result = [
    		'status' => 1
    	];

    	return response()->json($result);
    }

    public function datatable(){
   
    	return $this->slideTitle->datatable();
    }



    

}

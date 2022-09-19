<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Special;
use App\Functions\General;

class SpecialController extends Controller
{
	private $special;

    public function __construct(){
    	$this->special = new Special;
    }

    public function index(){
    	return view("admin.special.index");
    }

    public function getEdit(Request $request){
        $data = $this->special->getById($request->id);

        $result = [
            'status' => 1,
            'data' =>  $data,           
        ];

        return response()->json($result);
    }

    public function postEdit(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => General::uploadImageSummerNote($request->description),
            'image' => $image ?? null,
            'post_type_id' => $request->post_type_id,
        ];

        if(!isset($image)){
            unset($arr['image']);
        }

        $this->special->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.special.add_or_edit');
    }

    public function postAdd(Request $request){ //dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }   

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => General::uploadImageSummerNote($request->description),
            'image' => $image ?? null,
        ];

        $this->special->createByArr($arr);

        return redirect()->route('special')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->special->datatable();
    }

    public function delete(Request $request){
        $this->special->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

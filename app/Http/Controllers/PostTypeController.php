<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostType;
use App\Functions\General;

class PostTypeController extends Controller
{
	private $postType;

    public function __construct(){
    	$this->postType = new PostType;
    }

    public function index(){
    	return view("admin.post_type.index");
    }

    public function getEdit(Request $request){
        $data = $this->postType->getById($request->id);

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
            'image' => $image ?? null,
        ];

        if(!isset($image)){
            unset($arr['image']);
        }

        $this->postType->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.post_type.add_or_edit');
    }

    public function postAdd(Request $request){ //dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }   

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'image' => $image,
        ];

        $this->postType->createByArr($arr);

        return redirect()->route('postTypes')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->postType->datatable();
    }

    public function delete(Request $request){
        $this->postType->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

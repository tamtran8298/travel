<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostType;
use App\Functions\General;

class PostController extends Controller
{
	private $post;

    public function __construct(){
    	$this->post = new Post;
        $this->postType = new PostType;
    }

    public function index(){
        $data['postType'] = $this->postType->getAll();

    	return view("admin.post.index",$data);
    }

    public function getEdit(Request $request){
        $data = $this->post->getById($request->id);

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

        $this->post->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        $data['postType'] = $this->postType->getAll();
        return view('admin.post.add_or_edit',$data);
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
            'post_type_id' => $request->post_type_id,
        ];

        $this->post->createByArr($arr);

        return redirect()->route('posts')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->post->datatable();
    }

    public function delete(Request $request){
        $this->post->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

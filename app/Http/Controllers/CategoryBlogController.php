<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryBlog;

class CategoryBlogController extends Controller
{
	public function index(){     
		$data['categoryBlog'] = categoryBlog::get(); 
		return view('admin.category_blog.index',$data);
	}  

	public function get_add(){
		$data['name'] = 'Add';
		$data['category'] = categoryBlog::select('id','name')->get();

		return view('admin.category_blog.add_or_edit',$data); 
	}
	public function post_add(Request $request){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 

		for ($i = 0; $i < 5; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		} 
		$this->validate($request,[

		],[

		]);

		$Category = new categoryBlog;
		$Category->name = $request->name;
		$Category->id_blog_category= $randomString;
		$Category->save();
		return redirect()->route('category_blog')->with('success','Add Category Blog Success');
	}
	public function get_edit($id){
		$data['name'] = 'Sửa';
		$data['category'] = categoryBlog::findOrFail($id);
		return view('admin.category_blog.add_or_edit',$data);
	}
	public function post_edit(Request $request,$id){
		$this->validate($request,[

		],[

		]);
		$category = categoryBlog::find($id);
		$category->name = $request->name;
		$category->save();
		return redirect()->route('category_blog')->with('success','Edit Category Blog Success');
	}
	public function delete($id){ 
		$category = categoryBlog::find($id);
		$category->delete();
		return redirect()->route('category_blog')->with('success','Delete Category Blog Success');
	}
}

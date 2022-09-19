<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\categoryBlog;
use App\Blog;
use Yajra\Datatables\Datatables;


class BlogWebsiteController extends Controller
{
	
    public function index()
    {	
    	$data['category'] = categoryBlog::get();
    	$data['blog'] = Blog::where('status',1)->get();
    	$data['count'] = Blog::where('status',1)->count();
        return view('website.blog.index',$data);
    }
    public function loadBlog(Request $request){
       $take = 3;
       $skip = $request->page * $take ;
       $data = Blog::select('blog.*','category_blog.name as category_blog')->where('status',1)->skip($skip)->take($take)
       ->join('category_blog','category_blog.id_blog_category','blog.topic')
       ->get();
       $result = ['status'=>1 , 'data'=>$data ];

       return response()->json($result);

   }
   public function loadCategory(Request $request,$id)
   {
        $data['category'] = categoryBlog::get();
        $data['blog'] = Blog::where('status',1)->get();
        $data['count'] = Blog::where('topic',$id)->where('status',1)->count();
        $data['topic'] = $id;
        return view('website.blog.category_blog',$data);
   }
   public function loadBlogBycategory(Request $request){
       $take = 3;
       $skip = $request->page * $take ;
       $topic = $request->topicid;
       $data = Blog::select('blog.*','category_blog.name as category_blog')->where('blog.topic',$topic)->where('status',1)->skip($skip)->take($take)
       ->join('category_blog','category_blog.id_blog_category','blog.topic')
       ->get();
       $result = ['status'=>1 , 'data'=>$data ];

       return response()->json($result);

   }
   public function single_blog($id)
   {
    $data['category'] = categoryBlog::get();
    $data['blogcategory'] = Blog::where('status',1)->get();
    $data['blog'] = Blog::where('id',$id)->get();
    return view('website.blog.single-blog',$data);
   }
   public function searchBlog(Request $request)
   {
    $name = $request->key;

    // $data['category'] = categoryBlog::get();
    // $data['blog'] = Blog::get();
    // $data['count'] = Blog::where('topic',$id)->count();
    // $data['topic'] = $id;
    $data['category'] = categoryBlog::get();
    $data['blog'] = Blog::where('status',1)->get();
    // $data['blog'] = Blog::where('title','like','%'.$name.'%')->get();
    // $data['category'] = categoryBlog::get();
    // $data['blogcategory'] = Blog::get();
    $data['count'] = Blog::where('title','like','%'.$name.'%')->count();
    $data['topic'] = $name;
    return view('website.blog.search',$data);
   }
   public function loadBlogBysearch(Request $request){
       $take = 3;
       $skip = $request->page * $take ;
       $topic = $request->topicid;
       $data = Blog::select('blog.*','category_blog.name as category_blog')->where('title','like','%'.$topic.'%')->where('status',1)->skip($skip)->take($take)
       ->join('category_blog','category_blog.id_blog_category','blog.topic')
       ->get();
       $result = ['status'=>1 , 'data'=>$data ];

       return response()->json($result);

   }
}

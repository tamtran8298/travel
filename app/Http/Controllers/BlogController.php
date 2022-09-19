<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryBlog;
use Yajra\Datatables\Datatables;
use App\Blog;
use App\Functions\General;

class BlogController extends Controller
{
    public function index(){    
        $data['category_blog'] = categoryBlog::get();
        return view('admin.blog.index',$data);
    } 
    public function datatables(){
        $blog = blog::select('blog.*','category_blog.name as category_blog')
                            
                            ->join('category_blog','category_blog.id_blog_category','blog.topic')
                            ->get();
        
        
        return Datatables::of($blog)
        ->addColumn('img',function($blog){
            return "<img style='height: 8em; max-width:12em;' src='".loadImage($blog->img)."'  />";
        })
        ->addColumn('body',function($blog){
            return '<a href="#" data-id='.$blog->id.' class="blog_description" >
            <button class="w3-button w3-white w3-border w3-border-green w3-round-large">Hiển Thị</button></a>';
            
        })
        ->addColumn('status',function($blog){
        if($blog->status == 1){
           return '<a href="#" data-id='.$blog->id.' class="blog_off" >
           <i class="fa fa-toggle-on" style="font-size:24px;color:green"></i></a>';}
        else{
            return '<a href="#" data-id='.$blog->id.' class="blog_on" ><i class="fa fa-toggle-off" style="font-size:24px;color:green"></i></a>';}
        })

        ->addColumn('action',function($blog){
            return '<a href="#" data-id='.$blog->id.'  class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$blog->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        
        ->rawColumns(['body','img','status','action'])
        ->make(true);        
    }
    public function get_add(){
        $data['name'] = 'Thêm';
        $data['category_blog'] = categoryBlog::get();  
        return view('admin.blog.add_or_edit',$data); 
    }

    public function post_add(Request $request){
        $this->validate($request,[
            
        ],[

        ]);
        
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->topic = $request->topic;
        $blog->description = $request->description;
        $blog->status = 1;
        $body = $request->body;
        $blog->body = General::uploadImageSummerNote($body);

        if($request->hasFile('image')){
            $blog->img = General::uploadImage(null,$request->image,null);
        }
        else{
        	$blog->img=null;
        }      
        
        $blog->save();
        return redirect()->route('blog')->with('Success','Create Blog Success');
    }
    public function description(Request $request){
        // $data['name'] = 'Edit';
        $blog = Blog::findOrFail($request->id);
        // $type_tour = type_tour::where('status',1)->get(); 
        $result = [
            'success' => true,
            'blog' =>  $blog,           
        ];
        return json_encode($result);
        // return view('admin.tour.add_or_edit',$data);
    }
    public function off(Request $request){ 
        if($request->id){ 
            $blog = Blog::findOrFail($request->id);
            $blog->status = 0;
            $blog->save();
            return "Hidden Blog Success";
        }
    }
    public function on(Request $request){ 
        if($request->id){ 
            $blog = Blog::findOrFail($request->id);
            $blog->status = 1;
            $blog->save();
            return "Show Blog Success";
        }
    }
    public function get_edit(Request $request){
        // $data['name'] = 'Edit';
        $blog = Blog::findOrFail($request->id);
        // $type_tour = type_tour::where('status',1)->get(); 
        $result = [
            'success' => true,
            'blog' =>  $blog,           
        ];
        return json_encode($result);
        // return view('admin.tour.add_or_edit',$data);
    }

    public function post_edit1(Request $request){
        $this->validate($request,[

        ],[

        ]);
        $blogvalue = blog::find($request->id);
        $blogvalue->title = $request->title;
        $blogvalue->topic = $request->topic;
        $blog->description = $request->description;
        $blogvalue->status = 0;
        $description = $request->body;
        $blogvalue->body = General::uploadImageSummerNote($description);

       
        if($request->hasFile('image')){
            $blogvalue->img = General::uploadImage(null,$request->image,null);
        }
        $blogvalue->save();

        return json_encode(['success'=>true]);
        // return back()->with('success','Edit tour Success');
    }

    public function delete(Request $request){ 
        if($request->id){ 
            $blog = Blog::findOrFail($request->id);
            $blog->delete();
            return "Delete tour Success";
        }
    }
}

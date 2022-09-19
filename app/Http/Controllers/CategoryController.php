<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){      
        return view('admin.category.index');
    }   

    public function edit(){
        return view('admin.category.edit');
    }

    public function datatables(){
        $category = Category::where('status',1)->get();
        
        return Datatables::of($category)
        ->addColumn('action',function($category){ 
            return '<a href="'.route('edit-category',$category->id).'" class="btn btn-success btn-sm">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$category->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })      
        ->rawColumns(['action'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Add';
        $data['category'] = Category::select('id','name')->get();

        return view('admin.category.add_or_edit',$data); 
    }

    public function post_add(Request $request){
        $this->validate($request,[
            
        ],[

        ]);
        
        $Category = new Category;
        $Category->name = $request->name;
        $Category->slug = str_slug($request->name);
       
        $Category->save();
        return redirect()->route('category')->with('success','Add Category Success');

    }

    public function get_edit($id){
        $data['name'] = 'Edit';
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.add_or_edit',$data);
    }

    public function post_edit(Request $request,$id){
        $this->validate($request,[

        ],[

        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        return back()->with('success','Edit Category Success');
    }

    public function delete(Request $request){ 
        if($request->id){ 
            $Category = Category::findOrFail($request->id);
            $Category->status = 0;
            $Category->save();
            return "Delete Category Success";
        }
    }
}

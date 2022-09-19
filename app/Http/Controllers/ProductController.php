<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Category;
use App\Functions\General;

class ProductController extends Controller
{
    public function index(){    
        $data['category'] = Category::where('status',1)->get();
        return view('admin.product.index',$data);
    }   

    public function edit(){
        $data['category'] = Category::where('status',1)->get();  
        return view('admin.product.edit',$data);
    }

    public function datatables(){
        $product = Product::select('product.*','category.name as category')
                            ->where('product.status',1)
                            ->join('category','category.id','product_category_id')
                            ->get();
        
        return Datatables::of($product)
        ->addColumn('img',function($product){

            return "<img style='height: 8em;' src='".loadImage($product->image)."'  />";

        })
        ->addColumn('action',function($product){
            return '<a href="#" data-id='.$product->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$product->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->editColumn('price',function($product){
            return number_format($product->price);
        })
        ->addColumn('checkHome',function($product){
            $checked = '';
            if($product->check_home_page == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$product->id.' class="check_home_page checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->addColumn('checkTrending',function($product){
            $checked = '';
            if($product->check_trending == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$product->id.' class="check_trending checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->addColumn('checkBestSeller',function($product){
            $checked = '';
            if($product->best_seller == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$product->id.' class="check_best_seller checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->rawColumns(['checkBestSeller','checkTrending','img','checkHome','action'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Add';
        $data['product'] = Product::select('id','name')->get();
        $data['category'] = Category::where('status',1)->get();  
        return view('admin.product.add_or_edit',$data); 
    }

    public function post_add(Request $request){
        $this->validate($request,[
            
        ],[

        ]);
        
        $product = new Product;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->product_category_id = $request->category;
        $description = $request->description;
        $product->description = General::uploadImageSummerNote($description);

        if($request->hasFile('image')){
            $product->image = General::uploadImage(null,$request->image,null);
        }      
        
        $product->save();
        return redirect()->route('product')->with('success','Add product Success');
    }

    public function get_edit(Request $request){
        // $data['name'] = 'Edit';
        $product = Product::findOrFail($request->id);
        // $category = Category::where('status',1)->get(); 
        $result = [
            'success' => true,
            'product' =>  $product,           
        ];
        return json_encode($result);
        // return view('admin.product.add_or_edit',$data);
    }

    public function post_edit(Request $request){
        $this->validate($request,[

        ],[

        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->product_category_id = $request->category;
        $product->description = $request->description;
        $description = $request->description;
        $product->description = General::uploadImageSummerNote($description);
        if($request->hasFile('image')){
            $product->image = General::uploadImage(null,$request->image,null);
        }
        $product->save();

        return json_encode(['success'=>true]);
        // return back()->with('success','Edit product Success');
    }

    public function delete(Request $request){ 
        if($request->id){ 
            $product = Product::findOrFail($request->id);
            $product->status = 0;
            $product->save();
            return "Delete product Success";
        }
    }

    public function checkHomePage(Request $request){
        if($request->id){
            $product = Product::findOrFail($request->id);
            $product->check_home_page = $product->check_home_page == 1 ? '0' : '1';
            $product->save();
            return 'Update Active Home Page Success!';
        }
    }

    public function checkTrendingProduct(Request $request){
        if($request->id){
            $product = Product::findOrFail($request->id);
            $product->check_trending = $product->check_trending == 1 ? '0' : '1';
            $product->save();
            return 'Update Trending Success!';
        }
    }

    public function checkBestSeller(Request $request){
        if($request->id){
            $product = Product::findOrFail($request->id);
            $product->best_seller = $product->best_seller == 1 ? '0' : '1';
            $product->save();
            return 'Update Trending Success!';
        }
    }
}

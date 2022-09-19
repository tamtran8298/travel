<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\TypeTour;
use App\Functions\General;

class TypeOfTourController extends Controller
{
    public function index(){      
        return view('admin.type_tour.index');
    }   

    public function edit(){
        return view('admin.type_tour.edit');
    }

    public function datatables(){
        $type = TypeTour::select('type_tour.*')->get();
        
        return Datatables::of($type)
        ->addColumn('image',function($type){
            return "<image style='height: 8em;' src='".loadImage($type->image)."'  />";
            })
        ->addColumn('status',function($type){
        if($type->status == 1){
           return '<a href="#" data-id='.$type->id.' class="off" >
           <i class="fa fa-toggle-on" style="font-size:24px;color:green"></i></a>';}
        else{
            return '<a href="#" data-id='.$type->id.' class="on" ><i class="fa fa-toggle-off" style="font-size:24px;color:green"></i></a>';
       }
        })
        ->addColumn('action',function($type){ 
            return '<a href="#" data-id='.$type->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$type->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })      
        ->rawColumns(['status','action','image'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Thêm';
        $data['typetour'] = TypeTour::select('id','name')->get();

        return view('admin.type_tour.add_or_edit',$data); 
    }

    public function post_add(Request $request){
        $this->validate($request,[
            
        ],[

        ]);
        
        $type_tour = new TypeTour;
        $type_tour->name = $request->name;
        
       	$type_tour->status = 1;
        if($request->hasFile('image')){
            $type_tour->image = General::uploadImage(null,$request->image,null);
        }      
        $type_tour->save();
        return redirect()->route('TypeOfTour')->with('success','Add type_tour Success');

    }

    // public function get_edit($id){
    //     $data['name'] = 'Edit';
    //     $data['type_tour'] = TypeTour::findOrFail($id);
    //     return view('admin.type_tour.add_or_edit',$data);

    // }
    // // public function get_edit(Request $request){
    // //     // $data['name'] = 'Edit';
    // //     $type_tour = TypeTour::findOrFail($request->id);
    // //     // $type_tour = type_tour::where('status',1)->get(); 
    // //     $result = [
    // //         'success' => true,
    // //         'type_tour' =>  $type_tour,           
    // //     ];
    // //     return json_encode($result);
    // //     // return view('admin.tour.add_or_edit',$data);
    // // }

    // public function post_edit(Request $request,$id){
    //     $this->validate($request,[

    //     ],[

    //     ]);
    //     $type_tour = TypeTour::find($id);
    //     $type_tour->name = $request->name;
    //     $type_tour->slug = str_slug($request->name);
    //     if($request->hasFile('image')){
    //         $Tour->image = General::uploadImage(null,$request->image,null);
    //     }
    //     $type_tour->save();
    //     // return json_encode(['success'=>true]);
    //     return redirect()->route('TypeOfTour')->with('success','Edit type_tour Success');
    // }
    public function get_edit(Request $request){
        // $data['name'] = 'Edit';
        $type = TypeTour::findOrFail($request->id);
        // $type_tour = type_tour::where('status',1)->get(); 
        $result = [
            'success' => true,
            'type' =>  $type,           
        ];
        return json_encode($result);
        // return view('admin.tour.add_or_edit',$data);
    }

    public function post_edit(Request $request){
        $this->validate($request,[

        ],[

        ]);
        $type = TypeTour::find($request->id);
        $type->name = $request->name;
        
        
        
      
        // $description = $request->description;
        // $type_tour->description = General::uploadImageSummerNote($description);
        if($request->hasFile('image')){
            $type->image = General::uploadImage(null,$request->image,null);
        }
        $type->save();

        return json_encode(['success'=>true]);
        // return back()->with('success','Edit tour Success');
    }

    public function delete(Request $request){ 
        if($request->id){ 
            
            $type_tour = TypeTour::findOrFail($request->id);
            $type_tour->delete();
            return "Delete type_tour Success";
        }
    }

    public function off(Request $request){ 
        if($request->id){ 
            $type_tour = TypeTour::findOrFail($request->id);
            $type_tour->status = 0;
            $type_tour->save();
            return "Off tour Success";
        }
    }
    public function on(Request $request){ 
        if($request->id){ 
            $type_tour = TypeTour::findOrFail($request->id);
            $type_tour->status = 1;
            $type_tour->save();
            return "On tour Success";
        }
    }
}

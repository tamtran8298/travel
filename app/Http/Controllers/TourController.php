<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Tour;
use App\TypeTour;
use App\Functions\General;

class tourController extends Controller
{
    public function index(){    
        $data['type_tour'] = TypeTour::where('status',1)->get();
        return view('admin.tour.index',$data);
    }   

    public function edit(){
        $data['type_tour'] = TypeTour::where('status',1)->get();  
        return view('admin.tour.edit',$data);
    }

    public function datatables(){
        $tour = tour::select('tour.*','type_tour.name as type_tour')
                            
                            ->join('type_tour','type_tour.id','tour_TypeTour_id')
                            ->get();
        
        return Datatables::of($tour)
        ->addColumn('img',function($tour){
            return "<img style='height: 8em;' src='".loadImage($tour->image)."'  />";
        })
        ->addColumn('description',function($tour){
            return '<a href="#" data-id='.$tour->id.' class="tour_description" >
            <button class="w3-button w3-white w3-border w3-border-green w3-round-large">Hiển Thị</button></a>';
            
        })
         ->addColumn('status',function($tour){
        if($tour->status == 1){
           return '<a href="#" data-id='.$tour->id.' class="tour_off" >
           <i class="fa fa-toggle-on" style="font-size:24px;color:green"></i></a>';}
        else{
            return '<a href="#" data-id='.$tour->id.' class="tour_on" ><i class="fa fa-toggle-off" style="font-size:24px;color:green"></i></a>';}
        })
        ->addColumn('action',function($tour){
            return '<a href="#" data-id='.$tour->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$tour->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->editColumn('price',function($tour){
            return number_format($tour->price);
        })
        ->addColumn('checkHome',function($tour){
            $checked = '';
            if($tour->check_home_page == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$tour->id.' class="check_home_page checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->addColumn('checkTrending',function($tour){
            $checked = '';
            if($tour->check_trending == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$tour->id.' class="check_trending checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->addColumn('checkBestSeller',function($tour){
            $checked = '';
            if($tour->best_seller == 1){
                $checked = 'checked';
            }
            return '<input '.$checked.' data-id='.$tour->id.' class="check_best_seller checkbox_type" type="checkbox" data-toggle="toggle" data-size="sm">';           
        })
        ->rawColumns(['checkBestSeller','description','checkTrending','img','checkHome','status','action'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Thêm';
        $data['tour'] = tour::select('id','name')->get();
        $data['type_tour'] = TypeTour::where('status',1)->get();  
        return view('admin.tour.add_or_edit',$data); 
    }

    public function post_add(Request $request){
        $this->validate($request,[
            
        ],[

        ]);
        
        $tour = new tour;
        $tour->name = $request->name;
        $tour->slug = str_slug($request->name);
        $tour->price = $request->price;
        $tour->tour_id= $request->tour_id;
        $tour->transport=$request->transport;
        $tour->tour_date = $request->date;
        $tour->place_start= $request->place_start;
        $tour->date_start=$request->date_start;
        $tour->tour_TypeTour_id = $request->type_tour;
        $description = $request->description;
        $tour->description = General::uploadImageSummerNote($description);

        if($request->hasFile('image')){
            $tour->image = General::uploadImage(null,$request->image,null);
        }      
        
        $tour->save();
        return redirect()->route('tour')->with('success','Add tour Success');
    }

    public function get_edit(Request $request){
        // $data['name'] = 'Edit';
        $tour = tour::findOrFail($request->id);
        // $type_tour = type_tour::where('status',1)->get(); 
        $result = [
            'success' => true,
            'tour' =>  $tour,           
        ];
        return json_encode($result);
        // return view('admin.tour.add_or_edit',$data);
    }

    public function post_edit(Request $request){
        $this->validate($request,[

        ],[

        ]);
        $tour = tour::find($request->id);
        $tour->name = $request->name;
        $tour->slug = str_slug($request->name);
        $tour->price = $request->price;
        $tour->tour_id= $request->tour_id;
        $tour->transport=$request->transport;
        $tour->tour_date = $request->tour_date;
        $tour->place_start= $request->place_start;
        $tour->date_start=$request->date_start;
        $tour->tour_TypeTour_id = $request->type_tour;
        $description = $request->description;
        $tour->description = General::uploadImageSummerNote($description);

       
        if($request->hasFile('image')){
            $tour->image = General::uploadImage(null,$request->image,null);
        }
        $tour->save();

        return json_encode(['success'=>true]);
        // return back()->with('success','Edit tour Success');
    }


    public function delete(Request $request){ 
        if($request->id){ 
            $tour = tour::findOrFail($request->id);
            $tour->delete();
            return "Delete tour Success";
        }
    }

    public function checkHomePage(Request $request){
        if($request->id){
            $tour = tour::findOrFail($request->id);
            $tour->check_home_page = $tour->check_home_page == 1 ? '0' : '1';
            $tour->save();
            return 'Update Active Home Page Success!';
        }
    }

    public function checkTrendingtour(Request $request){
        if($request->id){
            $tour = tour::findOrFail($request->id);
            $tour->check_trending = $tour->check_trending == 1 ? '0' : '1';
            $tour->save();
            return 'Update Trending Success!';
        }
    }

    public function checkBestSeller(Request $request){
        if($request->id){
            $tour = tour::findOrFail($request->id);
            $tour->best_seller = $tour->best_seller == 1 ? '0' : '1';
            $tour->save();
            return 'Update Trending Success!';
        }
    }
    public function off(Request $request){ 
        if($request->id){ 
            $tour = tour::findOrFail($request->id);
            $tour->status = 0;
            $tour->save();
            return "Off tour Success";
        }
    }
    public function on(Request $request){ 
        if($request->id){ 
            $tour = tour::findOrFail($request->id);
            $tour->status = 1;
            $tour->save();
            return "On tour Success";
        }
    }

    public function description(Request $request){
        // $data['name'] = 'Edit';
        $tour = tour::findOrFail($request->id);
        // $type_tour = type_tour::where('status',1)->get(); 
        $result = [
            'success' => true,
            'tour' =>  $tour,           
        ];
        return json_encode($result);
        // return view('admin.tour.add_or_edit',$data);
    }
}

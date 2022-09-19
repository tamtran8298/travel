<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tour;
use App\TypeTour;
use Carbon\Carbon;

class SearchController extends Controller
{
	public function __construct(){
		
       
        $this->tour= new Tour;
        $this->typetour= new TypeTour;

	}
    public function index(Request $request)
    {
    	$data = [
    		'tour'=>$this->tour->search($request),
    		 'type_tour'=>$this->typetour->get()->where('status',1),
    		
    	];
    	

    	return view('website.search.index',$data);
    }
    public function filter(request $request)
    {
        $data = [
            'tour'=>$this->tour->filter($request),
             'type_tour'=>$this->typetour->get()->where('status',1),
            
        ];
        

        return view('website.search.index',$data);
    }
    public function search($name , $date , $tourId){

        $dateCb1 =  Carbon::parse ($date);
        $dateCb2 =  Carbon::parse ($date);


        $endDate = $dateCb1->addDays(2);

        $startDate = $dateCb2->subDays(1);


        // dd( $endDate ."|| ". $startDate);
        $data['tour'] = $this->tour->where('tour_TypeTour_id',$tourId)
        ->where('date_start','>=',$startDate)
        ->where('date_start','<=',$endDate)
        ->where('slug','like','%'.str_slug($name).'%')
        ->get();
        $data['type_tour']=$this->typetour->get()->where('status',1);
        // dd($data);
        return view('website.search.searchtour',$data);
    }

}

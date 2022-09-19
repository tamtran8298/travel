<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;


use App\TypeTour;
use App\Tour;
use Carbon\Carbon;
class TypeController extends Controller
{


	public function __construct(){
		
        $this->typetour = new TypeTour;
        $this->tour= new Tour;
	}

    public function index($idtour){
        $now=Carbon::now()->toDateString();
    	$data = [
            
            'placeStart' => $this->tour->getPlaceStart(),
            'typetour' => $idtour,
            'nameType'=>$this->typetour->getNameById($idtour),
            'type_tour'=>$this->typetour->get()->where('status',1),
            'ValueTour'=>$this->tour->getById($idtour),
            // 'star'=>$this->tour->getStarById($idtour),
    	];
        return view("website.type_tour.index",$data);
    }

    
}

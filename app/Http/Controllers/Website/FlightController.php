<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flight;

class FlightController extends Controller
{
	private $flight ;

	public function __construct(){
		$this->flight = new Flight ;
	}
     public function getFlight ($slug) {
     	$data['flight'] = $this->flight->findBySlug($slug);
     	return view('website.flight.flight',$data);
     }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
	private $service;
  
	public function __construct(){
		$this->service = new Service;
     
	}

    public function index(){
    	$service = $this->service->getJoinServiceType();
    	$data['service'] = $this->service->formatQueryToArr($service);
    	// dd($data['service']);
    	// echo $service; die();
    	return view('website.service.index',$data);
    }
    
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Financing;

class FinacingController extends Controller
{
	private $finacing;
  
	public function __construct(){
		$this->finacing = new Financing;
     
	}

   	public function index(){
   		$data['data'] = $this->finacing->first();
   		
   		return view('website.financing.index',$data);
   	}
    
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
	private $contact;
  
	public function __construct(){
		$this->contact = new Contact;
     
	}

   	public function index(){
   		$data['contact'] = $this->contact->first();
   		return view('website.contact.index',$data);
   	}
    
}

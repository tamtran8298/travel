<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpecialForm;
use App\Functions\General;

class SpecialFormController extends Controller
{
	private $specialForm;

    public function __construct(){
    	$this->specialForm = new SpecialForm;
    }

    public function index(){
    	return view("admin.special_form.index");
    }    

    public function datatable(){
        return $this->specialForm->datatable();
    }

    
}

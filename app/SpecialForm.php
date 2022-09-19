<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class SpecialForm extends Model
{
    protected $table = "special_form";

    public $fillable = [
    	'id',
    	'name',
    	'phone',
    	'email',
    	'date',
    	'description',
    	'created_at',
    	'updated_at',
    ];

    public function getAll(){
    	return $this->all();
    }

    public function createByArr($arr){
    	// dd($arr);
    	return $this->create($arr);
    }

    public function datatable(){

        $data = $this->getAll();

        return Datatables::of($data)        
        ->make(true);    
    }
}

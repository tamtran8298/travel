<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;


class Flight extends Model
{
    protected $table = "flight";

    public $fillable = [
    	'id',
    	'name',
    	'slug',
    	'status',
        'url',
    	'created_at',
    	'updated_at'
    ];
    public function getAll(){
    	return $this->where('status',1)->get();
    }
      public function datatable(){

    	$data = $this->getAll();
    	//echo $data ; die();
        return Datatables::of($data)
      
        ->addColumn('action',function($data){
            return '<a href="#" data-id='.$data->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$data->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->make(true);    
    }

    public function createByArr($arr){
    	return $this->create($arr);
    }

    public function deleteById($id){
    	return $this->getById($id)->update(['status'=>0]);
    }

    public function updateById($id,$arr){
    	return $this->getById($id)->update($arr);
    }

    public function getById($id){
    	return $this->find($id);
    }

    public function findBySlug($slug){
    	return $this->where('slug',$slug)->where('status',1)->first();
    }
}

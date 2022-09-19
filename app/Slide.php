<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Slide extends Model
{
    protected $table = "slides";

    public $fillable = [
    	'id',
    	'title',
    	'description',
    	'image',
    	'link',
    	'status',
    	'crated_at',
    	'updated_at'
    ];
    public function getAll(){
    	 return $this->where('status',1)->get();   

    }

    public function datatable(){
    	$slide =$this->getAll();

        return Datatables::of($slide)
        ->addColumn('img',function($slide){
            return "<img style='height: 8em;' src='".asset('').$slide->image."'  />";
        })
        ->addColumn('action',function($slide){
            return '<a href="#" data-id='.$slide->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$slide->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->rawColumns(['img','action'])
        ->make(true);    
    }

    public function createByArr($arr){
    	return $this->create($arr);
    }

    public function getSlideById($id){
    	return $this->find($id);
    }

    public function updateByArr($id, $arr){	
    	$data = $this->getSlideById($id);
    	return $data->update($arr);
    }

    public function deleteById($id){
    	return $this->getSlideById($id)->update(['status'=>0]);
    }
}

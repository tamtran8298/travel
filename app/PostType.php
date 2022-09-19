<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class PostType extends Model
{
    protected $table = "post_type";

    public $fillable = [
    	'id',
    	'title',
    	'slug',
    	'image',
    	'status',
    	'crated_at',
    	'updated_at'
    ];

    public function getAll(){
        return $this->where('status',1)->get();
    }

    public function getById($id){
        return $this->find($id);
    }

    public function datatable(){

        $data = $this->getAll();

        return Datatables::of($data)
        ->addColumn('img',function($slide){
            return "<img style='height: 8em;' src='".loadImage($slide->image)."'  />";
        })
        ->addColumn('action',function($data){
            return '<a href="#" data-id='.$data->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$data->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->rawColumns(['img','action'])
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

}
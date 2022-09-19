<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class OurTeam extends Model
{
    protected $table = "our_team";

    public $fillable = [
    	'id',
    	'title',
    	'description',
    	'image',
        'link',
        'type_name',
    	'status',
    	'created_at',
    	'updated_at'
    ];

    public function getAll(){
         return $this->where('status',1)->get();   
    }

    public function getById($id){
        return $this->find($id);
    }

    public function datatable(){
        $slide =$this->getAll();

        return Datatables::of($slide)
        ->addColumn('img',function($slide){
            return "<img style='height: 8em;' src='".loadImage($slide->image)."'  />";
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
        $data = $this->getById($id);
        return $data->update($arr);
    }

    public function deleteById($id){
        return $this->getSlideById($id)->update(['status'=>0]);
    }

    public function getByNumber($number){
        return $this->take($number)->where('status',1)->get();
    }
}

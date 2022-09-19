<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Post extends Model
{
    protected $table = "post";

    public $fillable = [
    	'id',
    	'title',
    	'slug',
    	'description',
    	'image',
        'post_type_id',
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

    	$data = $this->getJoinPostType();

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

    public function getJoinPostType(){
        return $this->select(
                'post.*',
                'post_type.title as post_type_title'
                )
                ->where('post.status',1)
                ->join('post_type','post_type.id','post_type_id')
                ->get();
    }

    public function getByPostTypeSlug($slug, $take, $skip){
        $data = $this->select('post.*')
                    ->where('post.status',1)
                    ->join('post_type','post_type.id','post_type_id');

        if($slug != "new"){                        
            $data = $data->where('post_type.slug',$slug);
        }

        $data = $data->take($take)
                    ->skip($skip)     
                    ->orderBy('post.id','desc')               
                    ->get();
        return $data;
    }

}
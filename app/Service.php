<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Service extends Model
{
    protected $table = "service";

    public $fillable = [
    	'id',
    	'title',
    	'slug',
    	'description',
        'price',
        'duration',
        'service_type_id',
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

    	$data = $this->getJoinServiceType();

        return Datatables::of($data) 
        ->addColumn('action',function($data){
            return '<a href="#" data-id='.$data->id.' class="btn btn-success btn-sm edit">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$data->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })
        ->editColumn('price',function($data){
            return number_format($data->price);
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

    public function getJoinServiceType(){
        return $this->select(
                'service.*',
                'service_type.id as service_type_id',
                'service_type.title as service_type_title',
                'service_type.image as service_type_image'
                )
                ->where('service.status',1)
                ->join('service_type','service_type.id','service_type_id')
                ->get();
    }

   public function formatQueryToArr($query){
        $arr = [];

        foreach ($query as $key => $value) {

            $arr[] = [
                'service_type_id' => $value->service_type_id,
                'service_type_title' => $value->service_type_title,
                'service_type_image' => $value->service_type_image
            ];
        }
        // dd($arr); die;
        $arr = array_values(array_unique($arr, SORT_REGULAR)); //dd($arr); die;

        foreach ($arr as $key => $value) {
            foreach ($query as $keyQuery => $valueQuery) {
                if ($value['service_type_id'] == $valueQuery->service_type_id){
                    // dd('dd');
                    $arr[$key]['services'][] = [
                        'id' => $valueQuery->id,
                        'title' => $valueQuery->title,
                        'slug' => $valueQuery->slug,
                        'description' => $valueQuery->description,
                        'price' => $valueQuery->price,
                        'duration' => $valueQuery->duration,

                    ];
                }
            }
        }
        return $arr;
   }

}
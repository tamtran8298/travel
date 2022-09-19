<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceType;
use App\Functions\General;

class ServiceController extends Controller
{
	private $service;

    public function __construct(){
    	$this->service = new Service;
        $this->serviceType = new ServiceType;
    }

    public function index(){
        $data['serviceType'] = $this->serviceType->getAll();

    	return view("admin.service.index",$data);
    }

    public function getEdit(Request $request){
        $data = $this->service->getById($request->id);

        $result = [
            'status' => 1,
            'data' =>  $data,           
        ];

        return response()->json($result);
    }

    public function postEdit(Request $request)
    {
        // dd($request->all());
        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'price' =>$request->price,
            'duration' =>$request->duration,
            'service_type_id' => $request->service_type_id,
        ];   

        $this->service->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        $data['serviceType'] = $this->serviceType->getAll();
        return view('admin.service.add_or_edit',$data);
    }

    public function postAdd(Request $request){ //dd($request->all());       

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' =>$request->description,
            'price' =>$request->price,
            'duration' =>$request->duration,
            'service_type_id' => $request->service_type_id,
        ];

        $this->service->createByArr($arr);

        return redirect()->route('services')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->service->datatable();
    }

    public function delete(Request $request){
        $this->service->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

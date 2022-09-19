<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceType;
use App\Functions\General;

class ServiceTypeController extends Controller
{
	private $serviceType;

    public function __construct(){
    	$this->serviceType = new ServiceType;
    }

    public function index(){
    	return view("admin.service_type.index");
    }

    public function getEdit(Request $request){
        $data = $this->serviceType->getById($request->id);

        $result = [
            'status' => 1,
            'data' =>  $data,           
        ];

        return response()->json($result);
    }

    public function postEdit(Request $request)
    {
        // dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'image' => $image ?? null,
        ];

        if(!isset($image)){
            unset($arr['image']);
        }

        $this->serviceType->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.service_type.add_or_edit');
    }

    public function postAdd(Request $request){ //dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }   

        $arr = [
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'image' => $image ?? null,
        ];

        $this->serviceType->createByArr($arr);

        return redirect()->route('serviceTypes')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->serviceType->datatable();
    }

    public function delete(Request $request){
        $this->serviceType->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

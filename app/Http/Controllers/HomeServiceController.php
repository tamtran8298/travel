<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeService;
use App\Functions\General;

class HomeServiceController extends Controller
{
	private $homeService;

    public function __construct(){
    	$this->homeService = new HomeService;
    }

    public function index(){
    	return view("admin.home_service.index");
    }

    public function getEdit(Request $request){
        $data = $this->homeService->getById($request->id);

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
            'description' => $request->description,
            'image' => $image ?? null,
            'link' => $request->link,
        ];

        if(!isset($image)){
            unset($arr['image']);
        }

        $this->homeService->updateByArr($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.home_service.add_or_edit');
    }

    public function postAdd(Request $request){ //dd($request->all());
        if($request->hasFile('image')){
            $image = General::uploadImage(null,$request->image,null);
        }   

        $arr = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'link' => $request->link,
        ];

        $this->homeService->createByArr($arr);

        return redirect()->route('homeServices')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->homeService->datatable();
    }

    public function delete(Request $request){
        $this->homeService->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

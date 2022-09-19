<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Functions\General;

class FlightController extends Controller
{   
    private $flight;

    public function __construct(){
        $this->flight = new Flight;
    }
    /**
     * $id = 1 home page title     
     */
     public function index(){
        return view("admin.flight.index");
    }

    public function getEdit(Request $request){
        $data = $this->flight->getById($request->id);

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
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'url'  => $request->url,
        ];

       
        

        $this->flight->updateById($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.flight.add_or_edit');
    }

    public function postAdd(Request $request){ //dd($request->all());
          

        $arr = [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'url' => $request->url,
        ];

        $this->flight->createByArr($arr);

        return redirect()->route('flight')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->flight->datatable();
    }

    public function delete(Request $request){
        $this->flight->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
    
}

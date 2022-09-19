<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OurTeam;
use App\Functions\General;

class ourTeamController extends Controller
{
	private $ourTeam;

    public function __construct(){
    	$this->ourTeam = new OurTeam;
    }

    public function index(){
    	return view("admin.our_team.index");
    }

    public function getEdit(Request $request){
        $data = $this->ourTeam->getById($request->id);

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
            'type_name' => $request->type_name,
        ];

        if(!isset($image)){
            unset($arr['image']);
        }

        $this->ourTeam->updateByArr($request->id,$arr);

        $result = [
            'status' => 1,          
        ];

        return response()->json($result);
    }

    public function getAdd(){
        return view('admin.our_team.add_or_edit');
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
            'type_name' => $request->type_name,
        ];

        $this->ourTeam->createByArr($arr);

        return redirect()->route('ourTeam')->with('success','Created successfully');
    }

    public function datatable(){
        return $this->ourTeam->datatable();
    }

    public function delete(Request $request){
        $this->ourTeam->deleteById($request->id);

        $result = [
            'status'=>1
        ];

        return response()->json($result);
    }
}

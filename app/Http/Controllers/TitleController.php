<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;

class TitleController extends Controller
{   
    private $title;

    public function __construct(){
        $this->title = new Title;
    }
    /**
     * $id = 1 home page title     
     */
    public function getEdit($id){
        $data['title'] =  $this->title->findOrFail($id);

        $name = [
            1 => "Home",
        ];

        $data['name'] = $name[$id] ?? null;

    	
    	return view('admin.title.index',$data);
    }

    public function postEdit($id,Request $request){
    	$title = Title::find($id);

        if(!$title){
            $title = $this->title;
        }

        $title->description = $request->description;
        $title->save();

        return back()->with('success','Updated successfully');
    }

    
}

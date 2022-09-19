<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Functions\General;

class BannerController extends Controller
{   
    private $banner;

    public function __construct(){
        $this->banner = new Banner;
    }
    /**
     * $id = 1 home page title     
     */
    public function getEdit($id){
        $data['banner'] =  $this->banner->findOrFail($id);

        $name = [
            1 => "Home",
        ];

        $data['name'] = $name[$id] ?? null;

    	
    	return view('admin.banner.index',$data);
    }

    public function postEdit($id,Request $request){
    	$banner = $this->banner->find($id);

        if(!$banner){
            $banner = $this->title;
        }

        if($request->hasFile('image')){
            $banner->image = General::uploadImage(null,$request->image,null);
        }

        $banner->save();

        return back()->with('success','Updated successfully');
    }

    
}

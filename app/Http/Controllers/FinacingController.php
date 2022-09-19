<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Financing;
use App\Functions\General;

class FinacingController extends Controller
{
    public function getEdit(){
    	$data['data'] = Financing::first() ?? null;

    	return view('admin.financing.index',$data);
    }

    public function postEdit(Request $request){
    	$data = Financing::first();

    	if(!$data){
    		$data = new Financing;
    	}
        $data->description = General::uploadImageSummerNote($request->description);
        $data->save();

        return back()->with('success','Updated successfully');
    }
}

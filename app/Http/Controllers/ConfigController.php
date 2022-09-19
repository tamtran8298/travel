<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Config;
use yajra\Datatables\Datatables;
class ConfigController extends Controller
{
    public function index()
    {
    	return view('admin.config.index');
    }
    public function post_config()
    {
        $config = Config::get();
        return Datatables::of($config)
        ->editColumn('value', function ($row) 
        {
        	return '<span id="'.$row->id.'" value="'.$row->value.'" >'.$row->value.'</span>';
        })
        ->rawColumns(['value'])
        ->make(true);
    }

    public function update_value(Request $request)
    {
    	if($request->value != ""){    		
	        $config = Config::where('id',$request->id)
	                  ->update(['value' => $request->value]);
	        return 1;
    	}
    	else{
    		return 0;
    	}
    	
    }
}

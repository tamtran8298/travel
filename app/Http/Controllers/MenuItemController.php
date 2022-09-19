<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItem;
use Validator;

class MenuItemController extends Controller
{
    //
    public function get_menu(){
    	return view('admin.menu.index');
    }

    public function ajax_load_menu(){
    	$menu = MenuItem::where('parent_id',0)->where('status',1)->with('childs')->orderBy('order','asc')->get();
    	return json_encode($menu);
    }

    public function ajax_update_list_menu(Request $request){
    	$menu = isset($request->data) ? $request->data : 0;
    	$this->__ajax_update_list_menu($menu);
    	return "Update Menu Success";
    }

    private function __ajax_update_list_menu($menu,$order = 0,$parent_id = 0){    	
    	foreach ($menu as $value) {
    		$order++;
    		$MenuItem = MenuItem::find($value['id']);
    		$MenuItem->parent_id = $parent_id;
    		$MenuItem->order = $order;
    		$MenuItem->save();
    		if(array_key_exists('children', $value)){
    			$this->__ajax_update_list_menu($value['children'], $order, $value['id']);
    		}
    	}
    }

    public function ajax_new_and_update_menu_item(Request $request){
    	$validate = Validator::make($request->all(),[
    		'title'=>'required',
    		'url'=>'required',
    	],[

    	]);
    	$error_array = [];
    	$success_output = '';
    	if($validate->fails()){
    		foreach ($validate->messages()->getMessages() as $value) {
    			$error_array[] = $value;
    		}
    	}
    	else{
    		if($request->action == "insert"){
    			$menu = new MenuItem;
    			$menu->title = $request->title;
    			$menu->url = $request->url;
    			$menu->target = $request->target;
    			$menu->class_icon = $request->class_icon;
    			$menu->save();
    			$success_output = "Insert Menu Item Success";
    		}
    		elseif($request->action == "update"){
    			$menu = MenuItem::find($request->id);
    			$menu->title = $request->title;
    			$menu->url = $request->url;
    			$menu->target = $request->target;
    			$menu->class_icon = $request->class_icon;
    			$menu->save();
    			$success_output = "Update Menu Item Success";
    		}
    	}
    	$output = [
    		'error' => $error_array,
    		'success' => $success_output,
    	];
    	echo json_encode($output);
    }

    public function ajax_delete_menu_item(Request $request){
    	$menu = MenuItem::findOrFail($request->id);
    	$menu->status = 0;
	    $menu->save();
	    return "Delete Menu Item Success";    	
    }

    public function ajax_load_menu_item(Request $request){
    	$menu = MenuItem::select('id','title','url','target','class_icon')->findOrFail($request->id);
        return json_encode($menu);
        
    }
}

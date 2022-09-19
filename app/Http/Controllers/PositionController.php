<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\position;
use Yajra\Datatables\Datatables;
use Session;
use Auth;

class PositionController extends Controller
{    
    public function index(){
        return view('admin.position.index');
    }    

    public function datatables_position(){
        $position = position::where('position_delete_status',1)->get();
                    
        
        return Datatables::of($position)
        ->addColumn('action',function($position){ 
            return '<a href="'.route('get_edit_permissions',$position->id).'" class="btn btn-success btn-sm">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$position->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })        
        ->rawColumns(['action'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Add';
        return view('admin.position.add_or_edit',$data);
    }

    public function post_add(Request $request){
        $this->validate($request,[
            'name' =>'required',            
        ],[

        ]);
        $position = new position;
        $position->position_name = $request->name;       

        $position->save();
        return redirect()->route('position-list')->with('success','Add position Success');

    }

    // public function get_edit($id){
    //     $data['name'] = 'Edit';
    //     $data['position'] = position::findOrFail($id);
    //     return view('admin.position.add_or_edit',$data);
    // }

    public function delete(Request $request){ 
        if($request->id){ 
            $position = position::findOrFail($request->id);
            $position->position_delete_status = 0;
            $position->save();
            return "Delete Position Success";
        }
    }

    public function get_edit_permissions($id){

        if(!\Gate::forUser("Position")->denies('permission',"update")){

            return back()->with('error',"You don't have permission!");

        }else{
            $data['name'] = 'Edit';

            $data['position'] = position::findOrFail($id);

            $menu_item_list = Session::get('menu_item_list');

            $permission_list = position::where('id',$id)->first()->position_permission_list;

            $permission_list = json_decode($permission_list,true);

            return view('admin.position.permissions',$data,compact('menu_item_list','id','permission_list'));
        }
        
    }

    public function post_edit_permissions(Request $request,$id){
        $this->validate($request,[
            'permission_name' =>'required',
        ],[

        ]);
        $position = position::find($id);
        $position->position_name = $request->permission_name;        
        // $position->manager_user_id = $request->manager;        
        
        $position->save();
        return back()->with('success','Edit Position Success');
    }

    public function ajax_update_status_permissions(Request $request){ 
        if($request->id){ 
            $position = position::findOrFail($request->id);
            $position->position_permission_status = $request->status;
            $position->save();
            return "Update Permission Status Success";
        }
    }
    public function setPermission(Request $request){

        $permission_list = position::where('id',$request->id)->first()->position_permission_list;

        $permission_list = json_decode($permission_list,true);

        $permission_list[$request->name][$request->permission] = $request->checked;

        if($request->id == Auth::user()->user_position_id)

            Session::put('permission_list_session',$permission_list);

        $permission_list = json_encode($permission_list);

        position::where('id',$request->id)->update(['position_permission_list'=>$permission_list]);

        return "Update Permission Success !";

    }
    public function changePositionName(Request $request){

        position::where('id',$request->id)->update(['position_name'=>$request->name]);
        return "Update Position Name Success !";

    }
}

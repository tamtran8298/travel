<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
        // $check = User::where("email",$request->email)->first();

        // if(isset($check->lever)){
        //     return back()->with("error","login failed");
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->route("product");
        } else {
            return back()->with("error","login failed");
        }
    }

    public function showLogin(){
        return view('admin.auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function index(){        
        return view('admin.user.index');

    }   

    public function edit(){
        return view('admin.user.edit');
    }
    // public function permissionList(){
    //     return view('admin.user.permissions');
    // }
    // public function permissionGroup(){
    //     return view('admin.user.permission_group');
    // }

    public function get_editProfile(){
    	$id = Auth::id();
    	$data['user'] = User::select('username','email','birthday','fullname','state_address','image')->find($id);
    	return view('admin.user.editprofile',$data);
    }

    public function post_editProfile(Request $request){   
      
    	$id = Auth::id();
    	$this->validate($request,[
            'fullname'=>'required',
            // 'city_address'=>'required',
            'state_address'=>'required',            
            'confirm_password' =>'same:new_password',
    	],[

    	]);
    	$user = User::find($id);
        $user->fullname = $request->fullname;
    	$user->birthday = $request->birthday;
    	// $user->city_address = $request->city_address;
    	$user->state_address = $request->state_address;

        if($request->hasFile('avatar')){            
            $img = $request->avatar;
            $img_name = str_random(4)."-".$img->getClientOriginalName();
            if(file_exists('admin/upload/user_profile/'.$user->image)){
                unlink('admin/upload/user_profile/'.$user->image);
            }           
            $img->move('admin/upload/user_profile',$img_name);
            $user->image = $img_name;
        }

        if($request->password && $request->new_password && $request->confirm_password){
            if(\Hash::check($request->password,$user->password)){
                $user->password = bcrypt($request->new_password);
            }else {
                return back()->with('error',"Password don't match");
            }            
        }

    	$user->save();
    	return back()->with('success','Edit profile Success!');
    }

    public function datatables_user(){
        $user = User::select('users.id','users.username','users.email','users.fullname','users.birthday','users.start_date','users.city_address','users.image','users.phone','positions.position_name')
        ->where('user_status',1)
        // ->leftjoin('departments','user_department_id','departments.id')
        ->leftjoin('positions','user_position_id','positions.id')->get();
        
        return Datatables::of($user)
        ->addColumn('action',function($user){ 
            return '<a href="'.route('edit-user',$user->id).'" class="btn btn-success btn-sm">
            <i class="fas fa-edit"></i></a>
                <a href="#" data-id='.$user->id.' class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
        })      

        ->rawColumns(['action'])
        ->make(true);        
    }

    public function get_add(){
        $data['name'] = 'Add';
        // $data['department'] = department::all();
        // $data['position'] = position::all();
        // $data['template_email'] = SmsContentTemplate::select('id','template_title')->get();

        return view('admin.user.add_or_edit',$data);
    }

    public function post_add(Request $request){
        $this->validate($request,[
            'fullname' =>'required',
            'phone' =>'required',
            'username' =>'required|unique:users,username',
            // 'position' =>'required',
            'address' =>'required',
            'birthday' =>'required',
            'start_date' =>'required',
            'email' =>'required|unique:users,email',
            // 'department' =>'required',
            // 'city' =>'required',
        ],[

        ]);
        
        $user = new User;
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = bcrypt("123456");
        // $user->user_position_id = $request->position;
        $user->state_address = $request->address;
        $user->birthday = $request->birthday;
        $user->start_date = $request->start_date;
        $user->email = $request->email;
        // $user->user_department_id = $request->department;
        // $user->city_address = $request->city;
        if($request->hasFile('avatar')){            
            $img = $request->avatar;
            $img_name = str_random(4)."-".$img->getClientOriginalName();                       
            $img->move('assets/upload/user_profile',$img_name);
            $user->image = $img_name;
        }

        $user->save();
        return redirect()->route('user-list')->with('success','Add User Success');

    }

    public function get_edit($id){
        $data['name'] = 'Edit';
        // $data['department'] = department::all();
        // $data['position'] = position::all();
        $data['user'] = User::findOrFail($id);
        return view('admin.user.add_or_edit',$data);
    }

    public function post_edit(Request $request,$id){
        $this->validate($request,[
            'fullname' =>'required',
            'phone' =>'required',
            'username' =>'required|unique:users,username,'.$id,
            // 'position' =>'required',
            'address' =>'required',
            'birthday' =>'required',
            'start_date' =>'required',
            'email' =>'required|unique:users,email,'.$id,
            // 'department' =>'required',
            // 'city' =>'required',
        ],[

        ]);
        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->username = $request->username;
        // $user->user_position_id = $request->position;
        $user->state_address = $request->address;
        $user->birthday = $request->birthday;
        $user->start_date = $request->start_date;
        $user->email = $request->email;
        // $user->user_department_id = $request->department;
        // $user->city_address = $request->city;
        if($request->hasFile('avatar')){            
            $img = $request->avatar;
            $img_name = str_random(4)."-".$img->getClientOriginalName();
            if(file_exists('assets/upload/user_profile/'.$user->image)){
                unlink('assets/upload/user_profile/'.$user->image);
            }           
            $img->move('assets/upload/user_profile',$img_name);
            $user->image = $img_name;
        }
        
        $user->save();
        return back()->with('success','Edit User Success');
    }

    public function delete(Request $request){ 
        if($request->id){ 
            $user = User::findOrFail($request->id);
            // $user->user_status = 0;
            $user->delete();
            return "Delete User Success";
        }
    }
}

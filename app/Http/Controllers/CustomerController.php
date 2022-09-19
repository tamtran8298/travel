<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\customer;
use App\listcustomer;
use App\Functions\General;

class CustomerController extends Controller
{
    public function index(){    
        $data['customer'] = customer::where('status',0)->get();
        return view('admin.customer.index',$data);
    }   
    public function post_edit(Request $request){
        $listcustomer = listcustomer::where('id_user_listcustomer',$request->id)->get();
        $count = listcustomer::where('id_user_listcustomer',$request->id)->count();
        $result = [
            'success' => true,
            'data' =>  $listcustomer, 
            'length' => $count,          
        ];
        return json_encode($result);
    }
    public function success(){
        $data['customer'] = customer::where('status',1)->get();
        return view('admin.customer.success',$data);
    }
    public function delete()
    {
        $data['customer'] = customer::where('status',2)->get();
        return view('admin.customer.delete',$data);
    }
    public function successValue(request $request)
    {
        
        $customer=customer::findOrFail($request->id);
        $customer->status = 1;
        $customer->save();
        return json_encode(['success'=>true]);
    }
    public function deleteValue(request $request)
    {

        $customer=customer::findOrFail($request->id);
        $customer->status = 2;
        $customer->save();
        return json_encode(['success'=>true]);
    }
}

<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Tour;
use Yajra\Datatables\Datatables;
use App\Functions\General;
use Illuminate\Http\Request;
use App\users;
use App\listcustomer;


class CartController extends Controller
{
	public function __construct(){
		
        
        $this->tour= new Tour;
	}
    public function index($idtour){
    	$data = [
    		'ValueTour'=>$this->tour->getValueByID($idtour)
    	];
    	return view("website.cart.demo",$data);
    }
    public function demo(){
        return view("website.cart.list");
    }
    public function add(Request $request){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 

        for ($i = 0; $i < 5; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
        } 
        $this->validate($request,[
            
        ],[

        ]);
        $user = new users;
        $user->name = $request->contact_name;
        $user->email = $request->email;
        $user->phone = $request->mobilephone;
        $user->address = $request->address;
        $user->adult = $request->adult;
        $user->children11 = $request->children11;
        $user->children = $request->children;
        $user->small_children = $request->small_children;
        $user->guests = $request->guests;
        $user->note = $request->note;
        $user->id_tour = $request->idtour;
        $user->id_user_listcustomer=$randomString;
        
        $user->total = $request->TotalAllPrice;
        $user->save();

        for($i =1 ;$i<=$request->guests;$i++)
        {

        
        $people = new listcustomer;
        $fullname = "fullname".$i;
        $gender = "gender".$i;
        $personkind = "personkind".$i;
        $valuePerson="";
        $loaiphuthuphongdon = "loaiphuthuphongdon".$i;
        $valueroom="";     
        $people->name= $request->$fullname;
        $people->id_user_listcustomer=$randomString;
        $people->gender =$request->$gender;
        // $people->date_birth=0;
        if($request->$personkind ==1)
            $valuePerson="Người lớn";
        if($request->$personkind ==0.8)
            $valuePerson="Trẻ em";
        if($request->$personkind ==0.1)
            $valuePerson="Trẻ nhỏ";
        if($request->$personkind ==0.05)
            $valuePerson="Em bé";
        $people->personkind = $valuePerson;
        if($request->$loaiphuthuphongdon==0)
            $valueroom="Không";
        else
            $valueroom="Phòng đơn";
        $people->clone_room=$valueroom;
        $day="dobday".$i;
        $month="dobmonth".$i;
        $year="dobyear".$i;
        $valueyear=$request->$year;
        $valuemont=$request->$month;
        $valueday=$request->$day;
        $birth= $valueyear."-".$valuemont."-".$valueday;
        $people->date_birth=$birth;
        $price = "spanprice1".$i;
        $people->price=$request->$price;
        $people->save();
        }

        // $message="Đăng kí Tour thành công, chúng tôi sẽ liên lạc cho bạn sau ";

        return redirect()->route("website.home");



    }
    public function list()
    {
        return view('website.cart.1');
    }
}

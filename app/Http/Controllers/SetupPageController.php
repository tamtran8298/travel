<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Contact;
use App\About;
use App\Logo;
use App\Functions\General;

class SetupPageController extends Controller
{
    public function getBanner(){
    	return $this->runGetBanner(1,"Home");
    }

    public function postBanner(Request $request){
    	return $this->runPostBanner($request,1);
    }

    public function getContentBanner(){
        return $this->runGetBanner(2,"Content Home");
    }

    public function postContentBanner(Request $request){
        return $this->runPostBanner($request,2);
    }

    public function getCategoryBanner(){
        return $this->runGetBanner(3,"Category");
    }

    public function postCategoryBanner(Request $request){
        return $this->runPostBanner($request,3);
    }

    public function getContactBanner(){
        return $this->runGetBanner(4,"Contact");
    }

    public function postContactBanner(Request $request){
        return $this->runPostBanner($request,4);
    }

    public function getAboutBanner(){
        return $this->runGetBanner(5,"About");
    }

    public function postAboutBanner(Request $request){
        return $this->runPostBanner($request,5);
    }

    public function getCustomerBanner(){
        return $this->runGetBanner(6,"Customer");
    }

    public function postCustomerBanner(Request $request){
        return $this->runPostBanner($request,6);
    }

    public function getDetailBanner(){
        return $this->runGetBanner(7,"Detail");
    }

    public function postDetailBanner(Request $request){
        return $this->runPostBanner($request,7);
    }

    public function getContact(){
    	$data['contact'] = Contact::first();
    	return view('admin.setup_page.contact',$data);
    }

    public function postContact(Request $request){
    	$contact = Contact::first();
    	if(!$contact){
    		$contact = new Contact;
    	}
    	$contact->address = $request->address;
    	$contact->phone = $request->phone;
    	$contact->email = $request->email;
    	// $contact->mission = $request->mission;
        $description = $request->mission;
        $contact->mission = General::uploadImageSummerNote($description);
    	$contact->map = $request->map;
    	
        $contact->save();
        return back()->with('success','Update Contact Success!');
    }

    public function getAbout(){
    	return $this->runGetCustomPage(1,"Giới thiệu");
    }

    public function postAbout(Request $request){
    	return $this->runPostCustomPage(1,$request);
    }

    public function getCustomer(){
        return $this->runGetCustomPage(2,"Khách hàng");
    }

    public function postCustomer(Request $request){
        return $this->runPostCustomPage(2,$request);
    }

    public function getLogo(){
    	$data['logo'] = Logo::first();
    	return view('admin.setup_page.logo',$data);
    }

    public function postLogo(Request $request){
    	$logo = Logo::first();
    	if(!$logo){
    		$logo = new Logo;
    	}
    	$logo->title = $request->title;

    	if($request->hasFile('image')){
    		$logo->image = General::uploadImage($request->hasFile('image'),$request->image,$logo->image);
    	}    	
    	
        $logo->save();
        return back()->with('success','Update Logo Success!');
    }
    /**
     * $id = 1 home top banner
     * $id = 2 home bottom banner     
     * $id = 3 category banner     
     * $id = 4 contact banner     
     * $id = 5 about banner     
     * $id = 6 customer banner     
     * $id = 7 detail banner     
     */
    private function runGetBanner($id,$name){
        $data['banner'] = Banner::find($id);
        $data['name'] = $name;
        return view('admin.setup_page.banner',$data);
    }

    private function runPostBanner($request, $id){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'image',
        ],[

        ]);
        $banner = Banner::find($id);
        if(!$banner){
            $banner = new Banner;
        }
        $banner->title = $request->title;
        // $banner->description = $request->description;
        $description = $request->description;
        $banner->description = General::uploadImageSummerNote($description);

        if($request->hasFile('image')){
            $banner->image = General::uploadImage($request->hasFile('image'),$request->image,$banner->image);
        }       
        
        $banner->save();
        return back()->with('success','Update Banner Success!');
    }
    /**
     * $id = 1 about custom
     * $id = 2 customer custom     
     */
    private function runGetCustomPage($id,$name){
        $data['about'] = About::find($id);
        $data['name'] = $name;
        return view('admin.setup_page.custom',$data);
    }

    private function runPostCustomPage($id,Request $request){
        $cutomer = About::find($id);
        if(!$cutomer){
            $cutomer = new About;
        }
        $detail = $request->content;
        $cutomer->content = General::uploadImageSummerNote($detail);

        $cutomer->save();
        return back()->with('success','Update Success!');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = "tour";

    public function getByTypeTourId($request){

        return $this->select('tour.*')
                ->join('type_tour','type_tour.id','tour_TypeTour_id')->where('type_tour.id',$request)->get();
    }
    public function getDescriptionById($id){
        $description = tour::find($id);
        $description = $description->description;
        return $description;
    }
    public function getPrice($id){
        $price = tour::find($id);
        return $price->price;
    }
    public function getImgById($id){
        
        $value=tour::find($id);
        $img= $value->image;
        return $img;
    }
    public function getNameById($id){

        $value=tour::find($id);
        $name= $value->name;
        return $name;
    }
    public function getById($id){
        return $this->where('status','1')->where('id',$id)->first();
    }
    public function getTourIDById($id){

        $value=tour::find($id);
        $TourID= $value->tour_id;
        return $TourID;
    }
    public function getValueByID($id)
    {
        $value=tour::find($id);
        return $value;
    }
    public function getByStar($id){
        $value=tour::find($id);
        $idtypetour= $value->tour_TypeTour_id;
        $query = $this->where('tour_TypeTour_id',$idtypetour)->orderby('star','DESC')->get();
       return $query;
    }

    public function getAll(){
        return $this->all();
    }


    public function getTourByNum($num ,$id){
        return $this->where('status',1)->where('tour_TypeTour_id',$id)->take($num)->get();
    }
     public function search($request)
    
    {

        $tour = tour::where('name','like','%'.$request->key.'%')
                ->orwhere('price','like',$request->key)->get();
        return $tour;

        // return $this->select('tour.*')->where('name','like','%'.$request->key.'%')
        //         ->orwhere('price','like',$request->key)->get();
    }
     public function filter($request)
    {
    
        $place=isset($_GET['Place_start']) ? $_GET['Place_start'] : '';
        $type=isset($_GET['TypeTour']) ? $_GET['TypeTour'] : '';
        $price=isset($_GET['price']) ? $_GET['price'] : '';
        if($price==1)
        {
            $price_max=3000000;
            $price_min=1000000;
        }
        if($price==2)
        {
            $price_max=5000000;
            $price_min=3000000;
        }
        if($price==3)
        {
            $price_max=7000000;
           $price_min=5000000;
        }
        if($price==4)
        {
            $price_max=9000000;
            $price_min=7000000;
        }
        if($price==5)
        {
            $price_max=100000000;
            $price_min=9000000;
        }
        $tour = tour::where('tour_TypeTour_id','like',$type)
                ->where('place_start','like',$place)
                ->where( 'price', '>' , $price_min  )
                ->where( 'price', '<' , $price_max  )
                ->get();
        return $tour;
    }
    public function getPriceMinMax($price){


         if($price==1)
        {
            $price_max=3000000;
            $price_min=1000000;
        }
        if($price==2)
        {
            $price_max=5000000;
            $price_min=3000000;
        }
        if($price==3)
        {
            $price_max=7000000;
           $price_min=5000000;
        }
        if($price==4)
        {
            $price_max=9000000;
            $price_min=7000000;
        }
        if($price==5)
        {
            $price_max=100000000;
            $price_min=9000000;
        }

        return [
            'min'=>$price_min ?? null ,
            'max'=>$price_max ?? null
        ] ;

    }

    // public function getPlaceStart($now){
    //     return $this->select('place_start')->WhereDate('date_start','>=',$now)->distinct('place_start')->where('status',1)->get();
    // }
    public function getPlaceStart(){
        // return $this->select('place_start')->WhereDate('date_start','>=',$now)->distinct('place_start')->where('status',1)->get();
        return $this->select('place_start')->distinct('place_start')->where('status',1)->get();
    }
}

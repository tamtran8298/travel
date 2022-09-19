<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use App\SlideTitle;
use App\HomeService;
use App\OurTeam;
use App\Title;
use App\Banner;
use App\TypeTour;
use App\Tour;
use Carbon\Carbon;


class HomeController extends Controller
{

	private $slide;
    private $slideTitle;
    private $homeService;
    private $title;

	public function __construct(){
        $this->typetour = new TypeTour;
		$this->slide = new Slide;
        $this->slideTitle = new SlideTitle;
        $this->homeService = new HomeService;
        $this->ourTeam = new OurTeam;
        $this->title = new Title;
        $this->banner = new Banner;
        $this->typetour = new TypeTour;
        $this->tour= new Tour;

	}

    public function index(){
    	$data = [
    		'slide' => $this->slide->getAll(),
            'slideTitle' => $this->slideTitle->getAll(),
            'homeService' => $this->homeService->getByNumber(4),
            'ourTeam' => $this->ourTeam->getByNumber(2),
            'title' => $this->title->find(1) ?? null,
            'banner' => $this->banner->find(1) ?? null,
            'typetour' =>$this->typetour->getAll(),
            'alltour' =>$this->tour->getAll(),
            'tour'=>$this->tour->getByTypeTourId(1),
    	];
        return view("website.home.index",$data);
    }
    public function countTour($tourId){
        $number = $this->tour->where('tour_TypeTour_id',$tourId)->count();
        return $number;
    }
    public function loadMore(Request $request){
        $arr=[];
        $take = 3 ;
        $skip=$request->page * $take;

        $data = $this->typetour->skip($skip)->take($take)->where('status',1)->get();

          foreach ($data as $value) {
            $arr[] = $this->countTour($value->id); 
        }
        $result = ['status'=> 1 ,'data' => $data , 'count'=>$arr];

        return response()->json($result);
    }

    public function loadMoreTour (Request $request){
        $take = 4;
        $skip = $request->page * $take ;

        $data = $this->tour->select(
            'tour.*','type_tour.name as nametype'
        )
        ->where('tour.status',1)->skip($skip)->take($take)
        ->join('type_tour','tour.tour_TypeTour_id','type_tour.id')
        ->where('tour_TypeTour_id',$request->typetour);

        if($request->place_start ){
            $price=   $this->tour->getPriceMinMax($request->price);
             $data =  $data->where('place_start',$request->place_start)
             ->where('price','<=',$price['max'])->where('price','>=',$price['min']);
        } 
         $data =  $data->get();
        $result = ['status'=>1 , 'data'=>$data ];
        
        return response()->json($result);

    }

    public function search($name , $date , $tourId){

        $dateCb1 =  Carbon::parse ($date);
        $dateCb2 =  Carbon::parse ($date);


        $endDate = $dateCb1->addDays(2);

        $startDate = $dateCb2->subDays(1);


        // dd( $endDate ."|| ". $startDate);
        $data['tour'] = $this->tour->where('tour_TypeTour_id',$tourId)
        ->where('date_start','>=',$startDate)
        ->where('date_start','<=',$endDate)
        ->where('slug','like','%'.str_slug($name).'%')
        ->get();
        // dd($data);
        return view('website.search.searchtour',$data);
    }
    

}

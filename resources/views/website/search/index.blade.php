{{-- <@php
{{use App\TypeTour}}
@endphp
 --}}


@extends("website.layouts.master")
@section("content")




<div class="destination_banner_wrap overlay">

</div>



    


        <div class="popular_places_area">

        <div class="container">
            <h3 style="margin-bottom: 10px; font-family: -webkit-body; font-weight:  bolder;">Tìm Thấy {{ count($tour) }} Tour: </h3>
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="filter_result_wrap">
                        <h3>Tìm Kiếm:</h3>
                        <div class="filter_bordered">
                            <form action="{{ route('website.filter') }}" method="get">
                            <div class="filter_inner">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        
                                        <div class="single_select">
                                            <h3 style="margin-bottom: 10px; font-family: -webkit-body; font-weight:  bolder;">Loại Tour</h3>
                                            <select name="TypeTour">

                                                 @foreach ($type_tour as $element)
                               <option 
                               @if(isset($tour->tour_type_tour_id))
                               @if ($tour->tour_type_tour_id == $element->id)
                                 {{'selected'}}
                               @endif 
                               @endif
                               value="{{$element->id}}">{{$element->name}}</option>
                           @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <h3 style="margin-bottom: 10px; font-family: -webkit-body; font-weight:  bolder;">Nơi khởi hành</h3>
                                            <select name="Place_start">
                                                
                                                <option value="Hà Nội">Hà Nội</option>
                                                <option value="TP Hồ Chí Minh">TP Hồ CHí Minh</option>
                                              </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="single_select">
                                            <h3 style="margin-bottom: 10px; font-family: -webkit-body; font-weight:  bolder;">Điểm Đến</h3>
                                            <select>
                                                <option data-display="Travel type">Điểm Đến</option>
                                                <option value="1">advance</option>
                                                <option value="2">advance</option>
                                                <option value="4">premium</option>
                                              </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <h3 style="margin-bottom: 10px; font-family: -webkit-body; font-weight:  bolder;">Giá</h3>
                                            <select name="price">
                                                
                                                <option value="1">Từ 1 - 3 triệu</option>
                                                <option value="2">Từ 3 - 5 triệu</option>
                                                <option value="3">Từ 5 - 7 triệu</option>
                                                <option value="4">Từ 7 - 9 triệu</option>
                                                <option value="5">Trên 9 triệu</option>
                                              </select>
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-lg-12">
                                        <div class="range_slider_wrap">
                                            <span class="range">Prise range</span>
                                            <div id="slider-range"></div>
                                            <p>
                                                <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-weight:400;">
                                            </p>
                                        </div>
                                    </div> --}}
                                </div>


                            </div>

                            <div class="reset_btn">
                                <button class="boxed-btn4" type="submit">Tìm</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                            
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($tour as $value)
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                     <img src="{{asset($value->image)}}" alt="">
                                    <a href="{{ asset("destination").'/'.$value->id }}" class="prise">{{ $value->price }} VNĐ</a>
                                </div>
                                <div class="place_info">
                                    <a href="{{ asset("destination").'/'.$value->id }}"><h3>{{$value->name}}</h3></a>
                                    

                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i>
                                             <a href="#">(20 Review)</a>
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-clock-o"></i>
                                            <a href="#">{{ $value->tour_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <a class="boxed-btn4" href="#">More Places</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- newletter_area_start  -->
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter_text">
                                <h4>Subscribe Our Newsletter</h4>
                                <p>Subscribe newsletter to get offers and about
                                    new places to discover.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="Your mail" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newletter_area_end  -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>More Places</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset('website/img/place/1.png')}}" alt="">
                            <a href="#" class="prise">$500</a>
                        </div>
                        <div class="place_info">
                            <a href="#"><h3>California</h3></a>
                            <p>United State of America</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">5 Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset('website/img/place/2.png')}}" alt="">
                            <a href="#" class="prise">$500</a>
                        </div>
                        <div class="place_info">
                            <a href="#"><h3>Korola Megna</h3></a>
                            <p>United State of America</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">5 Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset('website/img/place/3.png')}}" alt="">
                            <a href="#" class="prise">$500</a>
                        </div>
                        <div class="place_info">
                            <a href="#"><h3>London</h3></a>
                            <p>United State of America</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#">5 Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
    </script>
    
    
@endsection
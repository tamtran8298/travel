@extends("website.layouts.master")
@section("content")
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Cam Ranh</h3>
                            <p>Sự Hiếu Khách Và Thân Thiện</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Hội An</h3>
                            <p>Không Khí Bình Yên Nhẹ Nhàng</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Nha Trang</h3>
                            <p>Thành Phố Du Lịch Biển Nổi Tiếng Nhất Việt Nam</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->
<!-- where_togo_area_start  -->
<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3>Where you want to go?</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form"  id="searchTour-form"  method="get"   action="#">
                        <div class="input_field">
                            <input type="text   " class="searchName" placeholder="Where to go?"  required="">
                        </div>
                        <div class="input_field">
                            <input id="datepicker" class="searchDate" placeholder="Date" required="">
                        </div>
                        <div class="input_field">
                            <select class="searchType">
                           
                                @foreach ($typetour as $element)
                                    <option data-display="{{ $element->name}}" value="{{ $element->id}}">{{ $element->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 searchTour" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->
<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Điểm Đến Phổ Biến</h3>
                    <p>Hơn 125 bãi biển, 22 di sản thế giới được UNESCO công nhận, hơn 3.000 cảnh quan và khu di tích được công nhận là di sản quốc gia, 8 khu dự trữ sinh quyển thế giới,... </p>
                </div>
            </div>
        </div>
        <div class="row " id='loadHere'>
            @foreach($typetour as $key=>$value )
            @if ($key >2 )
                @break
                {{-- expr --}}
            @endif
            {{-- <a href="{{ asset("type").'/'.$value->id }}"> --}}
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination" data-url="{{ asset("type").'/'.$value->id }}">
                        <div class="thumb">
                            <img src="{{$value['image']}}" alt="">
                        </div>
                        <div class="content">
                            {{-- <p class="d-flex align-items-center">{{ $value['name'] }} <a href="seael_destination.html"> 07 Places</a> </p> --}}
                            <p class="d-flex align-items-center">
                                <a href="{{ asset("type").'/'.$value->id }}">{{ $value['name'] }}</a>
                                {{-- <a href="{{ asset("type").'/'.$value->id }}"> {{ count($value) }} Places</a> </p> --}}
                            <?php
                            $count=0;
                            ?>
                            @foreach ($alltour as $key)
                            <?php
                            
                                
                                if(($key->tour_TypeTour_id)==($value->id))
                                    $count++;
                               
                            ?>
                            @endforeach
                            <a href="{{ asset("type").'/'.$value->id }}">{{ $count }} Places</a> </p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="more_place_btn text-center ">
                <button class="boxed-btn4 load-more" page='1'>More Places</button>
            </div>
        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->
<!-- newletter_area_end  -->
<div class="video_area video_bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video_wrap text-center">
                    <h3>Enjoy Video</h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=M2o-AnFChT4">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{ asset ('website/img/svg_icon/1.svg') }}" alt="">
                    </div>
                    <h3>Hành trình thoải mái</h3>
                    <p>Tạo cảm giác thoải mái nhất cho khách hàng trong mỗi chuyến đi</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{ asset ('website/img/svg_icon/2.svg') }}" alt="">
                    </div>
                    <h3>Khách sạn sang trọng</h3>
                    <p>Lựa chọn khách sạn tốt nhất đảm bảo sự hài lòng của khách hàng</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="{{ asset ('website/img/svg_icon/3.svg') }}" alt="">
                    </div>
                    <h3>Hướng dẫn viên du lịch</h3>
                    <p>Vui vẻ, nhiệt tình, thân thiện với khách hàng </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial_area  -->
<div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('website/img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Micky Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('website/img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Tom Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="{{asset('website/img/testmonial/author.png')}}" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Jerry Mouse</h3>
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
<!-- /testimonial_area  -->
<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Recent Trips</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('website/img/trip/1.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('website/img/trip/2.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="{{asset('website/img/trip/3.png')}}" alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>Oct 12, 2019</span>
                        </div>
                        <a href="#">
                            <h3>Journeys Are Best Measured In
                                New Friends</h3>
                        </a>
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
                                        <input type="email" placeholder="Your mail">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit">Subscribe</button>
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
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // alert('sds');
    $('.single_destination').css('cursor', 'pointer');
    $('.single_destination').on('click', function() {
        var url = $(this).attr('data-url');
        // alert(url);
        window.location = url;
    });
});
$(document).on('submit','#searchTour-form', function(e){
    e.preventDefault();
    
   
    var name = $(".searchName").val();
    var date = $(".searchDate").val();

    var date = new Date(date);
    date = date.toISOString().substring(0, 10) ;

    var typetour = $(".searchType").find("option:selected").val();
    var url = "/searchtour/"+ name + "/" + date + "/" + typetour ;
     window.location = url;


});
$(document).on('click', '.load-more', function (){
    var page = $(this).attr('page');

    $.ajax({
        url: "{{ route('loadMore') }}",
        method: 'get',
        dataType: 'json',
        data: { page: page },
        success: function(data) {
            if (data.status) {
                var html = "";
                $(this).attr('page', page + 1);
                for (var i = 0; i < data.data.length; i++) {

                    html = html + '  <div class="col-lg-4 col-md-6"> '+
                    '<div class="single_destination" data-url="/type/'+ data.data[i].id +'">'+
                       ' <div class="thumb">'+
                            '<img src="'+ data.data[i].image +'" >'+
                        '</div>'+
                        '<div class="content">'+
                     
                            '<p class="d-flex align-items-center">'+
                                '<a href="/type/'+ data.data[i].id +'"> '+ data.data[i].name +'</a>'+
                                
                        
                            '<a href=""> '+data.count[i]+' Places</a>  </p>'+
                        '</div>'+
                    '</div>'+
                '</div>';

                 }
                $('#loadHere').append(html);
            }
       }
    });
});

</script>
@endsection
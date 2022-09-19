
@extends("website.layouts.master")
@section("content")

 <link href="{{ asset('admin/vendor/toastr/toastr.min.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

    <div class="destination_banner_wrap overlay">
        <div class="destination_text text-center">
            <h3>Saintmartine Iceland</h3>
            <p>Pixel perfect design with awesome contents</p>
        </div>
    </div>





<div class="destination_details_tour_info">

        <div class="container">
            <div class="row {{-- justify-content-center --}}">
                <div class="col-lg-6">
                    <div class="destination_info">
                        <img src="{{asset($img)}}" width="500"  height="600">
                    </div>
                </div>
                    <div class="col-lg-6">
                    <div class="destination_price">
                    <h3 class="ten_sp">{!!$name!!}</h3>

                    <div style="margin-bottom: 20px;">
                
                    <div class="ratings" id="star" onclick="postformstar()"></div>
                 
                
                <form id="formstar" role="form" method="post" enctype="multipart/form-data">
            @csrf

                <p id="numratingsaa" >{{ $ValueTour->numratings }} đánh giá</p>
                <hr style="margin-top: 10px;margin-bottom: 10px;border-color: #eae8e8;">
                
                 <input id="rating-value" name="valuestar" type="text" hidden="">
                 </form>
                    <div class="clearfix"></div>
                    </div>
                    <div class="row m-5">
                    <div class="col-sm-6 p5">
                    <p><i class="fa fa-barcode" aria-hidden="true"></i> MÃ TOUR: {{ $ValueTour->tour_id }}</p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Thời gian: {{ $ValueTour->tour_date }} Ngày</p>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Ngày khởi hành: 
                        {{ $ValueTour->date_start }}</p>
                    </div>
                    <div class="col-sm-6 p5">
                    <p><i class="fa fa-car" aria-hidden="true"></i> Phương tiện di chuyển: {{ $ValueTour->transport }}</p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Nơi khởi hành: {{ $ValueTour->place_start }}</p>
                    <p><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="https://hoangkhoitravel.com/index.php?com=search&textsearch=tour-du-lich-phu-quoc-3-ngay-2-dem"><b>Ngày khác</b></a></p>
                    </div>
                    </div>

                    <hr style="margin-top: 10px;margin-bottom: 10px;border-color: #eae8e8;">
                    <div class="row m-10">
                    <div class="col-sm-8">
                    <p style="margin-bottom: 0px;"><b>GIÁ TOUR:</b> <strong class="gia-tour">  {{ number_format($ValueTour->price) }}</strong> vnđ<br>
                    
                    </div>
                    <div class="col-sm-4">
                    <form method="post" action="https://hoangkhoitravel.com/gio-hang.html" class="check-cart row">
                    <input class="form-control" type="hidden" value="1" name="soluong1" />
                    <input type="hidden" name="id" value="36">
                    <input type="hidden" name="url" value="https://hoangkhoitravel.com/tour-du-lich-phu-quoc-3-ngay-2-dem.html?fbclid=IwAR243iJmm7hHmLymUVNIP16CqrSxYzlW66OjppuR3PRlKeS2zQkjbPjkjn8">
                    <div class="">
                    <a href="{{ asset(("cart").'/'.$ValueTour->id) }}">
                    <button type="button" data-toggle="modal" data-target="#myModal" name="addcart" class="btn-cart form-control" >Đặt chỗ</button>
                    </a>
                    </div>
                    </form>
                    </div>
                    </div>
                    <hr style="margin-top: 10px;margin-bottom: 10px;border-color: #eae8e8;">
                    <div style="font-size: 15px;color: red;">
                    <i class="fa fa-phone" aria-hidden="true"></i> Hotline hỗ trợ 24/7: <strong>(028) 6660 1616 - 0962.111.247</strong>
                    <div class="pull-right xs-none">
                    <div class="fb-like" data-href="https://hoangkhoitravel.com/tour-du-lich-phu-quoc-3-ngay-2-dem.html?fbclid=IwAR243iJmm7hHmLymUVNIP16CqrSxYzlW66OjppuR3PRlKeS2zQkjbPjkjn8" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>


    <div class="destination_details_tour_info" >
        <div class="container">
            <div class="row {{-- justify-content-center --}}">
                <div class="col-lg-12 col-md-12">
                    <div class="destination_info">
                        {!!$description!!}
                    </div>
                </div>                    
                </div>
            </div>
        </div>
    
    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    
                    <div class="bordered_1px"></div>
                    <div class="contact_join">
                        <h3>Đóng góp ý kiến</h3>
                        <form role="form" id="submitForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" name="name" placeholder="Họ tên" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_input">
                                        <input type="text" name="phone" required="" placeholder="Số điện thoại">
                                        <input type="text" name="id_tour" value="{{ $ValueTour->id }}" hidden="" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <textarea name="note" required="" cols="30" rows="10"placeholder="Ý kiến đóng góp" ></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn4" type="submit" >gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                <p>Subscribe newsletter to get offers aynd about
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
                <?php
                $num =1;
                ?>
                @foreach($listtour as $value)
                <?php
                if($num>3)
                    break;
                $num++;
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                                <div class="thumb">
                                     <img src="{{asset($value->image)}}" alt="">
                                    <a href="{{ asset("destination").'/'.$value->id }}" class="prise">{{ number_format($value->price) }} VNĐ</a>
                                </div>
                                <div class="place_info">
                                    <a href="{{ asset("destination").'/'.$value->id }}"><h3>{{$value->name}}</h3></a>
                                    {{-- <p>{{ $nameType }}</p> --}}
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                             <div class="ratings"> 
                                                <?php
                                                 $star = $value->star;
                                                 for($i=1;$i<=5;$i++)
                                                 {
                                                    
                                                    if($i <= $star)
                                                    {
                                                ?>
                                                        <span class="fa fa-star "></span>
                                                <?php 
                                                    }
                                                    else 
                                                    { ?>
                                                        <span class="fa fa-star-o"></span>
                                                <?php
                                                    }
                                                    
                                                    
                                                  }
                                                 ?>
                                                <a href="#">{{ $value->numratings }} Đánh giá</a>
                                            </div>
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
        </div>
    </div>

<script type="text/javascript">

    function postformstar()
    {
        $('#formstar').submit();
    }

 var star= parseFloat({{$ValueTour->star}});
 html='';
 for (var i=1;i<=5;i++)
 {
    if(i<=star)
    {
        html+='<span class="fa fa-star "></span>';
    }
    else
    html+='<span class="fa fa-star-o"></span>';
 }
 document.getElementById("star").innerHTML = html;

 const stars=document.querySelector(".ratings").children;
 const ratingValue=document.querySelector("#rating-value");
 let index;

  
  for(let i=0; i<stars.length; i++){
    stars[i].addEventListener("mouseover",function(){
         // console.log(i)
         for(let j=0; j<stars.length; j++){
            stars[j].classList.remove("fa-star");           
            stars[j].classList.add("fa-star-o");            
         }
         for(let j=0; j<=i; j++){
            stars[j].classList.remove("fa-star-o");         
           stars[j].classList.add("fa-star");           
         }
    })
    stars[i].addEventListener("click",function(){
        // postform();
      ratingValue.value=i+1;
      
      index=i;
      

      
      
    })
    stars[i].addEventListener("mouseout",function(){
         
         for(let j=0; j<stars.length; j++){
            stars[j].classList.remove("fa-star");           
            stars[j].classList.add("fa-star-o");            
         }
         for(let j=0; j<star; j++){
            stars[j].classList.remove("fa-star-o");   
            stars[j].classList.add("fa-star");  
                  
                    
         }
    })
  }
     
     $("#submitForm").on("submit", function(e) {
        e.preventDefault();
        var form = $('#submitForm')[0];
        var form_data = new FormData(form);
        $.ajax({
            url: "{{ route('website-postform')}}",
            method: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    toastr.success("Cảm ơn bạn đã đóng góp ý kiến!");
                }
            },
            error: function() {
                toastr.error("Xin lỗi, ý kiến đóng góp của bạn chưa được gửi đến hệ thống!");
            }
        });
    });
        
</script>

<script src="{{ asset('admin/vendor/toastr/toastr.min.js') }}"></script>
@endsection
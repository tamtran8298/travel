{{-- @php
$postType = new \App\PostType;
$getPostType = $postType->getAll();
$productType = new \App\Category;
$getProductType = $productType->getAll();
$logo = \App\Logo::first();
// echo $getProductType;die;
@endphp --}}
@php
    $flight = new \App\Flight;
    $flight = $flight->getAll();
@endphp

<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ URL::route('website.home') }}">
                                        <img src="{{asset('website/img/logo.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="{{ URL::route('website.home') }}">home</a></li>
                                            <li><a href="{{ URL::route('website.about') }}">About</a></li>
                                            {{-- <li><a class="" href="travel_destination.html">Destination</a></l/li> --}}
                                            {{-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="destination_details.html">Destinations details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li> --}}
                                            <li><a href="{{ URL::route('website.blog') }}">blog {{-- <i class="ti-angle-down"> --}}</i></a>
                                                
                                            </li>
                                            <li><a href="#">Flight {{-- <i class="ti-angle-down"> --}}</i></a>
                                                <ul class="submenu">

                                                    @foreach ($flight as $element)
                                                        <li><a href="{{ route('website.flight',$element->slug) }}">{{ $element->name }}</a></li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </li>
                                            <li><a href="{{ URL::route('website.contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <a href="tel:0337361333"> <i class="fa fa-phone" style="color: red"></i>0337361333</a>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="https://www.instagram.com/"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="https://www.linkedin.com/"> <i class="fa fa-linkedin"></i> </a></li>
                                            <li><a href="https://facebook.com/"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="https://googleplus.com/"> <i class="fa fa-google-plus"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>


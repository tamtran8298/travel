@extends("website.layouts.master")
@section('content')
<div class="ro-section">
    <div class="container">
        <ul class="ro-shop-tab-controler">
            {{-- <li><a href="#ro-shop-spa" data-toggle="tab">SPA</a></li> --}}
            <li class="active"><a href="#ro-shop-beauty" data-toggle="tab">{{$category->name}}</a></li>
            {{-- <li><a href="#ro-shop-yoga" data-toggle="tab">YOGA</a></li> --}}
        </ul>
        <div id="ro-shop-tab" class="tab-content">
            <div id="ro-shop-beauty" class="tab-pane fade active in">
                <div class="row">
                    @foreach ($product as $element)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="ro-shop-tab-item hover-image">
                            <div class="ro-image"><img src="{{loadImage($element->image)}}" alt="product">
                                {{-- <div class="ro-overlay">
                                    <div class="ro-overlay-inner ro-cell-vertical-wrapper">
                                        <div class="ro-cell-middle"><a href="cart.html"><i class="icon-ecommerce-cart"></i></a><a href="#"><i class="icon-basic-heart"></i></a></div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="ro-content"><a href="{{ route('website.product',$element->slug) }}">
                                    <h5>{{$element->name}}</h5>
                                </a>
                                <h3 class="ro-color-main">${{number_format($element->price)}}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav class="text-center ro-section-mb-small">
                    {!!$product->links()!!}
                    {{-- <ul class="pagination clearfix">
                        <li><a href="#"><i class="icon-arrows-slim-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="icon-arrows-slim-right"></i></a></li>
                    </ul> --}}
                </nav>
            </div>
        </div>
        @endsection

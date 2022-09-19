@extends("website.layouts.master")
@section('content')
<div class="ro-section">
    <div class="ro-product-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ro-title">
                        <h4>PRODUCT:</h4>
                    </div>
                </div>
            </div>
            <div class="row ro-product-wrapper">
                <div class="col-md-5 col-sm-9 col-xs-12">
                    <div class="ro-product-image">
                        <div id="Ro_zoom_image" class="ro-image"><img src="{{loadImage($product->image)}}" data-zoom-image="{{loadImage($product->image)}}" alt="Product Item" class="ro-zoom-image-0" /></div>
                        {{-- <div class="ro-footer clearfix"><a href="cart.html">
                                <div>ADD TO CART</div>
                            </a><a href="#">
                                <div>Share</div>
                            </a>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-md-1 col-sm-3 col-xs-12 ro-product-option-wrapper">
                    <div data-mcs-theme="minimal-dark" id="Ro_gallery_0" class="ro-product-option mCustomScrollbar"><a href="#" data-image="assets/images/product-img-large.jpg" data-zoom-image="assets/images/product-img-large.jpg"><img src="assets/images/product-img-small.jpg" alt="zoom image" class="ro-zoom-image-0" /></a><a href="#" data-image="assets/images/product-img-large2.jpg" data-zoom-image="assets/images/product-img-large2.jpg"><img src="assets/images/product-img-small2.jpg" alt="zoom image" class="ro-zoom-image-0" /></a><a href="#" data-image="assets/images/product-img-large3.jpg" data-zoom-image="assets/images/product-img-large3.jpg"><img src="assets/images/product-img-small3.jpg" alt="zoom image" class="ro-zoom-image-0" /></a></div>
                </div> --}}
                <div class="col-md-6 col-xs-12">
                    <div class="ro-product-information">
                        <div class="ro-head">
                            <h4>{{$product->name}}</h4>
                            <h2>$ {{number_format($product->price)}}</h2>
                        </div>
                        {{-- <form class="ro-body">
                            <div class="ro-colour">
                                <div>
                                    <p>Colour:</p>
                                </div>
                                <div>
                                    <label class="ro-type-1">
                                        <input type="radio" name="item-1" value="color 1" checked="checked" /><span></span>
                                    </label>
                                    <label class="ro-type-2">
                                        <input type="radio" name="item-1" value="color 2" /><span></span>
                                    </label>
                                    <label class="ro-type-3">
                                        <input type="radio" name="item-1" value="color 3" /><span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="ro-rate">
                                <div>
                                    <p>Rating:</p>
                                </div>
                                <div data-rating='3' class="ro-rating"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                            </div>
                            <div class="ro-size">
                                <div>
                                    <p>Size:</p>
                                </div>
                                <div>
                                    <label>
                                        <input type="radio" value="S" name="size1" checked="checked" /><span>S</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="M" name="size1" /><span>M</span>
                                    </label>
                                    <label>
                                        <input type="radio" value="L" name="size1" /><span>L</span>
                                    </label>
                                </div>
                            </div>
                            <div class="ro-quantity">
                                <div>
                                    <p>Quantity:</p>
                                </div>
                                <div>
                                    <input type="number" name="quantity1" value="2" />
                                </div>
                            </div>
                            <div class="ro-note clearfix">
                                <p>Online shopping is not currently offered in your market. Please visit your local H&amp;M store for availability.<br />Please note that some products, colors and sizes shown Online may not be available in your country or store. Prices can differ between online and the stores</p>
                            </div>
                        </form> --}}
                        <hr>
                        <div class="ro-footer">
                            <h6>DESCRIPTION</h6>
                            <p>{!!$product->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ro-product-relate">
                <div class="col-xs-12">
                    <div class="ro-divide"></div>
                </div>
                <div class="col-xs-12">
                    <h4>ALSO MAY YOU LIKE</h4>
                </div>
                <div class="ro-content clearfix">
                    @foreach ($random6product as $element)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="ro-image"><a href="{{ route('website.product',$element->slug) }}">
                                <div><img src="{{loadImage($element->image)}}" alt="{{$element->name}}" /></div>
                            </a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

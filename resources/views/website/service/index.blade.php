@extends('website.layouts.master')
@section('content')
<div class="ro-section ro-padding-top">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-8 col-lg-offset-2 ro-section-mb-big">
                <div class="ro-quote-content text-center">
                    <q>&nbsp;When you have once seen the glow of happiness on the face of a beloved person, you know that a man can have<br class="hidden-sm hidden-xs" />no vocation but to awaken that light on the faces surrounding him. In the depth of winter,<br />I finally learned that within me there lay an invincible summer.&nbsp;</q>
                    <div class="ro-author-name">_ Albert Camus _</div>
                </div>
            </div> --}}
            @foreach ($service as $key => $element)
            @php
            $classImage = NULL;
            $col = NULL;
            if ($key/2 != 0){
            $classImage = 'ro-bg-right';
            $color = 'ro-bgc-trans-1';
            } else {
            $col = 'col-md-offset-4';
            $color = 'ro-bgc-trans-5';
            }
            @endphp
            <div class="col-xs-12 ro-section-mb-big">
                <div style="background-image: url('{{loadImage($element['service_type_image'])}}')" class="ro-service-fullwidth clearfix {{$classImage ?? NULL}}">
                    <div class="row">
                        <div class="ro-service-list col-md-8 {{$col ?? NULL}} ">
                            <h3 class="ro-hr-heading">{{$element['service_type_title']}}</h3>
                            <ul class="{{$color ?? NULL}}">
                                @foreach ($element['services'] as $elementServices)
                                <li>
                                    <div class="ro-service">{{$elementServices['title']}} ({{$elementServices['duration']}} mins)</div>
                                    <div class="ro-separator"> </div>
                                    <div class="ro-price">${{number_format($elementServices['price'])}}</div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-xs-12 ro-section-mb-big">
                <div style="background-image: url('assets/images/service-fullwidth2.jpg')" class="ro-service-fullwidth clearfix ro-bg-right">
                    <div class="row">
                        <div class="ro-service-list col-md-8">
                            <h3 class="ro-hr-heading">Facial Treatments</h3>
                            <ul class="ro-bgc-trans-1">
                                <li>
                                    <div class="ro-service">Full Body Massage (55 mins)</div>
                                    <div class="ro-separator"> </div>
                                    <div class="ro-price">$78</div>
                                </li>
                                <li>
                                    <div class="ro-service">Add on: Deep Tissue Massage (per area)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$25</div>
                                </li>
                                <li>
                                    <div class="ro-service">Hot Stone Massage (55 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$73</div>
                                </li>
                                <li>
                                    <div class="ro-service">Maternity Massage (55 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$50</div>
                                </li>
                                <li>
                                    <div class="ro-service">Delux Seated Massage (20 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$23</div>
                                </li>
                                <li>
                                    <div class="ro-service">Regular Seated Massage (10 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$10</div>
                                </li>
                                <li>
                                    <div class="ro-service">Body Polish (1 hr)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$68</div>
                                </li>
                                <li>
                                    <div class="ro-service">Sea Mud Wrap (1 hr)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$78</div>
                                </li>
                                <li>
                                    <div class="ro-service">The Ultimate Body Treatment (1hr 50 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$100</div>
                                </li>
                                <li>
                                    <div class="ro-service">Full Body Massage (55 mins)</div>
                                    <div class="ro-separator"></div>
                                    <div class="ro-price">$78</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

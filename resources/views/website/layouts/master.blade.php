
<!DOCTYPE html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/slicknav.css')}}">
{{--     <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css')}}">
 --}}
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}"> -->
    @yield('styles')
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    @include("website/layouts/header")
    <!-- header-end -->

    <!-- slider_area_start -->
    @yield('content')

    @include("website/layouts/footer")

    


  
    <!-- link that opens popup -->
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js')}}"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js')}}"> </script> -->
    <!-- JS here -->
    <script src="{{asset('website/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('website/js/popper.min.js')}}"></script>
    <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('website/js/ajax-form.js')}}"></script>
    <script src="{{asset('website/js/waypoints.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('website/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('website/js/scrollIt.js')}}"></script>
    <script src="{{asset('website/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('website/js/wow.min.js')}}"></script>
    <script src="{{asset('website/js/nice-select.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/js/plugins.js')}}"></script>
    <script src="{{asset('website/js/gijgo.min.js')}}"></script>
    <script src="{{asset('website/js/slick.min.js')}}"></script>
   

    
    <!--contact js-->
    <script src="{{asset('website/js/contact.js')}}"></script>
    <script src="{{asset('website/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.form.js')}}"></script>
    <script src="{{asset('website/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('website/js/mail-script.js')}}"></script>


    <script src="{{asset('website/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        });
    </script>
    @yield('scripts')
</body>

</html>


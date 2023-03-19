<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title> 
<link href="{{asset('images/help.png')}}" rel="icon">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor_/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('vendor_/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor_/mdi-font/css/material-design-iconic-font.min.css') }} " rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor_/bootstrap-4.1/bootstrap.min.css') }} " rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href=" {{ asset('vendor_/animsition/animsition.min.css') }} " rel="stylesheet" media="all">
    <link href=" {{ asset('vendor_/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }} " rel="stylesheet" media="all">
    <!-- <link href=" {{ asset('vendor_/wow/animate.css') }} " rel="stylesheet" media="all"> -->
   <!-- <link href=" {{ asset('vendor_/css-hamburgers/hamburgers.min.css') }} " rel="stylesheet" media="all"> -->
    <link href=" {{ asset('vendor_/slick/slick.css') }} " rel="stylesheet" media="all">
    <!-- <link href="{{ asset('vendor_/select2/select2.min.css') }}" rel="stylesheet" media="all"> -->
    <link href="{{ asset('vendor_/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="animsition">

<div class="page-wrapper">
     <!-- MENU SIDEBAR-->
      @include('pages.RepPages.partials.menu')
     <!-- END MENU SIDEBAR-->

     <!-- PAGE CONTAINER-->
     <div class="page-container">
         <!-- HEADER DESKTOP-->
         @include('pages.RepPages.partials.header')
         <!-- HEADER DESKTOP-->

         <!-- MAIN CONTENT-->
         <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

         @yield('content')
         

        
                     <!--
                        footer section
                     -->
         </div>
         </div>
        </div>
        @include('pages.RepPages.partials.footer')
        </div>
       </div>
       
   
    <!-- Jquery JS-->
    <script src="{{ asset('vendor_/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor_/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor_/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
   <!--  <script src="{{ asset('vendor_/slick/slick.min.js') }}">
    </script> -->
    <!-- <script src="{{ asset('vendor_/wow/wow.min.js') }}"></script> -->
    <script src="{{ asset('vendor_/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor_/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
        <script src="{{ asset('vendor_/chartjs/Chart.bundle.min.js') }}"></script>

   <!--
     <script src="{{ asset('vendor_/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor_/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor_/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor_/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor_/select2/select2.min.js') }}">
    </script>
   -->

    <!-- Main JS-->
    <script src="{{ asset('js/main_.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
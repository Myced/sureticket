<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bus Booking System in Cameroon ">
    <meta name="author" content="T N CEDRIC">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/site/assets/images/favicon.html">
    <title>Sure Ticket - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/site/assets/css/bootstrap.css">

    @yield('styles')

    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/site/assets/css/motive/motive-tourist.css">

    <script src="/site/assets/js/modernizr.custom.js">
    </script>
  </head>
  <body class="cssAnimate ct-headroom--scrollUpMenu">
    <div class="ct-preloader">
      <div class="ct-preloader-content"></div>
    </div>
        @include('site.includes.navmobile')
    <div class="ct-reserveTicket">
      <div class="ct-reserveTicket-body">
        <div class="ct-reserveTicket-icon">
          <div class="ct-reserveTicket-iconBackground"><i class="fa fa-ticket"></i></div>
        </div>
        <div class="ct-reserveTicket-text"><a href="itinerary.html"><span class="ct-reserveTicket-title text-uppercase">Reserve your tickets</span><span class="text-capitalize">Plan your visit</span></a></div>
      </div>
    </div>
    <div id="ct-js-wrapper" class="ct-pageWrapper">
      <div class="ct-navbarMobile"><a href="index-2.html" class="navbar-brand"><img src="/site/assets/images/demo-content/guide-tour/logo.png" alt="Mobile Logo"></a>
        <button type="button" class="navbar-toggle"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      @include('site.includes.topbar')
      @include('site.includes.navigation')

      <!-- page content  -->
      @yield('content')
      <!-- end page content -->

      @include('site.includes.footer')
    </div>
    @include('site.includes.scripts')
    @yield('scripts')
    <script src="/site/assets/js/isotope/init.js"></script>
  <!-- switcher -->


</body>

</html>

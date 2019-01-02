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

    @yield('strongstyle')

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


  <!-- switcher -->

  @if(isset($register) && $register == true)
  <!-- register modal -->
  <form class="" action="#" method="post" id="signup" >
      @csrf
      <div class="modal" id="register" style="z-index: 1100">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close"
                          data-target="#register" data-toggle="modal">
                          &times;
                      </button>

                      <h3 class="modal-title">
                          <span class="text-primary">
                              <i class="fa fa-user"></i>
                              User Sign Up
                          </span>
                      </h3>
                  </div>

                  <div class="modal-body">

                      <div class="row">
                          <div class="col-md-12">
                              <div class="">
                                  <div class="callout callout-info">
                                      <strong>Tip!!</strong>
                                      All Fields marked with * are required
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>
                                      Full Names:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>

                                  <input type="text" class="form-control " name="name" required="true"
                                         placeholder="E.g Folef Richard" id="name">
                                  <span class="help-block .text">
                                  </span>
                              </div>

                              <div class="form-group">
                                  <label>
                                      Telephone:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>

                                  <input type="tel" class="form-control  "
                                      name="tel" required
                                         placeholder="670-989-859">
                                     <span class="help-block .text">
                                     </span>
                              </div>

                              <div class="form-group">
                                  <label> Email:
                                            <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>
                                  <input type="email" class="form-control" name="email" id="email"
                                         placeholder="example@email.com" required>
                                     <span class="help-block .text">
                                     </span>

                              </div>

                              <div class="form-group">
                                  <label>
                                      ID Card Number:
                                  </label>

                                  <input type="text" class="form-control " name="idcard"
                                         placeholder="E.g 1123475" id="name">
                                  <span class="help-block .text">
                                  </span>
                              </div>
                          </div>
                      </div>


                      <h3 class="page-header">Account Information</h3>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label> Username:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>

                                  <input type="text" class="form-control "
                                        name="username" id="username" required>
                                    <span class="help-block .text">
                                    </span>
                              </div>

                              <div class="form-group">
                                  <label>
                                      Password:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>

                                  <input type="password" class="form-control" name="password"
                                   id="password" minlength="4" required>

                                   <span class="help-block .text">
                                   </span>

                              </div>

                              <div class="form-group">
                                  <label> Repeat Password:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>

                                  <input type="password" class="form-control" name="password-repeat"
                                    id="rpassword" required>

                                    <span class="help-block .text">
                                    </span>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="modal-footer">
                      <button class="btn btn-primary btn-flat" id="sign-up-btn"
                              type="submit">
                          <i class="fa fa-thumbs-up"></i>
                          Sign Up
                      </button>

                      <button class="btn btn-danger btn-flat" type="button"
                          data-dismiss="modal">
                          <i class="fa fa-times"></i>
                          Cancel
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </form>
  <!-- end register modal -->
  @endif

  @if(isset($login) && $login == true)
  <!-- login modal  -->
  <form class="" action="{{ route('login') }}" method="post" id="signin">
      @csrf

      <div class="modal" id="login" style="z-index: 1100">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">
                          &times;
                      </button>

                      <h3 class="modal-title">
                          <span class="text-primary">
                              <i class="fa fa-sign-in"></i>
                              Login
                          </span>
                      </h3>
                  </div>

                  <div class="modal-body">

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group col-sm-12" id="group">
                                  <label> Username:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>
                                  <input type="text" class="form-control has-error" name="username" id="username">

                              </div>

                              <div class="form-group col-sm-12">
                                  <label> Password:
                                      <span class="text-danger" style=" font-family: serif;">*</span>
                                  </label>
                                  <input type="password" class="form-control" name="password" id="password" minlength="6">

                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="modal-footer">
                      <button class="btn btn-primary btn-flat" id="sign-in-btn"
                              type="submit">
                          <i class="fa fa-sign-in"></i>
                          Login
                      </button>

                      <button class="btn btn-danger btn-flat" role="close"
                          data-dismiss="modal">
                          <i class="fa fa-times"></i>
                          Cancel
                      </button>
                  </div>
              </div>
          </div>
      </div>

  </form>
  <!-- end login modal -->
  @endif

</body>

@include('site.includes.scripts')
@yield('scripts')
<script src="/site/assets/js/isotope/init.js"></script>

</html>

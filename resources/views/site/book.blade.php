@extends('site.layout')

@section('title')
{{  __('Book Bus')  }}
@endsection


@section('content')
<header id="home" data-stellar-background-ratio="0.3"
    data-height="230" data-type="parallax"
    data-background="/site/assets/images/home/book_ticket.jpg" data-background-mobile="./assets/images/demo-content/guide-tour/header-mini8.jpg" class="ct-mediaSection">
<div class="ct-breadcrumbs">
    <ul class="list-inline list-unstyled text-uppercase">
        <li>
            <a href="index-2.html">
                <i class="fa fa-home"></i>
            </a>
            <i class="fa fa-angle-right"></i>
            Book Bus
        </li>
    </ul>
</div>
</header>

<section class="ct-u-paddingTop80 ct-u-paddingBottom90">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom50">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">
                Enter Your source and Destination
            </h4>
    </div>

    <div class="ct-js-googleMap--contact ct-u-marginBottom50"></div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{ route('bus.search') }}" method="get">
                    

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group input--withIcon">
                                <span class="input-icon">
                                    <i class="fa fa-envelope"></i>
                                </span>

                              <input type="text" required="" name="source" class="form-control input-lg input-border"
                                  placeholder="Enter Source">
                            </div>

                            <br>

                            <div class="input-group input--withIcon">
                                <span class="input-icon">
                                    <i class="fa fa-envelope"></i>
                                </span>

                              <input type="text" required="" name="destination" class="form-control input-lg input-border"
                                  placeholder="Enter Destination">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">
                                Search Bus
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection

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
            Busses : {{ request()->source }} - {{ request()->destination }}
        </li>
    </ul>
</div>
</header>

<section class="ct-u-paddingTop80 ct-u-paddingBottom90">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom50">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">
                Search Results
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
                                  placeholder="Enter Source" value="{{ request()->source }}">
                            </div>

                            <br>

                            <div class="input-group input--withIcon">
                                <span class="input-icon">
                                    <i class="fa fa-envelope"></i>
                                </span>

                              <input type="text" required="" name="destination" class="form-control input-lg input-border"
                                  placeholder="Enter Destination" value="{{ request()->destination }}">
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

        <!-- //bus rows  -->
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>S/N</th>
                        <th>Agency</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Faire</th>
                        <th>No Seats</th>
                        <th>Action</th>
                    </tr>

                    @if(count($routes) == 0)
                    <tr>
                        <th class="text-center text-primary" colspan="10">
                            <strong>
                                No Buses Found
                            </strong>
                        </th>
                    </tr>
                    @else
                    <?php $count = 1; ?>
                        @foreach($routes as $route)
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> {{ $route->getAgency()->name }} </td>
                                <td> {{ $route->from_name }} </td>
                                <td> {{ $route->to_name }} </td>
                                <td> {{ $route->price }} </td>
                                <td> {{ $route->getBus()->seats }} </td>
                                <td>
                                    <a href="{{ route('bus.book', ['id' => $route->id]) }}"
                                        class="btn btn-primary">
                                        Book Now
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </table>
            </div>
        </div>
    </div>
</section>

@endsection

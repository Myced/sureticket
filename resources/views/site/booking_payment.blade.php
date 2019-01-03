@extends('site.layout')

@section('title')
{{  __('Payment Method')  }}
@endsection

@section('strongstyle')
    <link rel="stylesheet" href="/site/assets/css/AdminLTE.css">
    <style media="screen">
        .text-underline
        {
            text-decoration: underline;
        }

        .btn-flat
        {
            border-radius: 0px;
        }

        .f-20
        {
            font-size: 20px;
        }

        .f-16
        {
            font-size: 16px;
        }

        .btn-ced
        {

            box-shadow: -3px 7px 6px black;
            transition: 1s;
        }

        .btn-ced:hover, .btn-ced:focus
        {
            background-color: rbga(0,0,0, 0.5);
            border: 2px solid #5bc0de !important;
        }

        .btn-mtn
        {
            background-color: #ffca06;
            color: white;
        }

        .btn-orange
        {
            background-color: #ff6600;
            color: #fff;
        }

        .btn-visa
        {
            background-color: #00618f;
        }

        .ct-reserveTicket
        {
            display: none;
        }
    </style>
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
            Select Payment Method
        </li>
    </ul>
</div>
</header>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Select Payment Method</h3>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="ct-infoBox ct-infoBox--vertical ct-u-marginBottom70">
                <div class="ct-infoBox-description">
                    <h3 class="ct-infoBox-title">Route Details</h3>
                    <div class="ct-divider--doubleBorder"></div>

                    <ul class="list-unstyled ct-list--WithIcons ct-u-marginBottom30">
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">Agency : <strong> {{ $route->getAgency()->name }} </strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon"> From : <strong>{{ $route->from_name }}</strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">To : <strong>{{ $route->to_name }}</strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon"> Price : <strong> {{ number_format($route->price) }} FCFA </strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon"> Bus No : <strong> {{ $route->getBus()->number }} </strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon"> No of Seats : <strong> {{ $route->getBus()->seats }} </strong> </li>
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon"> Depature Time : <strong> 10 pm </strong> </li>
                    </ul>
                </div>

                <div class="ct-infoBox-image">

                </div>
            </div>
        </div>

        <div class="col-ms-12 col-md-4">
            <h3>Selected Seats</h3>

            <br>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>S/N</th>
                        <th>Seat No</th>
                        <th>Price</th>
                    </tr>

                    <?php $total = 0; $count = 0; ?>

                    @foreach($booking->bookings() as $book)
                    <tr>
                        <td> {{ ++$count }} </td>
                        <td> <strong>{{ $book->seat_no }}</strong> </td>
                        <td> {{ number_format($book->price) }} <?php $total += $book->price; ?> </td>
                    </tr>
                    @endforeach

                    <tr>
                        <th colspan="2" class="text-center">Sub Total </th>
                        <th> {{ number_format($total) }} FCFA </th>
                    </tr>

                    <tr>
                        <th colspan="2" class="text-center">Booking Fee</th>
                        <th> {{ $fee }} FCFA </th>
                    </tr>

                    <tr>
                        <th colspan="2" class="text-center">Total</th>
                        <th> {{ number_format($total + $fee) }} FCFA </th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">Select Payment Method</h3>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-primary f-20 text-bold ">
                        Total : <span class="text-underline"> {{ number_format($total + $fee) }} FCFA </span>
                    </h3>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4> Pay With:</h4>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6 ">
                    <a href="{{ route('booking.payment.momo', ['code' => $booking->code]) }}"
                        class="btn btn-block btn-flat btn-mtn f-16">
                        MTN Mobile Money
                    </a>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6 ">
                    <a href="{{ route('booking.payment.orange', ['code' => $booking->code]) }}"
                        class="btn btn-block btn-flat btn-orange f-16">
                        Orange Money
                    </a>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6 ">
                    <a href="{{ route('booking.payment.visa', ['code' => $booking->code]) }}"
                        class="btn btn-block btn-flat btn-visa f-16">
                        Visa Payment
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<br><br>

<!-- //create account modal -->



<!-- //login modal  -->

@endsection

@section('scripts')
<!-- <script type="text/javascript" src="/site/js/signup.js"></script> -->
<script type="text/javascript" src="/site/assets/plugin/bootstrap-notify.js"></script>

@include('site.includes.notification')

@endsection

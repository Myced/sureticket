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

        .list-group-item:first-child
        {
            border-radius: 0px;
        }

        .list-group-item:last-child
        {
            border-radius: 0px;
        }

        .momo-input
        {
            font-size: 24px;
            color: #000;
            padding: 10px;
            font-family: serif;
            text-align: center;
        }

        .loading {
    		width: 100%;
    		background: rgba(77, 177, 246, 0.7);
    		bottom: 0;
    		left: 0;
    		position: fixed;
    		right: 0;
    		top: 0;
    		z-index: 9998;
    	}


    	.spinner {
    		background: rgba(255, 255, 255, 0.0)
    		url("/site/assets/images/loader.gif") 0 0
    		no-repeat;
    		border: 0;
    		-webkit-border-radius: 36px;
    		-moz-border-radius: 36px;
    		border-radius: 36px;
    		box-shadow: 0 1px 1px -1px #fff;
    		display: block;
    		height: 250px;
    		left: 30%;
    		top: 20%;
    		margin: -23px 0 0 -23px;
    		opacity: 0.88;
    		overflow: hidden;
    		padding: 1px;
    		position: fixed;
    		text-align: center;
    		width: 250px;
    		z-index: 9999;
    	}

    	.loading-message
    	{
    		font-family: sans-serif;
    		font-size: 30px;
    		color: #13077a;
    		padding-top: 60px;
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

<div class="loading" style="display: none;" id="loading">
  <div class="spinner">
	  <h2 class="loading-message">Processing Payment...</h2>
  </div>
</div>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                Booking ({{ $booking->code }}) Payment
            </h3>
        </div>
    </div>
</div>

<br>
<div class="container-fluid">
    <div class="row">

        <!-- //proces payment  -->
        <?php $total = 0; ?>



        <div class="col-md-4 col-sm-12">
            <ul class="list-group">
                <li class="active list-group-item">
                    Booking Fee <strong>({{ $fee }})</strong>
                </li>
                <li class="list-group-item">
                    Travel Expense <strong>({{ number_format($booking->total) }})</strong>
                </li>
            </ul>

            <br>

            <ul class="list-group">
                <li class="list-group-item">
                    Name : <strong> {{ $user->name }} </strong>
                </li>
                <li class="list-group-item">
                    Booking Code : <strong> {{ $booking->code }} </strong>
                </li>
                <li class="list-group-item">
                    Agency : <strong> {{ $route->getAgency()->name }} </strong>
                </li>
                <li class="list-group-item">
                    Bus Number : <strong> {{ $route->getBus()->number }} </strong>
                </li>
                <li class="list-group-item">
                    Seat(s) :
                    <?php $bookings = $booking->bookings(); $count = 0; $num = count($bookings); ?>
                    <strong>
                        @foreach($bookings as $book)
                            <?php $count++ ?>
                            {{ $book->seat_no }}
                            @if($count != $num)
                                {{ ", " }}
                            @endif
                        @endforeach
                    </strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 col-sm-12">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">Pay Booking Fee</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('booking.payment', ['code' => $booking->code]) }}"
                        class="btn btn-info btn-flat ">
                        <i class="fa fa-chevron-left"></i>
                        Change Payment Method
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <img src="/site/assets/images/momo_image.jpeg" alt="Momo Picture">
                </div>
            </div>

            <br>
            <div class="row">


                <p class="text-center f-20">  Amount : <strong>{{ $fee }} FCFA</strong> </p>

                <p class="text-center">Enter Phone Number</p>

                <div class="col-xs-8 col-xs-offset-2">
                    <input type="text" name="momo" value="{{ $user->tel }}"
                        id="number" class="form-control momo-input"
                         placeholder="Enter Phone Number">

                    <input type="hidden" name="code" id="code" value="{{ $booking->code }}">
                    <input type="hidden" name="user" id="user" value="{{ $user->user_id }}">
                    <input type="hidden" name="__token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="type" value="fee" id="type">
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <button type="button" name="button" id="pay"
                    class="btn btn-block btn-flat btn-mtn f-16">
                        Pay Now
                    </button>
                </div>
            </div>

        </div>
    </div>
    <br><br>
</div>


@endsection

@section('scripts')
<!-- <script type="text/javascript" src="/site/js/signup.js"></script> -->
<script type="text/javascript" src="/site/assets/plugin/bootstrap-notify.js"></script>

@include('site.includes.notification')

<script type="text/javascript">
    $(document).ready(function(){
        $pay = $("#pay");
        var code = $("#code").val();
        var user = $("#user").val();
        var token = $("#token").val();
        var type = $("#type").val();
        var number = '';

        $pay.click(function(){
            //get the number
            number = $("#number").val();

            Loading();

            //validate the phone number
            if(isValidNumber(number))
            {
                //perform post request to pay
                $.ajax({
                    url : '/api/payment/momo',
                    method : 'post',
                    data : { _token:token, code:code, user:user, number:number, type:type },
                    error : function(e)
                    {
                        console.log(e);
                        showNotification("error", "Cannot make Payment <br> Please check internet connection");
                    },
                    success : function(data)
                    {
                        console.log(data);
                    }
                })
            }
        });


        function isValidNumber(number)
        {
            //remove all spaces and others then count the leng

            var length = number.length;

            if(length < 9)
            {
                showNotification('error', 'Number cannot be less than 9 digits');
                return false;
            }
            else if(length > 9)
            {
                showNotification('error', 'Number cannot be greater than 9 digits');
                return false;
            }

            if(isNaN(number))
            {
                showNotification('error', "Number should contain only numbers");
                return false;
            }

            return true;
        }

        function Loading()
        {
            $(".loading").toggle();
        }
    })
</script>

@endsection

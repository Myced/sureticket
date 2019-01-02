@extends('site.layout')

@section('title')
{{ __('Select Seat') }}
@endsection

@section('styles')
<link rel="stylesheet" href="/site/assets/plugin/jquery.seat-charts.css">
<style>
body {
	font-family: 'Roboto', sans-serif;
	  background-color:#fafafa;
	}
	a {
		color: #b71a4c;
	}
	.front-indicator {
		width: 145px;
		margin: 5px 32px 15px 32px;
		background-color: #f6f6f6;
		color: #adadad;
		text-align: center;
		padding: 3px;
		border-radius: 5px;
	}

	.booking-details {
		float: left;
		text-align: left;
		margin-left: 35px;
		font-size: 12px;
		position: relative;
		height: 401px;
	}
	.booking-details h2 {
		margin: 25px 0 20px 0;
		font-size: 17px;
	}
	.booking-details h3 {
		margin: 5px 5px 0 0;
		font-size: 14px;
	}
	div.seatCharts-cell {
		color: #182C4E;
		height: 25px;
		width: 25px;
		line-height: 25px;

	}
	div.seatCharts-seat {
		color: #FFFFFF;
		cursor: pointer;
	}
	div.seatCharts-row {
		height: 35px;
	}
	div.seatCharts-seat.available {
		background-color: #3a78c3;

	}
	div.seatCharts-seat.available.first-class {
	/* 	background: url(vip.png); */
		background-color: #3a78c3;
	}
	div.seatCharts-seat.focused {
		background-color: #76B474;
	}
	div.seatCharts-seat.selected {
		background-color: #f4988e;
	}
	div.seatCharts-seat.unavailable {
		background-color: #472B34;
	}
	div.seatCharts-container {
		border-right: 1px dotted #adadad;
		width: 300px;
		padding: 20px;
		float: left;
	}
	/* div.seatCharts-legend {
		padding-left: 0px;
		position: absolute;
		bottom: 16px;
	} */
	ul.seatCharts-legendList {
		padding-left: 0px;
	}
	span.seatCharts-legendDescription {
		margin-left: 5px;
		line-height: 30px;
	}
	.checkout-button {
		display: block;
		margin: 10px 0;
		font-size: 14px;
	}
	#selected-seats {
		max-height: 200px;
		overflow: auto;
	}
	.list-group-item
	{
		font-size: 16px;
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

<div class="loading" style="display: none;" id="loading">
  <div class="spinner">
	  <h2 class="loading-message">Completing Booking...</h2>
  </div>
</div>

<div class="preloader themed-background active">
    <div class="active" id="preloader">
		<h1 class="push-top-bottom text-light text-center"><strong>SURETICKET</strong></h1>
	    <div class="inner">
	        <h3 class="text-light visible-lt-ie10"><strong>Validating your booking..</strong></h3>
	        <div class="preloader-spinner hidden-lt-ie10"></div>
	    </div>
    </div>
</div>


<header id="home" data-stellar-background-ratio="0.3"
    data-height="230" data-type="parallax"
    data-background="/site/assets/images/home/book_ticket.jpg" data-background-mobile=".//site/assets/images/demo-content/guide-tour/header-mini8.jpg" class="ct-mediaSection">
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

<section class="ct-u-paddingTop80 ct-u-paddingBottom90 ">
    <div class="row">
        <div class=" col-sm-12 col-md-4">
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

        <div class="col-sm-12 col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-capitalize ct-u-colorMotive ct-u-marginBottom30">
                        Select Your Seat
                    </h3>
                </div>
            </div>

            <br>
            <div class="row">
                <div class=" col-xs-12 col-md-4">
                    <div id="seat-map">
                        <div class="front-indicator">Front</div>
                    </div>

                </div>

                <div class="col-xs-12 col-md-5" >
                    <div class="booking-details">
                        <h4 class="page-header">Booking Details</h4>
						<br>
                        <h5> Selected Seats (<span id="counter">0</span>):</h5>
						<br>

                        <ul id="selected-seats" class="list-group">
                        </ul>

                        <h2>
							Total: <b>FCFA <span id="total">0</span></b>
						</h2>

						<!-- hidden field for the cookie and user id  -->
						<input type="hidden" name="user" id="cookie" value="{{ $cookie }}">
						<input type="hidden" name="xrf" value="{{ csrf_token() }}" id="csrf">
						<input type="hidden" name="assigned" value="{{ $route->id }}" id="assigned">
						@csrf
						@if($user == "")
							<input type="hidden" name="user" id="user" value="">
						@else
							<input type="hidden" name="user" id="user" value="{{ $user->user_id }}">
						@endif


                        <button class="checkout-button btn btn-primary" id="checkout">
							Confirm and Pay &raquo;
						</button>

                    </div>
                </div>

				<div class="col-xs-12 col-md-3" >
					<div class="row">
						<div class="col-md-12">
							<h4 class="page-header">Color Code</h4>
							<div id="legend"></div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="/site/assets/plugin/jquery.seat-charts.min.js"></script>
<script type="text/javascript">
var firstSeatLabel = 1;

    $(document).ready(function() {
            var $cart = $('#selected-seats'),
                $counter = $('#counter'),
                $total = $('#total'),
                sc = $('#seat-map').seatCharts({
                map: [
                    'aa_aa',
                    'aa_aa',
                    'aa_aa',
                    'aa_aa',
                    'aa___',
                    'aa_aa',
                    'aa_aa',
                    'aa_aa',
                    'aaaaa',
                ],
                seats: {
                    a: {
                        price   : 5000,
                        classes : 'Available', //your custom CSS class
                        category: 'Available'
                    },
                    s: {
                        price   : 5000,
                        classes : 'selected', //your custom CSS class
                        category: 'Selected Seat'
                    }

                },
                naming : {
                    top : false,
                    getLabel : function (character, row, column) {
                        return firstSeatLabel++;
                    },
                },
                legend : {
                    node : $('#legend'),
                    items : [
                        [ 'a', 'available',   'Available' ],
                        [ 's', 'selcted',   'Selected Seat'],
                        [ 'f', 'unavailable', 'Already Booked']
                    ]
                },
                click: function () {
                    if (this.status() == 'available') {
                        //let's create a new <li> which we'll add to the cart items
                        $('<li class="list-group-item"> Seat # '+this.settings.label+': <b>XAF '+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                            .attr('id', 'cart-item-'+this.settings.id)
                            .data('seatId', this.settings.id)
							.data('seatNo', this.settings.label)
                            .appendTo($cart);

                        /*
                         * Lets update the counter and total
                         *
                         * .find function will not find the current seat, because it will change its stauts only after return
                         * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                         */
                        $counter.text(sc.find('selected').length+1);
                        $total.text(recalculateTotal(sc)+this.data().price);

                        return 'selected';
                    } else if (this.status() == 'selected') {
                        //update the counter
                        $counter.text(sc.find('selected').length-1);
                        //and total
                        $total.text(recalculateTotal(sc)-this.data().price);

                        //remove the item from our cart
                        $('#cart-item-'+this.settings.id).remove();

                        //seat has been vacated
                        return 'available';
                    } else if (this.status() == 'unavailable') {
                        //seat has been already booked
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });

            //this will handle "[cancel]" link clicks
            $('#selected-seats').on('click', '.cancel-cart-item', function (e) {
                //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here

				//prevent normal anchor link behaviours
				e.preventDefault();

				sc.get($(this).parents('li:first').data('seatId')).click();
            });

            //let's pretend some seats have already been booked
            sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');

			$('#checkout').click(function(){

				//initialise everything first
				var selectedSeatCount = 0
				var selectedSeats = [];

				//cookie and user id
				var cookie = $("#cookie").val();
				var user = $("#user").val();
				var csrf = $("#csrf").val();
				var assigned = $("#assigned").val();

				$cart.children().each(function(e, n){

					selectedSeatCount++;

					var seatId = $(this).data('seatId');
					var seatNo = $(this).data('seatNo');

					var currentSeat = [seatId, seatNo];
					selectedSeats.push(currentSeat);
				});

				//if the count is still zero then no seat has been selected
				if(selectedSeatCount === 0)
				{
					alert('You must select a seat to continue');
				}
				else {
					Loading();

					//perform an ajax request()
					$.ajax({
						'url' : '/api/book',
						'method' : 'post',
						'dataType' : 'text',
						data: {
							_token:csrf,
							cookie: cookie,
							user: user,
							assigned: assigned,
							seats : selectedSeats
						},
						error: function(error){
							Loading();
							console.log(error.responseText);
						},
						success: function(data){
							Loading();
							console.log(data);

							//parse the result
							var resultObject = $.parseJSON(data);

							var status = resultObject.status;
							var message = resultObject.message;
							var code = resultObject.code;

							//toast the success or failure message
							if(status == 'success')
							{
								var confirmMessage = "Your seats have been booked. Please " +
											" go ahead and Pay to confirm your booking";
								alert(confirmMessage);

								window.location.href = '/booking/' + code;

							}
							else {
								alert('Failed to Book your seats');
								alert(message);
							}
						}
					});
				}
			});


			//other jquery functions
			$("#load").click(function() {
	            $(".loading").toggle();
	        });

			function Loading()
			{
				$(".loading").toggle();
			}

    });

    function recalculateTotal(sc) {
        var total = 0;

        //basically find every selected seat and sum its price
        sc.find('selected').each(function () {
            total += this.data().price;
        });

        return total;
    }
</script>
@endsection

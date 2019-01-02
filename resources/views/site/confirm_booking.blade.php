@extends('site.layout')

@section('title')
{{  __('Confirm Booking')  }}
@endsection

@section('strongstyle')
    <link rel="stylesheet" href="/site/assets/css/AdminLTE.css">
    <style media="screen">
        .btn-flat
        {
            border-radius: 0px;
        }

        .f-20
        {
            font-size: 20px;
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

        .ct-reserveTicket
        {
            display: none;
        }

        @media(max-width: 768px)
        {
            body{
                background-color: red;
            }
        }
    </style>
@endsection

@section('content')

<?php $register = true; $login = true; ?>

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
            Confirm Booking
        </li>
    </ul>
</div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Confirm Your Booking</h3>
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
            <div class="ct-infoBox ct-infoBox--vertical ct-u-marginBottom70">
                <div class="ct-infoBox-description">
                    <h3 class="ct-infoBox-title">Your Information</h3>
                    <div class="ct-divider--doubleBorder"></div>


                    @if($user != '')
                    <ul class="list-unstyled ct-list--WithIcons ct-u-marginBottom30">
                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            Your Name :
                            <strong> {{ $route->getAgency()->name }} </strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            Telephone :
                            <strong>{{ $route->from_name }}</strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            Email : <strong>{{ $route->to_name }}</strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            ID Card No :
                            <strong> {{ number_format($route->price) }} FCFA </strong>
                        </li>

                    </ul>
                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <strong>
                                Your are not Logged in.
                            </strong>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#login" class="btn btn-info btn-flat btn-ced" role="modal"
                                data-toggle="modal">
                                Login
                            </a>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            Or if you don't have an account then create below
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="#register" class="btn btn-info btn-flat btn-ced" role="modal"
                                data-toggle="modal">
                                Create Account
                            </a>
                        </div>
                    </div>

                    @endif

                </div>

                <div class="ct-infoBox-image">

                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="text-center">
            <a href="{{ route('bus.book', ['id' => $route->id]) }}" class="btn btn-warning btn-flat btn-lg">
                <i class="fa fa-chevron-left"></i>
                <strong class="f-20">Go Back</strong>
            </a>

            <a href="#" class="btn btn-info btn-flat btn-lg">
                <strong class="f-20">Confirm Seats and Pay</strong>
                <i class="fa fa-payment"></i>
            </a>
        </div>
    </div>
</div>
<br><br>

<!-- //create account modal -->



<!-- //login modal  -->

@endsection

@section('scripts')
<script type="text/javascript" src="/site/js/signup.js"></script>
<script type="text/javascript" src="/site/assets/plugin/bootstrap-notify.js"></script>
<script type="text/javascript" src="/site/assets/plugin/jquery.validate.js"></script>

<script type="text/javascript">

function showNotification(colorName, text)
{
    if (colorName === null || colorName === '') { colorName = 'bg-cyan'; }
        if (text === null || text === '') { text = 'Notification '; }

        var allowDismiss = true;

        $.notify({
            message: text
        },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: "top",
                align: "right"
            },
            animate: {
                enter: "animated fadeInRight",
                exit: "animated fadeOutRight"
            },
            template: '<div  data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; "></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'

        });
}

$('#signup').validate({
    highlight: function (input) {
        // console.log($(input).parent().next());
        $(input).parent().addClass('has-error');

        if($(input).parent().hasClass('has-success'))
        {
            $(input).parent().removeClass('has-success');
        }
    },
    unhighlight: function (input) {
        $(input).parent().removeClass('has-error');
    },
    errorPlacement: function (error, element) {
        $(element).next().append(error);
    }
});

$("#email").focusout(function(){
    var email = $(this).val();

    verifyEmail(email);

});

function verifyEmail(email)
{
    //make a post request
    $.ajax({
        url : '/api/verify/email/' + email,
        method : 'get',
        dataType : 'text',
        error : function(error)
        {
            console.log(error.responseText);
            showNotification('danger', "Cannot Verify Email address. Please check internet connection");
        },
        success : function(data)
        {
            console.log(data);
            showNotification("success", "This is successful");
        }
    })
}

function verifyTel(tel)
{

}

function verifyUsername(username)
{

}

</script>
@endsection

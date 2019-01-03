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

<br>
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
                            <strong> {{ auth()->user()->name }} </strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            Telephone :
                            <strong>{{ auth()->user()->tel }}</strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            Email : <strong>{{ auth()->user()->email }}</strong>
                        </li>

                        <li><img src="/site/assets/images/icon-check2.png" alt="icon">
                            ID Card No :
                            <strong> {{ auth()->user()->id_card }} </strong>
                        </li>

                        <li>
                            <strong>
                                If any of the information here is incorrect,
                                then go to your profile and edit it.
                            </strong>
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

            <a href="{{ route('booking.payment', ['code' => $booking->code]) }}" class="btn btn-info btn-flat btn-lg">
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
<!-- <script type="text/javascript" src="/site/js/signup.js"></script> -->
<script type="text/javascript" src="/site/assets/plugin/bootstrap-notify.js"></script>
<script type="text/javascript" src="/site/assets/plugin/jquery.validate.js"></script>

@include('site.includes.notification')

<script type="text/javascript">

//validation for email and co
var emailUsed = false;
var usernameUsed = false;
var telUsed = false;

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

$('#login_form').validate({
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

$("#tel").focusout(function(){
    var tel = $(this).val();

    verifyTel(tel);
});

$("#username").keyup(function(){
    var username = $(this).val();

    verifyUsername(username);
});

$("#username").focusout(function(){
    var username = $(this).val();

    verifyUsername(username);
});


$("#rpassword").keyup(function(){
    var rpassword = $(this).val();

    confirmPassword(rpassword);
});

$("#rpassword").focusout(function(){
    var rpassword = $(this).val();

    confirmPassword(rpassword);
});

//now lets handle final form submission.
$("#signup").submit(function(e){
    //loop through all registration form fields
    var errors = 0;
    var errorElements = [];

    //validate the email and password
    var email = $("#email").val();
    var tel = $("#tel").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var rpassword = $("#rpassword").val();

    verifyTel(tel)
    verifyEmail(email)
    verifyUsername(username)

    if(telUsed == true)
    {
        var message = "This telephone number has already been used. <br> Please use another one";
        showNotification('error', message);
        e.preventDefault();
    }

    if( emailUsed == true)
    {
        var message = "This Email has already been used. <br> Please use another one";
        message += "<br> Or Log in with the corresponding account";
        showNotification('error', message);
        e.preventDefault();
    }

    if(usernameUsed == true)
    {
        var message = "This username has already been used. <br> If you are the owner then login";

        showNotification('error', message);
        e.preventDefault();
    }


});

function verifyEmail(email)
{
    //make a post request
    if(email != '')
    {
        $.ajax({
            url : '/api/verify/email/' + email,
            method : 'get',
            dataType : 'text',
            error : function(error)
            {
                console.log(error.responseText);
                showNotification('danger', "Encountered and Error <br> Please check internet connection");

            },
            success : function(data)
            {
                console.log(data);

                $email = $("#email");

                if(data ==  "used")
                {
                    //this email has been used
                    //place an error there

                    //add an error class
                    $email.parent().addClass('has-error');
                    if($email.parent().hasClass('has-success'))
                    {
                        $email.parent().removeClass('has-success');
                    }

                    //make a label
                    $email.next().text("This email has already been used");

                    emailUsed = true;
                }
                else {
                    //email has not been used. make it ok
                    $email.next().text("");

                    emailUsed = false;
                }

            }
        });
        //end of ajax request
    }
}

function verifyTel(tel)
{
    //make a post request
    if(tel != '')
    {
        $.ajax({
            url : '/api/verify/tel/' + tel,
            method : 'get',
            dataType : 'text',
            error : function(error)
            {
                console.log(error.responseText);
                showNotification('danger', "Encountered and Error <br> Please check internet connection");

            },
            success : function(data)
            {
                console.log(data);

                $tel = $("#tel");

                if(data ==  "used")
                {
                    //this email has been used
                    //place an error there

                    //add an error class
                    $tel.parent().addClass('has-error');
                    if($tel.parent().hasClass('has-success'))
                    {
                        $tel.parent().removeClass('has-success');
                    }

                    //make a label
                    $tel.next().text("This Telephone has already been used");

                    telUsed = true;
                }
                else {
                    //email has not been used. make it ok
                    $tel.next().text("");

                    telUsed = false;
                }

            }
        });
        //end of ajax request
    }
}

function verifyUsername(username)
{
    //make a post request
    if(username != '')
    {
        $.ajax({
            url : '/api/verify/username/' + username,
            method : 'get',
            dataType : 'text',
            error : function(error)
            {
                console.log(error.responseText);
                showNotification('danger', "Encountered and Error <br> Please check internet connection");

            },
            success : function(data)
            {
                console.log(data);

                $username = $("#username");

                if(data ==  "used")
                {
                    //this email has been used
                    //place an error there

                    //add an error class
                    $username.parent().addClass('has-error');

                    if($username.parent().hasClass('has-success'))
                    {
                        $username.parent().removeClass('has-success');
                    }

                    //make a label
                    $username.next().text("This username has already been used");

                    //set username used to true
                    usernameUsed = true;
                }
                else {
                    //email has not been used. make it ok
                    $username.next().text("");

                    usernameUsed = false;
                }

            }
        });
        //end of ajax request
    }
}

function verifyPassword(password)
{
    $password = $("#password");
    if(password.length < 4)
    {
        $password.parent().addClass("has-error");
        $password.next().text('Minimum password length is 4');
    }
    else
    {
        if($password.parent().hasClass('has-error'))
        {
            $password.parent().removeClass('has-error');
        }

        $password.next().text('');
    }
}

function confirmPassword(confirm)
{
    var password = $("#password").val();
    $rpassword = $("#rpassword");

    if(confirm == '')
    {
        $rpassword.parent().addClass('has-error');
        $rpassword.next().text("Passwords do not match");
    }
    else {
        if(password != confirm)
        {
            $rpassword.parent().addClass('has-error');
            $rpassword.next().text("Passwords do not match");
        }
        else
        {
            if($rpassword.parent().hasClass('has-error'))
            {
                $rpassword.parent().removeClass('has-error');
            }

            $rpassword.next().text("");
        }
    }
}

</script>
@endsection

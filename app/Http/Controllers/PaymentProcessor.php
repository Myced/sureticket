<?php

namespace App\Http\Controllers;

use App\Route;
use App\Functions;
use App\PaymentLog;
use App\BookingCount;
use App\AssignedRoute;
use App\MomoProcessor;
use App\MomoResponseParser;
use Illuminate\Http\Request;

class PaymentProcessor extends Controller
{
    public function momo(Request $request)
    {
        $number = $request->number;

        $booking = BookingCount::where('code', '=', $request->code)->first();

        if($request->type == "fee")
        {
            $amount = Functions::getBookingFee();
        }
        else {
            $amount = $booking->total;
        }

        //process the momo
        $momo = new MomoProcessor($amount, $number);
        $response = $momo->getResponse();

        //parse the response
        $parser = new MomoResponseParser($response);

        


        return $response;
    }

    public function orange(Request $request)
    {
        return $request->number;
    }

    public function visa(Request $request)
    {
        return $request->number;
    }
}

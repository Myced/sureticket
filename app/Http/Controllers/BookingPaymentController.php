<?php

namespace App\Http\Controllers;

use Cookie;
use App\Bus;
use App\Route;
use App\Booking;
use App\SiteSetting;
use App\BookingCount;
use App\AssignedRoute;
use Illuminate\Http\Request;

class BookingPaymentController extends Controller
{
    public function selectPaymentMethod($code)
    {
        //This is a booking count code
        $booking = BookingCount::where('code', '=', $code)->first();

        $user  = $this->getUser();

        $route_id = $booking->bookings()[0]->assigned_route_id;
        $route = AssignedRoute::find($route_id);

        //get the booking fee
        $fee = $this->getBookingFee();

        return view('site.booking_payment', compact('booking', 'user', 'route', 'fee'));
    }

    private function getBookingFee()
    {
        return SiteSetting::find('1')->booking_fee;
    }

    private function getUser()
    {
        return auth()->user();
    }

    private function getCookie()
    {
        return Cookie::get('uuc');
    }

    public function momoPayment($code)
    {
        $booking = BookingCount::where('code', '=', $code)->first();

        $user  = $this->getUser();

        $route_id = $booking->bookings()[0]->assigned_route_id;
        $route = AssignedRoute::find($route_id);

        //get the booking fee
        $fee = $this->getBookingFee();

        return view('site.momo_payment', compact('booking', 'fee', 'route', 'user'));
    }

    public function orangePayment()
    {

    }

    public function visaPayment()
    {

    }
}

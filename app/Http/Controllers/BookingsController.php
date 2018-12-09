<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function today()
    {
        return view('agency.today_bookings');
    }
}

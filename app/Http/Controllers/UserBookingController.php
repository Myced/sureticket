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
use App\Http\Controllers\BookingCookieController;

class UserBookingController extends Controller
{
    protected $cookie;
    protected $user;

    //constructor to initialise the cookie and user ;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        //check for the cookie ;
        $cookie = new BookingCookieController;
        $this->cookie = $cookie->getToken();
    }

    public function setUser()
    {
        //check if the user is authenticated;
        if(auth()->user() != null)
        {
            $this->user = auth()->user();
        }
        else {
            $this->user = '';
        }
    }

    public function bookCreate()
    {
        return view('site.book');
    }

    public function searchBus()
    {
        $sourceRaw = request()->source;
        $destinationRaw = request()->destination;

        $source = '%' . $sourceRaw . '%';
        $destination = '%' . $destinationRaw . '%';

        //search for routes
        $routes = AssignedRoute::where('from_name', 'LIKE',  $source)
                                ->where('to_name', 'LIKE', $destination)
                                ->get();

        return view('site.search_results')->with('routes', $routes);
    }

    public function busBook($id)
    {
        $this->setUser();
        $route = AssignedRoute::find($id);
        $cookie = $this->cookie;
        $user = $this->user;

        return view('site.bus_book', compact('route', 'cookie', 'user'));
    }

    public function book(Request $request)
    {
        $assignedRoute = AssignedRoute::find($request->assigned);
        $route = $assignedRoute->getRoute();

        //make a new Booking
        $count =  $this->CountBook($request, $assignedRoute);
        $countID = $count->id;
        $code = $count->code;

        //now creat the booking themselves
        //loop through all the seats
        for($i = 0; $i < count($request->seats); $i++)
        {
            $booking = new Booking;

            $booking->booking_count_id = $countID;
            $booking->cookie_id = $request->cookie;
            $booking->user_id = $request->user;
            $booking->date = date('d/m/Y');
            $booking->mysql_date = date('Y-m-d');
            $booking->assigned_route_id = $request->assigned;
            $booking->route_id = $route->id;
            $booking->agency_id = $route->agency;
            $booking->bus_id  = $assignedRoute->getBus()->id;
            $booking->bus_number = $assignedRoute->getBus()->number;
            $booking->seat_id = $request->seats[$i][0];
            $booking->seat_no = $request->seats[$i][1];
            $booking->price = $route->price;
            $booking->status = "PENDING";

            //Save it
            $booking->save();
        }

        //prepare now a response
        $response = [
            'status' => 'success',
            'message' => 'Booking Saved',
            'code' => $code
        ];

        return json_encode($response);
    }

    private function CountBook($request, $assginedRoute)
    {
        $bookingCount = new BookingCount;

        $bookingCount->code = $this->generateCode();
        $bookingCount->cookie = $request->cookie;
        $bookingCount->user = $request->user;
        $bookingCount->date = date('d/m/Y');
        $bookingCount->mysql_date = date('Y-m-d');
        $bookingCount->seat_count = $seats = count($request->seats);
        $bookingCount->total = $seats * $assginedRoute->price;
        $bookingCount->booking_amount = $this->getBookingFee();

        //now save
        $bookingCount->save();

        //return the id of this transaction
        return BookingCount::where('cookie', '=', $request->cookie)
                    ->orderBy('id', 'desc')
                    ->first();
    }

    private function getBookingFee()
    {
        return SiteSetting::find('1')->booking_fee;
    }

    private function generateCode()
    {
        //count all the bookings of today
        $date = date("Y-m-d");

        $count = BookingCount::where('mysql_date', '=', $date)
                                ->get()
                                ->count();

        $code = $this->buildCode($count);

        return $code;
    }

    private function buildCode($count)
    {
        // $digits = 8; number of digits for the code
        $const  = "ST" . date('ym') . '-';

        $length = $this->getLength($count);

        $random = $this->random($length);

        $code = $const . $count . $random;

        if(!$this->codeExists($code))
        {
            return $code;
        }
        else
        {
            do
            {
                $random = $this->random($length);

                $code = $const . $count . $random;
            }
            while (!$this->codeExists($code));

            return $code;
        }

    }

    private function getLength($count)
    {
        if($count < 10)
        {
            $length = 7;
        }
        elseif($count < 100)
        {
            $length = 6;
        }
        elseif($count < 1000)
        {
            $length = 5;
        }
        elseif($count < 10000)
        {
            $length = 4;
        }
        elseif($count < 100000)
        {
            $length = 3;
        }
        elseif($count < 1000000)
        {
            $length = 2;
        }
        elseif($count < 10000000)
        {
            $length = 1;
        }
        else
        {
            $length = 0;
        }

        return $length;
    }

    private function random($length)
    {
        $string = '';

        for($i = 0; $i < $length; $i++)
        {
            $string .= rand(0, 9);
        }

        return $string;
    }

    private function codeExists($code)
    {
        $bookings = BookingCount::where('code', '=', $code)->get();

        if(count($bookings) == 0)
        {
            return false;
        }

        return true;
    }

    public function confirm($code)
    {
        //This is a booking count code
        $booking = BookingCount::where('code', '=', $code)->first();
        $this->setUser();

        $user  = $this->user;

        $route_id = $booking->bookings()[0]->assigned_route_id;
        $route = AssignedRoute::find($route_id);

        //get the booking fee
        $fee = $this->getBookingFee();

        return view('site.confirm_booking', compact('booking', 'user', 'route', 'fee'));
    }
}

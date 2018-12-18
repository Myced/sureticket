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
        $countId =  $this->CountBook($request, $assignedRoute);

        //now creat the booking themselves
        //loop through all the seats
        for($i = 0; $i < count($request->seats); $i++)
        {
            $booking = new Booking;

            $booking->booking_count_id = $countId;
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
            'message' => 'Booking Saved'
        ];

        return json_encode($response);
    }

    private function CountBook($request, $assginedRoute)
    {
        $bookingCount = new BookingCount;

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
                    ->first()
                    ->id;
    }

    private function getBookingFee()
    {
        return SiteSetting::find('1')->booking_fee;
    }
}

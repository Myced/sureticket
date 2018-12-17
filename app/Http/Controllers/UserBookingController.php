<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Route;
use App\AssignedRoute;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function book()
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
        $route = AssignedRoute::find($id);
        return view('site.bus_book', compact('route'));
    }
}

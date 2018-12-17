<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Route;
use App\Agency;
use Session;
use App\AssignedRoute;
use Illuminate\Http\Request;

class AssignedRouteController extends Controller
{
    //id of the agency concerned
    private $agency;

    //constructor to set the agency automatically
    public function __construct()
    {
        $this->agency = '1';
    }

    public function index()
    {
        //get all the assigned routes and send
        $assigned = AssignedRoute::all();

        return view('agency.assigned_routes', compact(['assigned']));
    }

    public function today()
    {
        $routes = Route::all();
        $busses = Bus::all();
        $date = date('d/m/Y'); //today ; // TODO: adjust time zone
        return view('agency.assign_today', compact('routes', 'busses', 'date'));
    }

    public function todayStore(Request $request)
    {
        $assignedRoute = new AssignedRoute;

        //get the route details
        $route = Route::find($request->route_id);
        $date = date('d/m/Y');

        //make sure this same date and route and bus does not exist
        $busAssigned  = AssignedRoute::where('agency_id', '=', $this->agency)
                                ->where('bus_id', '=', $request->bus)
                                ->where('date', '=', $date)
                                ->get();

        if(count($busAssigned) > 0)
        {
            Session::flash('error', 'This bus has already been assigned for today');
            return back();
        }
        else {
            //save the assigned route
            $assignedRoute->agency_id = $this->agency;
            $assignedRoute->date = date('d/m/Y');
            $assignedRoute->mysql_date = date('Y-m-d');
            $assignedRoute->route_id = $request->route_id;
            $assignedRoute->bus_id = $request->bus;
            $assignedRoute->to_id = $route->to;
            $assignedRoute->from_id = $route->from;
            $assignedRoute->to_name = Route::getLocationName($route->to);
            $assignedRoute->from_name = Route::getLocationName($route->from);
            $assignedRoute->price = $route->price;

            //save and
            $assignedRoute->save();

            Session::flash('success', 'Bus Assigned to Route');

            return back();
        }

    }

    public function tomorrow()
    {

    }

    public function yesterday()
    {

    }
}

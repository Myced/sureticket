<?php

namespace App\Http\Controllers;

use App\Route;
use App\Location;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //agency to
    protected $agency; // the agency of the logged in user

    public function __construct()
    {
        //set the agency to be that of the authentiated user
        $this->agency = 1;
    }
    public function index()
    {
        //show all routes for this agency
        $routes = Route::where('agency','=', $this->agency)->get();

        return view('agency.manage_routes')->with('routes', $routes);
    }

    public function create()
    {
        $locations = Location::orderBy('name', 'asc')->get();
        return view('agency.add_route')->with('locations', $locations);
    }

    public function store(Request $request)
    {
        //no need to validate
        $route = new Route;

        $route->agency = $this->agency;
        $route->from = $request->from;
        $route->to = $request ->to;
        $route->price = \App\Functions::getMoney($request->price);
        $route->status = $request->status;

        $route->save();

        //if there is a reverse then create it
        if(isset($request->reverse))
        {
            $route = new Route;

            $route->agency = $this->agency;
            $route->from = $request->to;
            $route->to = $request ->from;
            $route->price = \App\Functions::getMoney($request->price);
            $route->status = $request->status;

            $route->save();
        }

        //session flash message
        session()->flash('success', 'Route Added');

        return back();
    }

    public function edit($id)
    {
        $route = Route::find($id);
        $locations = Location::orderBy('name', 'asc')->get();

        return view('agency.edit_route', compact('route', 'locations'));
    }

    public function update (Request $request, $id)
    {
        $route = Route::find($id);

        $route->from = $request->to;
        $route->to = $request ->from;
        $route->price = \App\Functions::getMoney($request->price);
        $route->status = $request->status;

        $route->save();

        //session flash message
        session()->flash('success', 'Route Updated');

        return back();
    }

    public function destroy ($id)
    {
        Route::destroy($id);

        session()->flash('success', 'Route Deleted');

        return back();
    }
}

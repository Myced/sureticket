<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Location;

class LocationsController extends Controller
{
    public function index()
    {
        return view('agency.locations')->with('locations', Location::orderby('name')->get());
    }

    public function create()
    {
        return view('agency.add_location');
    }

    public function store(Request $request)
    {
        $name = $request->name;

        //make sure it does not exists
        $location = Location::where('name', '=', $name)->get();

        if(count($location) > 0)
        {
            session()->flash('error', 'Location Already Exist');
        }
        else {
            //save the location
            $newLocation = new Location;
            $newLocation->name = $name;

            $newLocation->save();

            Session::flash('success', 'Location Added');
        }

        return back();
    }
}

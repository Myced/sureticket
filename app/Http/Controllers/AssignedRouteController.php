<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Route;
use App\Agency;
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
        return view('agency.assign_today', compact('routes', 'busses'));
    }

    public function tomorrow()
    {

    }

    public function yesterday()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Route;
use App\Bus;
use App\AssignedRoute;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function subscribe(Request $request)
    {
        dd($request);
    }

    public function log()
    {
        return view('auth.log3');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {

    }

    public function dashboard()
    {
        return view('agency.index');
    }
}

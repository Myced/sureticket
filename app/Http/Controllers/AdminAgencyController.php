<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AdminAgencyController extends Controller
{
    //public function to get all agencies
    public function index()
    {
        $agencies = Agency::all();

        return view ('admin.agencies')->with($agencies);
    }

    public function create()
    {
        return view('admin.add_agency');
    }

    public function store($request)
    {

    }

    public function update($request, $id)
    {

    }

    public function view($id)
    {

    }

    public function destroy($id)
    {

    }
}

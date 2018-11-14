<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    //current agency we are working with
    protected $agency;

    public function __construct()
    {
        $this->agency = '1';
    }

    public function index()
    {
        $buses  = Bus::where('agency', '=', $this->agency)->get();

        return view('agency.buses')->with('buses', $buses);
    }

    public function create()
    {
        return view('agency.add_bus');
    }

    public function store(Request $request)
    {
        $bus  = new Bus;

        $bus->agency = $this->agency;
        $bus->number = $request->number;
        $bus->type = $request->type;
        $bus->seats = $request->seats;
        $bus->region = $request->region;
        $bus->state = $request->state;

        $bus->vip = true ? isset($request->vip) : false;
        $bus->wifi = true ? isset($request->wifi) : false;

        $bus->save();

        session()->flash('success', 'Bus Information Saved');

        return back();
    }

    public function edit($id)
    {
        $bus = Bus::find($id);

        return view('agency.edit_bus')->with('bus', $bus);
    }

    public function update(Request $request, $id)
    {
        $bus = Bus::find($id);

        $bus->number = $request->number;
        $bus->type = $request->type;
        $bus->seats = $request->seats;
        $bus->region = $request->region;
        $bus->state = $request->state;

        $bus->vip = true ? isset($request->vip) : false;
        $bus->wifi = true ? isset($request->wifi) : false;

        $bus->save();

        session()->flash('success', 'Bus information Updated');

        return back();
    }

    public function destroy($id)
    {
        Bus::destroy($id);

        session()->flash('success', 'Bus Deleted');

        return back();
    }
}

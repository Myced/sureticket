<?php

namespace App;

use App\Bus;
use App\Route;
use App\Agency;
use Illuminate\Database\Eloquent\Model;

class AssignedRoute extends Model
{
    //
    public function getBusNumber()
    {
        $bus = Bus::find($this->bus_id);

        return $bus->number;
    }

    public function getBus()
    {
        // return $this->belongsTo('App\Bus');
        return Bus::find($this->bus_id);
    }

    public function getAgency()
    {
        // return $this->belongsTo('App\Agency');
        return Agency::find($this->agency_id);
    }

    public function getRoute()
    {
        return Route::find($this->route_id);
    }
}

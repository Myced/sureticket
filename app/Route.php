<?php

namespace App;

use App\Bus;
use App\Route;
use App\AssignedRoute;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    public function isAssigned($date)
    {
        $assigneToday = AssignedRoute::where('date', '=', $date)
                                    ->where('route_id', '=', $this->id)
                                    ->get();

        if(count($assigneToday) > 0)
        {
            return true;
        }

        return false;
    }

    public function getAssignedBus($date)
    {
        $assigned =  AssignedRoute::where('date', '=', $date)
                                    ->where('route_id', '=', $this->id)
                                    ->get();

        //now get the bus from the route
        return $assigned;
    }

    //function to get location name
    public static function getLocationName($id)
    {
        $location = \App\Location::find($id);

        if($location == null)
        {
            return '';
        }
        else {
            return $location->name;
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

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

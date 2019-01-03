<?php
namespace App;

/**
 *Contains functions that I will need from time to time
 */
class Functions
{

    function __construct()
    {
        // code...
    }

    public static function getMoney($money)
    {
        $regex = '/[\s\,\.\-]/';

        if(preg_match($regex, $money))
        {
            $filter = preg_filter($regex, '', $money);
        }
        else
        {
            $filter = $money;
        }

        return $filter;
    }

    public static function getBookingFee()
    {
        return \App\SiteSetting::find('1')->booking_fee;
    }
}

 ?>

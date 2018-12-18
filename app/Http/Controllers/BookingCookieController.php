<?php

namespace App\Http\Controllers;

use Crypt;
use Cookie;
use App\BookingCookie;
use Illuminate\Http\Request;

class BookingCookieController
{
    //the length of the cookie to be generated
    protected $length = 32; //32 bits

    protected $expire  = 31536000; // 86400 (one day) * 365

    protected $token;

    public function __construct()
    {
        $this->makeCookie();
    }

    public function getToken()
    {
        return $this->token;
    }

    public function makeCookie()
    {
        if($this->cookiePresent())
        {
            return ;
        }

        //generate cookie
        $token = $this->generateToken();

        //make sure it does not exit
        if($this->isUnique($token))
        {
            $this->saveToken($token);
        }
        else
        {
            //regernate token
            $token = $this->appendRandomString($token);
            $this->saveToken($token);
        }

    }

    public function cookiePresent()
    {
        if(Cookie::get('uuc') == null)
        {
            return false;
        }

        $this->token = Crypt::decrypt(request()->cookie('uuc'), false);

        return true;
    }

    public function generateToken()
    {
        return str_random($this->length);
    }

    public function appendRandomString($token)
    {
        $suffix = str_random(5);

        return $token . $suffix;
    }

    public function isUnique($token)
    {
        //check that its not in the database
        $result = BookingCookie::where('token', '=', $token)->get();

        if(count($result) == 0)
        {
            return true;
        }

        return false;
    }

    public function saveToken($token)
    {
        $bookingCookie = new BookingCookie;

        $bookingCookie->token = $token;

        $bookingCookie->save();

        $this->token = $token;

        $this->createCookie($token);
    }

    public function createCookie($token)
    {
        Cookie::queue('uuc', $token, $this->expire);
    }
}

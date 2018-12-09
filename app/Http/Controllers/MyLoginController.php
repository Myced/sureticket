<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyLoginController extends Controller
{
    public function login(Request $request)
    {
        //ge tthe user name and password
        $email = $request->email;
        $password = $request->password;
    }
}

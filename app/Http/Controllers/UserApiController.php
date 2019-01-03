<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function verifyEmail($email)
    {
        $user = User::where('email', '=', $email)->get();

        if(count($user) > 0)
        {
            return 'used';
        }

        return 'unused';
    }

    public function verifyUsername($username)
    {
        $user = User::where('username', '=', $username)->get();

        if(count($user) > 0)
        {
            return 'used';
        }

        return 'unused';
    }

    public function verifyTel($tel)
    {
        $user = User::where('tel', '=', $tel)->get();

        if(count($user) > 0)
        {
            return 'used';
        }

        return 'unused';
    }
}

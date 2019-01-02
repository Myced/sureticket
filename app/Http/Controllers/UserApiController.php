<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function verifyEmail($email)
    {
        return $email;
    }

    public function verifyUsername($username)
    {
        return 'true';
    }

    public function verifyTel($tel)
    {
        return $tel;
    }
}

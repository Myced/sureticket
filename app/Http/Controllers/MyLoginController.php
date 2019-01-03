<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyLoginController extends Controller
{
    public function login(Request $request)
    {
        //ge tthe user name and password
        $email = $request->email;
        $password = $request->password;
    }

    public function userSignUp(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:4',
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        //sign up the user
        $user = new User;

        $user_id = $this->generateUserId();

        $user->user_id = $user_id;

        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->id_card = $request->idcard;
        $user->password = Hash::make($request->password);
        $user->type = \App\UserType::NORMAL_USER;
        $user->avatar = \App\Http\Controllers\AdminAccountsController::DEFAULT_AVATAR;

        $user->save();

        //sign in the user
        try {
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

        } catch (\Exception $e) {

            $message = $e->getMessage();

            session()->flash('error', 'Could not sign you in');
        }


        //send them back
        session()->flash('success', "Registration successful");
        return back();
    }

    public function userLogin(Request $request)
    {
        //attempt to authenticate
        try {
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]))
            {
                session()->flash('success', 'Login Successful');
            }
            else {
                session()->flash('error', 'Login Failed. Invalid Credentials');
            }




        } catch (\Exception $e) {
            session()->flash('error', "Login Failed. Server Error");
        }

        return back();

    }

    public function generateUserId()
    {
        $constant = "STA" . date('ym') . 'U';

        $last_id = User::all()->pluck('id')->last();

        $id = $last_id + 1;
        $uid = '';

        if($id  < 10)
        {
            $uid = '000' . $id;
        }
        elseif($id < 100)
        {
            $uid  = '00' . $id;
        }
        elseif($id < 1000)
        {
            $uid = '0' . $id;
        }
        else {
            $uid = $id;
        }

        $user_id = $constant . $uid;

        //check that this user id does not exist
        $user = User::where('user_id', '=', $user_id)->get();

        if(count($user) > 0)
        {
            $uid .= rand(0, 100);
            $user_id = $constant . $uid;
        }

        return $user_id;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_id = $this->generateUserId();

        return User::create([
            'user_id' => $user_id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
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

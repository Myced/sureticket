<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Agency;
use App\User;

class AdminAccountsController extends Controller
{

    const DEFAULT_AVATAR = 'uploads/users/avatars/user.png';

    public function index()
    {
        $accounts = User::where('type', '<>', '100')->get(); //no normal user accounts
        // $accounts = User::all();

        return view('admin.manage_accounts')->with('accounts', $accounts);
    }

    public function create()
    {
        $agencies = Agency::all();
        return view('admin.create_account')->with('agencies', $agencies);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|unique:users'
        ]);

        //once validation is complete, store the user account
        $user = new User;

        $user_id = $this->generateUserId();

        $user->user_id = $user_id;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password  = Hash::make($request->password);
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->type = $request->type;

        if($request->type == '100')
        {
            $user->agency_id = $request->agency;
        }
        else {
            $user->agency_id = null;
        }

        //upload photo;
        $photoObject = $request->profile;

        if(!empty($photoObject))
        {
            //generate a name for it;
            $photoName = time() . $photoObject->getClientOriginalName();

            $destination = 'uploads/users/avatars/';

            $photoObject->move($destination, $photoName);

            $user->avatar = $destination . $photoName;
        }
        else {
            $user->avatar = SELF::DEFAULT_AVATAR;
        }

        $user->save();

        session()->flash('success', 'Account Created');

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

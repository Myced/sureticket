<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Constants;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userLevel = Auth::user()->type; //get account type

        //check if this account is the agnecy level
        if($userLevel == Constants::ADMIN)
        {
            return $next($request);
        }

        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Web\Auth;
use App\Models\Web\User;
use Session;

class WislistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('id', Auth::user()['id'])->where('email', Auth::user()['email'])->first();
        if(!$user)
        {
            Session::forget('user');
            return redirect('/')->with('alert', 'Signup or Login to access that page!');
        }


        if(!Auth::user())
        {
            return redirect('/')->with('alert', 'Signup or Login to access that page!');
        }

        return $next($request);
    }
}

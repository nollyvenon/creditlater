<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Vendor\Auth;
use DB;
use Session;

class VendorIsDeactivate
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
        if($vendor = Auth::vendor())
        {
            if(!Auth::login($vendor['email'])) 
            {
                Session::forget('vendor');
                return redirect('vendor/login')->with('error', 'You are not a vendor, signup to become a vendor.');
            }
            
            $vendor_details = DB::table('vendors')->where('email', $vendor['email'])->where('id', $vendor['id'])->first();
            if(!$vendor_details->is_deactivate == 0)
            {
                Auth::logout();
                return redirect('vendor/login')->with('error', 'Your account has been deactivated, contact the admin.');
            }
        }
        return $next($request);
    }
}

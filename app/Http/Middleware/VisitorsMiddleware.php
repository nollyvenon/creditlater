<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Web\Cookie;
use App\Models\Web\Visitor;
use App\Models\Web\P_review;
use App\Models\Web\Auth;
use DB;
use Session;

class VisitorsMiddleware
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
        $date = date('Y-m-d H:i:s');
        if(!Auth::user())
        {
            if(!Cookie::exists('creditlater_visitor'))
            {
                 $visitor_cookie = uniqid();
     
                 if(Cookie::put('creditlater_visitor', $visitor_cookie , strtotime('+5 years')))
                 {
                     Visitor::create([
                         'value' => $visitor_cookie,
                         'visit_date' => $date
                     ]);
                 }
            }
        }
  
        
        return $next($request);
    }
}

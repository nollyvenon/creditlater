<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use Session;

class AdminLogoutController extends Controller
{
    public function logout()
    {
        if(Session::has('admin'))
        {
            Auth::logout();
        }
        return back();
    }
    

    // end
}

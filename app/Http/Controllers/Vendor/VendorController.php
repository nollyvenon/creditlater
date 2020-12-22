<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

use App\Models\Vendor\Auth;
use App\Models\Vendor\Vendor;



class VendorController extends Controller
{
    public function index()
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }

        
        $vendors = Auth::vendor();

        $vendor = Vendor::where('id', $vendors['id'])->first();
        if(!$vendor)
        {
            $vendor = null;
        }
        return view('vendor.account', compact('vendor'));
    }


   

    public function logout()
    {
        if(Auth::vendor())
        { 
            Auth::logout();
        }
        return back();
    }

    // end
}

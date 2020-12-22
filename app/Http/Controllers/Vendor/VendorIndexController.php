<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

class VendorIndexController extends Controller
{
    public function index()
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }
        
        return view('vendor.index');
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;


class VendorIndexController extends Controller
{
    public function index()
    {
        return view('vendor.index');
    }
}

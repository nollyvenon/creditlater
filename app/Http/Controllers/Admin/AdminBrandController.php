<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class AdminBrandController extends Controller
{
    public function index()
    {
        // get brands
        $brands = DB::table('brands')->get();
        if(count($brands) == "")
        {
            $brands = null;
        }

        return view('admin.brands', compact('brands'));
    }
}

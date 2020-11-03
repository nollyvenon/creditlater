<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Buyer;

class BuyerController extends Controller
{
    
    public function index()
    {
        $buyers = Buyer::all();
        if(count($buyers) == 0)
        {
            $buyers = null;
        }
        return view('admin.buyer', compact('buyers'));
    }
}

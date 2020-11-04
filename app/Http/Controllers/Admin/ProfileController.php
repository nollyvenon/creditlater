<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Buyer;
use App\Models\Admin\Guarantor;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }


    public function create($buyer_id)
    {
        $buyer = Buyer::where('buyer_id', $buyer_id)->first();
        $guarantor = Guarantor::where('buyer_id', $buyer_id)->first();
        
        if(!$buyer)
        {
           $buyer = null;
        }
        return view('admin.profile', compact('buyer'));
    }



}

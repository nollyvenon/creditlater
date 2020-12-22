<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

use App\Models\Vendor\Auth;
use App\Models\Vendor\Vendor;



class VendorRegisterController extends Controller
{
    public function index()
    {
        return view('vendor.register');
    }


    public function store(Request $request)
    {

        $register = $request->validate([
                    'first_name' => 'required|min:3|max:50',
                    'last_name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:vendors',
                    'phone' => 'required|min:11|max:11',
                    'address' => 'required|min:3|max:50',
                    'city' => 'required|min:3|max:50',
                    'state' => 'required|min:3|max:50',
                    'country' => 'required|min:3|max:20',
                    'about' => 'required|min:6|max:400',
                    'password' => 'min:6|max:20|required_with:confirm_password|same:confirm_password',
                ]);
        if( Vendor::create($register))
        {
            Auth::login($request->email);
        }


        return redirect('vendor')->with('success', 'You have registered successfully!');
    }


    // end
}

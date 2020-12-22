<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

use App\Models\Vendor\Auth;
use App\Models\Vendor\Vendor;
use Illuminate\Support\Facades\Hash;



class VendorLoginController extends Controller
{
    public function index()
    {
        return view('vendor.login');
    }




    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:6|max:20|',
        ]);

        $vendor = Vendor::where('email', $request->email);
        if(!$vendor->first())
        {
            return back()->with('error', $request->email." does not exist!");
        }

        if(!Hash::check($request->password, $vendor->first()->password))
        {
            return back()->with('error', 'Wrong password, try again');
        }

        Auth::login($request->email);

        return redirect('vendor')->with('success', 'you have been logged in successfully!');
    }

   

    // end
}

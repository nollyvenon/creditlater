<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:6|max:20|',
        ]);

        $admin = Admin::where('email', $request->email);
        if(!$admin->first())
        {
            return back()->with('error', $request->email." does not exist!");
        }

        if(!Hash::check($request->password, $admin->first()->password))
        {
            return back()->with('error', 'Wrong password, try again');
        }
        Auth::login($request->email);

       
        return redirect('admin')->with('success', 'you have been logged in successfully!');
    }

    // end
}

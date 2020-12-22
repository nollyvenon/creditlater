<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use DB;
use Session;

class AdminRegisterController extends Controller
{
    public function index()
    {
        // Session::forget('admin');
        return view('admin.register');
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

        if(Admin::create($register))
        {
            $admin = Admin::where('email', $request->email)->first();
            $admin->token = uniqid().$admin->id;
            $admin->save();
            Auth::login($request->email);
        }

        return redirect('admin')->with('success', 'You have registered successfully!');
    }




    










    // end
}

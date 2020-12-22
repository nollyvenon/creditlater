<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Vendor\Vendor;
use Session;

class Auth extends Model
{   
    use HasFactory;

    public static function vendor()
    {
        if(Session::has('vendor'))
        {
            return Session::get('vendor');
        }
        return false;
    }




    public static function login($email)
    {
        if($email)
        {
            $date = date("Y-m-d H:s:i", time());
            $vendor = Vendor::where('email', $email)->first();
            if($vendor)
            {
                $userDetails = [
                    'id' => $vendor->id, 
                    'first_name' => $vendor->first_name, 
                    'last_name' => $vendor->last_name, 
                    'email' => $vendor->email, 
                    'token' => $vendor->token, 
                    'active' => $vendor->active ];

                if(!$vendor->token)
                {
                    $vendor->token = uniqid().$vendor->id;
                }
                $vendor->active = 1;
                $vendor->last_login = $date;
                $vendor->save();
                Session::put('vendor', $userDetails);
                return true;
            }
        }
        return false;
    }




    public static function logout()
    {
        if(Session::has('vendor'))
        {
            $date = date("Y-m-d H:i:s");
            $user_email = Auth::vendor()['email'];
            $vendor = Vendor::where('email', $user_email)->where('token', Auth::vendor()['token'])->first();
            if(!$vendor)
            {
                Session::forget('vendor');
            }else{
                $vendor->active = 0;
                $vendor->last_login = $date;
                $vendor->save();
            }
            Session::forget('vendor');
            return true;
        }
        return false;
    }


    // end
}


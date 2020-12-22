<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Admin\Admin;
use Session;

class Auth extends Model
{   
    use HasFactory;

    public static function admin()
    {
        if(Session::has('admin'))
        {
            return Session::get('admin');
        }
        return false;
    }




    public static function login($email)
    {
        if($email)
        {
            $date = date("Y-m-d H:s:i", time());
            $admin = Admin::where('email', $email)->first();
            if($admin)
            {
                $userDetails = [
                    'id' => $admin->id, 
                    'first_name' => $admin->first_name, 
                    'last_name' => $admin->last_name, 
                    'email' => $admin->email, 
                    'token' => $admin->token, 
                    'active' => 1 ];
 
               

                $admin->active = 1;
                $admin->last_login = $date;
                $admin->save();
                Session::put('admin', $userDetails);
                return true;
            }
        }
        return false;
    }




    public static function logout()
    {
        if(Session::has('admin'))
        {
            $admin = Admin::where('email', self::admin()['email'])->where('token', self::admin()['token'])->first();
            if($admin)
            {
                $admin->active = 0;
                $admin->save();
            }
            Session::forget('admin');
            return true;
        }
        return false;
    }


    // end
}


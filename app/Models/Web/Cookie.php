<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookie 
{


    public static function exists($name)
    {
        return (isset($_COOKIE[$name])) ? true : false;
    }



    public static function get($name)
    {
        if(self::exists($name))
        {
            return $_COOKIE[$name];
        }
        return  false;
    }




    public static function put($name, $value, $expiry)
    {
       if(setcookie($name, $value, time() + $expiry, '/'))
       {
           return true;
       }
       return false;
    }


    public static function delete($name)
    {
       if( self::put($name, '', time() - 1))
       {
           return true;
       }
       return false;
    }

    // end
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\User;
use App\Models\Web\PaidBuyer;
use App\Models\Web\Category;
use App\Models\Web\Auth;

use DB;

class OrderController extends Controller
{
    public function index()
    {
         //get all category
         $sideCategories = Category::where('is_feature', 1)->get(); 
         
        //get buyers orders
        $buyer_order = null;
        if(Auth::user())
        {
            $user_id = Auth::user()['id'];
            $buyer_order = DB::table('paids')->where('buyer_user_id', $user_id)
                        ->leftJoin('products', 'paids.product_id', '=', 'products.id')->orderBy('product_id', 'desc')->limit(3)->get();
        
            if(count($buyer_order) == "")
            {
                $buyer_order = null;
            }
        }else{
            return redirect('/')->with('alert', 'Signup or login to access that page!');
        }

         return view('web.order_history', compact('sideCategories', 'buyer_order'));
    }




    public function show()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get(); 
         
        //get buyers orders
        $buyer_order = null;
        if(Auth::user())
        {
            $user_id = Auth::user()['id'];
            $buyer_order = DB::table('paids')->where('buyer_user_id', $user_id)
                          ->leftJoin('products', 'paids.product_id', '=', 'products.id')->orderBy('product_id', 'desc')->get();
            if(count($buyer_order) == "")
            {
                $buyer_order = null;
            }
        }
       

         return view('web.order_history', compact('sideCategories', 'buyer_order'));
    }




    // end
}

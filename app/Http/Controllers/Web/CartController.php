<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Cart;

use App\Models\Web\Brand;
use App\Models\Web\Product;
use App\Models\Web\Category;
use App\Models\Web\priceRange;

use DB;

class CartController extends Controller
{
    public $user_id = 1;

    public function index()
    {
        $user_id = 1;

        //  side categories
        $sideCategories = Category::where('is_feature', 1)->get();

        //  get user cart
        $user_cart = DB::table('carts')->where('user_id', $user_id)->leftJoin('products', 'carts.product_id', '=', 'products.id')->get();
        $cart = 0;
        if(count($user_cart)){
            $cart = $user_cart;
        }

       

        return view("web.cart", compact('sideCategories', 'user_cart', 'cart'));
    }



    

   

    // end
}

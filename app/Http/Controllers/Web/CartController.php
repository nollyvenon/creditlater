<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Cart;

use App\Models\Web\Brand;
use App\Models\Web\Product;
use App\Models\Web\Category;
use App\Models\Web\priceRange;
use App\Models\Web\Auth;
use App\Models\Web\User;

use DB;
use Session;
use Carbon\Carbon;

class CartController extends Controller
{
    

    public function index()
    {   
        //  side categories
        $sideCategories = Category::where('is_feature', 1)->get();

       
       if($user = Auth::user())
       {
            $loggedin = User::where('id', $user['id'])->where('email', $user['email'])->where('active', 1)->first();
            if(!$loggedin)
            {
                Auth::logout();
                return back();
            }
       }

    //    Session::forget('cart');
        return view("web.cart", compact('sideCategories'));
    }








    // ADD TO CART IN DETAIL PAGE
    public function add_to_cart_ajax(Request $request)
    {
        $data = false;
        if($request->ajax())
        {
           if($this->add_cart($request))
           {
            $data = true;
           }
        }
        return response()->json(['data' => $data]);
    }






    public function add_cart($request)
    {
        if($request)
        {
            $product = Product::where('id', $request->product_id)->where('is_product_feature', 1)->first();

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($request->product_id,$product, $request->size, $request->quantity);

            Session::put('cart', $cart);
            return true;
        }
        return false;
    }






    public function cart_quantity_action_ajax(Request $request)
    {
        $data = false;
        if($request->ajax())
        {
            $product = Product::where('id', $request->product_id)->first();
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            $cart->update_quantity($request->product_id, $product, $request->size, $request->quantity);
            Session::put('cart', $cart);
            $data = true;
        }
        return response()->json(['data' => $data]);
    }






    // DELETE ITEMS FROM CART
    public function cart_item_delete_ajax(Request $request)
    {
        $data = false;
        if($request->json())
        {   
            $this->delete($request);
            $data = true;
        }
        return response()->json(['data' => $data]);
    }
    




    public function delete($request)
    {
        if($request)
        {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->delete_cart($request->product_id, $request->size);
            
            Session::put('cart', $cart);
            if(Session::get('cart')->_totalQty == 0)
            {
                Session::forget('cart');
            }
            return true;
        }
        return false;
    }






    // GET CART QUANTITY
    public function get_cart_quantity_ajax(Request $request)
    {
        if($request->ajax())
        {
            $cart_quantity = 0;
            if(Session::has('cart'))
            {
                $cart_quantity = Session::get('cart')->_totalQty;
            }
        }
        return response()->json(['cart_quantity' => $cart_quantity]);
    }

   



    // QUICK ADD TO CART
    public function quick_add_to_cart_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = false;
            if($this->add_cart($request))
            {
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }





    // GET CART DROPDOWN
    public function get_cart_dropdown_ajax(Request $request)
    {
        if($request->ajax())
        {
            return view('web.common.get-ajax-cart-dropdown');
        }
    }






    // QUICK DELETE CART DROPDOWN ITEMS
    public function delete_cart_dropdown_ajax(Request $request)
    {
        $data = false;
        if($request->json())
        {   
            $this->delete($request);
            $data = true;
        }
        return response()->json(['data' => $data]);
    }






    public function quick_view_add_to_cart_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = false;
            if($this->add_cart($request))
            {
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }



    // end
}

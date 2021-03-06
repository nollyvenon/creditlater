<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\Product;
use App\Models\Web\Wishlist;
use App\Models\Web\Auth;
use App\Models\Web\Cart;


use DB;
use Session;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function index()
    {

        // dd(Session::get('cart'));

        //  side categories
        $sideCategories = Category::where('is_feature', 1)->get();

        // wish list quantity
        $wishList_quantity = $this->wish_list_quantity();

    
        // get wish list
        $wishlist_items = $this->get_wish_list();
  

        return view('web.wishlist', compact('sideCategories', 'wishlist_items', 'wishList_quantity'));
    }






    // GET WISH LIST
    public function get_wish_list()
    {
        $wishlist_items = 0;
        if($user_id = Auth::user()['id'])
        {
            $wishlist = DB::table('wishlists')->leftJoin('products', 'wishlists.product_id', '=', 'products.id')->where('wishlist_user_id', $user_id)->get();
            if(count($wishlist) != "")
            {
                $wishlist_items = $wishlist;
            }
        }
        return $wishlist_items;
    }






    public function add_to_wishlist_ajax(Request $request)
    {
        if($request->ajax())
        {   
            $data = false;
            $product = Product::where('id', $request->product_id)->where('is_product_feature', 1)->first();

            if(Auth::user())
            {
                if($this->registered_user_wish_list($product, $request))
                {
                    $data = true;
                }
            
            }
        }
        return response()->json(['data' => $data]);
    }







    public function registered_user_wish_list($product, $request)
    {
        $user_id = Auth::user()['id'];
        if($user_id)
        {

        $date =  $date = date('Y-m-d H:i:s');

        $quantity = $request->quantity;
        $total = $product->products_price * $quantity;
        $size = $request->size ? $request->size : 'unspecified';
        
        $wish_list = WishList::create([
            'wishlist_user_id' => $user_id,
            'product_id' => $request->product_id,
            'price' => $product->products_price,
            'quantity' => $quantity,
            'total' => $total,
            'size' => $size,
            'date_added' => $date,
        ]);

           return true;
       }
       return false;
    }








    // DELETE WISH LIST ITEM
    public function delete_wishlist_item_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = $this->delete_wishlist($request);
        }
        return response()->json(['data' => $data]);
    }





    public function delete_wishlist($request)
    {
        if($user_id = Auth::user()['id'])
        {
            $data = WishList::where('wishlist_user_id', $user_id)->where('product_id', $request->product_id)->where('size', $request->size)->delete();            
        }
        return $data;
    }





    // QUICK ADD TO WISH LIST 
    public function quick_add_to_wishlist_ajax(Request $request)
    {
        if($request->ajax())
        {
           if(Auth::user())
           {
                $product = Product::where('id', $request->product_id)->where('is_product_feature', 1)->first();
                $data = $this->registered_user_wish_list($product, $request);
           }
        }
        return response()->json(['data' => $data]);
    }






    // GET WISHLIST QUANTITY
    public function get_list_quantity_ajax(Request $request)
    {
       if($request->ajax())
       {
           $quantity = $this->wish_list_quantity();
       }
       return response()->json(['quantity' => $quantity]);
    }





    public function wish_list_quantity()
    {
        $quantity = 0;
        if($user_id = Auth::user()['id'])
        {
            $old_wishList = WishList::where('wishlist_user_id', $user_id)->get();  
            if(count($old_wishList) != "")
            {
                $data = 0;
                foreach($old_wishList as $values)
                {
                    $quantity += $values->quantity;
                }
            }
        }
        return $quantity;
    }





    public function get_quick_wishlist_items_ajax(Request $request)
    {

       if($request->ajax())
       {
           return view('web.common.get-ajax-wishlist');
       }
    }




    public function quick_delete_wishlist_item_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = $this->delete_wishlist($request);
        }
        return response()->json(['data' => $data]);
    }








    public function add_wishlist_item_to_cart_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = false;
            if($user = Auth::user())
            {
                $wishlist = WishList::where('wishlist_user_id', $user['id'])->where('product_id', $request->product_id)->where('size', $request->size)->first();
                $product = Product::where('id', $request->product_id)->first();
                $oldCart = Session::has('cart')? Session::get('cart') : null;

                $cart = new Cart($oldCart);
                $cart->add($request->product_id, $product, $wishlist->size, $wishlist->quantity);
                Session::put('cart', $cart);

               if( $wishlist->delete())
               {
                $data = true;
               }
            }
            
            // $data = true;
        }
        return response()->json(['data' => $data]);
    }


    // end
}

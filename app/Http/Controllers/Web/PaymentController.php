<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use App\Models\Web\User;
use App\Models\Web\Auth;
use App\Models\Web\Paid;
use App\Models\Web\Category;
use App\Models\Web\PaidBuyer;
use App\Models\Web\Paystack;
use App\Models\Web\Product;
use Illuminate\Support\Facades\Hash;


use DB;
use Session;
use Carbon\Carbon;
use Redirect;
use Validator;

class PaymentController extends Controller
{

   
    public function checkout_one_time_payment_paystack(Request $request)
    {
        if(!Auth::user())
        {
            return back()->with('error', 'Something went wrong');
        }
        $payment_fields = $request->validate([
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:15',
            'address' => 'required|min:3|max:200',
            'city' => 'required|min:3|max:200',
            'state' => 'required|min:3|max:200',
            'country' => 'required|min:3|max:200',
            'postal_code' => 'required|min:3|max:100',
            'shipping' => 'required',
        ]);

        Session::put('buyer_details', $request->all());
        $callback_url = url('/order-success');     
        Paystack::initialize($request->email, $request->amount, $callback_url);
    }




    // checkout view
    public function checkout_view()
    {
        if(Session::has('reference'))
        {
            return redirect('order-success');
        }
        if(!Session::has('cart'))
        {
            return redirect('/');
        }

        if(!Auth::user())
        {
            return redirect('/')->with('alert', 'Signup or login to access that page!');
        }
       
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();  

        return view('web.checkout', compact('sideCategories'));
    }












    public function store_paid_products($reference)
    {
        if($reference)
        {
            $user = Auth::user();
            $stored_user = User::where('id', $user['id'])->where('email', $user['email'])->first();
            if($user)
            {
                $cart_items = Session::get('cart')->_items;
                foreach($cart_items as $items)
                {
                    $paid = new Paid();
                    $paid->create([
                        'buyer_user_id' => $user['id'],
                        'reference_number' => $reference,
                        'product_id' => $items['product_id'],
                        'price' =>  $items['price'],
                        'quantity' =>  $items['quantity'],
                        'total' =>  $items['total'],
                        'size' => $items['size']
                    ]);
                }

                foreach($cart_items as $items)
                {
                    $product = Product::where('id', $items['product_id'])->first();
                    $product->products_quantity -= $items['quantity'];
                    $product->quantity_sold  += $items['quantity'];
                    $product->save();
                }
                Session::forget('cart');
                return true;
            }
        }
        return false;
    }








    public function store_buyers_details($reference)
    {
        if(Session::has("buyer_details"))
        {
            $buyer_details = Session::get('buyer_details');

            $store = new PaidBuyer();
            $store->user_id = Auth::user()['id'];
            $store->reference = $reference;
            $store->first_name = $buyer_details['first_name'];
            $store->last_name = $buyer_details['last_name'];
            $store->phone = $buyer_details['phone'];
            $store->state = $buyer_details['state'];
            $store->city = $buyer_details['city'];
            $store->address = $buyer_details['address'];
            $store->country = $buyer_details['country'];
            $store->email = $buyer_details['email'];
            $store->shipping = $buyer_details['shipping'];
            $store->postal_code = $buyer_details['postal_code'];
            $store->amount = $buyer_details['amount'];
            $store->save();
            
            $this->store_paid_products($reference);  //store paid products

            Session::forget('buyer_details');
            return true;
        }
    }







    public function get_loggedin_user_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = true;
            $user = Auth::user();
            $loggedIn = User::where('id', $user['id'])->where('email', $user['email'])->where('active', 1)->first();
             if(!$loggedIn)
             {
                Session::flash('alert', "login or signup to purchase items!");
                $data = null;
             }
        }
        return response()->json(['data' => $data]);
    }








    public function order_success()
    {
        // Session::put('reference', '897893329');
        $sideCategories = Category::where('is_feature', 1)->get();  
        
        if(Session::has('buyer_details'))
        {
            $reference = Paystack::call_back();
            $this->store_buyers_details($reference);  //store buyers details

            $order = DB::table('paid_buyers')->where('reference', $reference)->where('user_id', '=', Auth::user()['id'])->get();
        }else{
            return redirect('/');
        }

        return view('web.order-success', compact('sideCategories', 'order'));
    }




  


    // end
}
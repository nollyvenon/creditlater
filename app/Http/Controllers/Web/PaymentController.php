<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use App\Models\Web\User;
use App\Models\Web\Auth;
use App\Models\Web\Paid;
use App\Models\Web\Category;
use App\Models\Web\PaidBuyer;
use Illuminate\Support\Facades\Hash;


use DB;
use Session;
use Carbon\Carbon;
use Paystack;
use Redirect;
use Validator;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }






    // checkout view
    public function checkout_view()
    {
        if(Session::has('reference'))
        {
            return redirect('order-success');
        }

        if(!Auth::user())
        {
            return redirect('/')->with('alert', 'Signup or login to access that page!');
        }
       
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();  

        return view('web.checkout', compact('sideCategories'));
    }












    public function _store_paid_products(Request $request)
    {
        if($request->ajax())
        {
            $user = Auth::user();
            $stored_user = User::where('id', $user['id'])->where('email', $user['email'])->first();
            if($user)
            {
                $cart_items = Session::get('cart')->_items;
                foreach($cart_items as $items)
                {
                    $paid = new Paid();
                    $total = $items['price'] * $items['quantity'];
                    $paid->create([
                        'user_id' => $user['id'],
                        'reference_number' => $request->reference,
                        'product_id' => $items['product_id'],
                        'price' =>  $items['price'],
                        'quantity' =>  $items['quantity'],
                        'total' =>  $total,
                        'small' =>  $items['small'],
                        'medium' =>  $items['medium'],
                        'large' =>  $items['large'],
                        'xtra_large' =>  $items['xtra large'],
                        'unspecified' =>  $items['unspecified'],
                    ]);
                }
                $this->store_buyers_details($request->reference);
                Session::put('reference', $request->reference);
                Session::forget('cart');
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
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
            $store->save();

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





    public function get_checkout_form_validationajax(Request $request)
    {
        if($request->ajax())
        {
            $data = true; 
            $first_name = null;
            $last_name = null;
            $phone = null;
            $email = null;
            $address = null;
            $city = null;
            $state = null;
            $country = null;
            $postal_code = null;
            $shipping = null;
            $error_array = array();

             if(empty($request->first_name))
             {
                 $first_name = "First name field is required";
             }else if(strlen($request->first_name) < 3)
                 {
                    $first_name = "First name must be minimum of 3 characters";
                 }else if(strlen($request->first_name) > 50){
                    $first_name = "First name must be maximum of 50 characters";
                 }
             


             if(empty($request->last_name))
             {
                 $last_name = "last name field is required";
             }else if(strlen($request->last_name) < 3)
             {
                $last_name = "Last name must be minimum of 3 characters";
             }else if(strlen($request->last_name) > 50){
                $last_name = "Last name must be maximum of 50 characters";
             }

             if(empty($request->phone))
             {
                 $phone = "phone field is required";
             }else if(strlen($request->phone) != 11){
                $phone = "phone must be 11 characters long";
             }

             if(empty($request->email))
             {
                 $email = "email field is required";
             }else if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $email = "Invalid email format";
              }else{
                  $user_email = User::Where('id', Auth::user()['id'])->where('email', $request->email)->first();
                  if(!$user_email){
                      $email = "Insert your email address";
                  }
              }

             if(empty($request->address))
             {
                 $address = "address field is required";
             }else if(strlen($request->address) > 400){
                $address = "address must be a maximum of 400 characters";
             }else  if(strlen($request->address) < 10){
                $address = "address must be a minimum of 10 characters";
             }

             if(empty($request->city))
             {
                 $city = "city field is required";
             }else if(is_numeric($request->city)){
                 $city = "Wrong city name";
             }
             if(empty($request->postal_code))
             {
                 $postal_code = "postal_code field is required";
             }
             if(empty($request->shipping))
             {
                $shipping = "shipping field is required";
             }
             if(empty($request->country))
             {
                $country = "country field is required";
             }





             $error_message = ['first_name' => $first_name, 'last_name'=>$last_name,'phone' => $phone,
                              'email'=>$email, 'address'=>$address,'city'=>$city,'country'=>$country,
                              'postal_code'=>$postal_code, 'shipping' => $shipping
                            ];
             foreach($error_message as $values)
             {
                 if(!empty($values))
                 {
                    $error_array[] = $values; 
                 }
             }
            
            if(!empty($error_array))
            {
                return response()->json(['errors' => $error_message]);
            }else{
                    $buyer_details = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone,
                            'state' => $request->state, 'city' => $request->city, 'country' => $request->country, 'address' => $request->address, 
                            'email' => $request->email, 'shipping' => $request->shipping, 'postal_code' => $request->postal_code];
                Session::put('buyer_details', $buyer_details);
            }
        }
        return response()->json(['data' => $data]);
    }







    public function order_success()
    {
        $sideCategories = Category::where('is_feature', 1)->get();  
        if(Session::has('reference'))
        {
            $reference = Session::get('reference');
            $order = DB::table('paid_buyers')->where('reference', $reference)->leftJoin('paids', 'paid_buyers.reference', '=', 'paids.reference_number')
                    ->leftJoin('products', 'paids.product_id' , '=', 'products.id')->get();

            Session::forget('reference'); //deletes the reference from session
        }else{
            return redirect('/');
        }

        return view('web.order-success', compact('sideCategories', 'order'));
    }




  


    // end
}
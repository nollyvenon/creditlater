<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\Auth;
use App\Models\Web\Verification;
use App\Models\Web\User;



use Session;



class InstallmentController extends Controller
{

 

    public function index()
    {
         // dd( (35 / 100) * 120000 ); percentage convertion
//   dd(Session::get('installmentDetal'));
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        if(Auth::user())
        {
            if(Session::has('cart'))
            {
                $installments = 0;
                $total_price = Session::get('cart')->_totalPrice;
                if($total_price <= 20000)
                {
                    $installments = 2;
                } else if($total_price <= 30000)
                {
                    $installments = 3;
                } else if($total_price <= 50000)
                {
                    $installments = 4;
                }else{
                    $installments = 6;
                }
                $initial_payment = (35 / 100) * $total_price;
                $balance = $total_price - $initial_payment;
                // dd( (35/100) * $total_price );
            }
        }else{
            return redirect('/')->with('alert', 'Signup or login to view that page!');
        }

        return view('web.installments', compact('sideCategories', 'installments', 'initial_payment', 'balance'));
    }








    






    public function installment_method_ajax(Request $request)
    {
        
        if($request->ajax())
        {
           
        }
        return response()->json(['data' => $data]);
    }





    public function get_verification_check_ajax(Request $request)
    {
       if($request->ajax())
       {
            $data = true;
            $Verification = Verification::where('user_id', Auth::user('user')['id'])->first();
            if(!$Verification)
            {
               $data = false;
            }else if(!$Verification->is_approved)
            {
                $data = 'not_approved';
            }
         
       }
       return response()->json(['data' => $data]);
    }













    

    public function intallment_paymane_ajax(Request $request)
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
                              'postal_code'=>$postal_code, 'shipping' => $shipping];
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

                $installments = 0;
                $total_price = Session::get('cart')->_totalPrice;
                if($total_price <= 20000)
                {
                    $installments = 2;
                } else if($total_price <= 30000)
                {
                    $installments = 3;
                } else if($total_price <= 50000)
                {
                    $installments = 4;
                }else{
                    $installments = 6;
                }
                $initial_payment = (35 / 100) * $total_price;
                $balance = $total_price - $initial_payment;

                    $installmentDetail = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone,
                            'state' => $request->state, 'city' => $request->city, 'country' => $request->country, 'address' => $request->address, 
                            'email' => $request->email, 'shipping' => $request->shipping, 'postal_code' => $request->postal_code,
                             'installment' => $installments, 'initial_payment'=> $initial_payment, 'balance' => $balance
                        ];

                    Session::put('installmentDetal', $installmentDetail);
            }
        }
        return response()->json(['data' => $data, 'initial_payment' => $installmentDetail['initial_payment']]);
    }









    public function order_success()
    {
        $sideCategories = Category::where('is_feature', 1)->get();  
        if(Session::has('reference'))
        {
            $reference = Session::get('reference');
            $order = DB::table('paid_buyers')->where('reference', $reference)->leftJoin('paids', 'paid_buyers.reference', '=', 'paids.reference_number')
                    ->leftJoin('products', 'paids.product_id' , '=', 'products.id')->get();
        }else{
            return redirect('/')->with('alert', "You are not allowed to view that page");
        }

        return response()->json(['data' => $data]);
    }








    // public function store_buyers_details($reference)
    // {
    //     if(Session::has("buyer_details"))
    //     {
    //         $buyer_details = Session::get('buyer_details');

    //         $store = new PaidBuyer();
    //         $store->user_id = Auth::user()['id'];
    //         $store->reference = $reference;
    //         $store->first_name = $buyer_details['first_name'];
    //         $store->last_name = $buyer_details['last_name'];
    //         $store->phone = $buyer_details['phone'];
    //         $store->state = $buyer_details['state'];
    //         $store->city = $buyer_details['city'];
    //         $store->address = $buyer_details['address'];
    //         $store->country = $buyer_details['country'];
    //         $store->email = $buyer_details['email'];
    //         $store->shipping = $buyer_details['shipping'];
    //         $store->postal_code = $buyer_details['postal_code'];
    //         $store->save();

    //         Session::forget('buyer_details');
    //         return true;
    //     }
    // }




    // public function _store_paid_products(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $user = Auth::user();
    //         $stored_user = User::where('id', $user['id'])->where('email', $user['email'])->first();
    //         if($user)
    //         {
    //             $cart_items = Session::get('cart')->_items;
    //             foreach($cart_items as $items)
    //             {
    //                 $paid = new Paid();
    //                 $total = $items['price'] * $items['quantity'];
    //                 $paid->create([
    //                     'user_id' => $user['id'],
    //                     'reference_number' => $request->reference,
    //                     'product_id' => $items['product_id'],
    //                     'price' =>  $items['price'],
    //                     'quantity' =>  $items['quantity'],
    //                     'total' =>  $total,
    //                     'small' =>  $items['small'],
    //                     'medium' =>  $items['medium'],
    //                     'large' =>  $items['large'],
    //                     'xtra_large' =>  $items['xtra large'],
    //                     'unspecified' =>  $items['unspecified'],
    //                 ]);
    //             }
    //             $this->store_buyers_details($request->reference);
    //             Session::put('reference', $request->reference);
    //             Session::forget('cart');
    //             $data = true;
    //         }
    //     }
    //     return response()->json(['data' => $data]);
    // }







    // end
}

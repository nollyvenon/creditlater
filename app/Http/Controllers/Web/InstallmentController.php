<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\Auth;
use App\Models\Web\Verification;
use App\Models\Web\User;
use App\Models\Web\Installment;
use App\Models\Web\InstallmentProduct;



use DB;
use Session;



class InstallmentController extends Controller
{

 

    public function index()
    {
         // dd( (35 / 100) * 120000 ); percentage convertion
//   dd(Session::get('installmentDetal'));
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        // check for reference id and redirect to success page
        if(Session::has('installment_reference'))
        {
            return redirect('installment-success');
        }
        
        if(!Auth::user())
        {
            return redirect('/')->with('alert', 'Signup or login to access that page!');
        }

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













    

    public function intallment_payment_ajax(Request $request)
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
            $initial_payment = null;
            $error_array = array();

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
            $payment_percentage = (35 / 100) * $total_price;
            $balance = $total_price - $request->initial_payment;


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
             if(empty($request->initial_payment))
             {
                $initial_payment = "Initial payment field is required";
             }else if(!is_numeric($request->initial_payment))
             {
                $initial_payment = "Invalid payment format";
             }else if($request->initial_payment < $payment_percentage)
             {
                $money = "&#x20A6;".number_format($payment_percentage);
                $initial_payment = "Initial payment must be minimum of ".$money;
             }else if($request->initial_payment > $total_price)
             {
                $money =  $money = "&#x20A6;".number_format($total_price);
                $initial_payment = "Payment must be maximum of ".$money;
             }





             $error_message = ['first_name' => $first_name, 'last_name'=>$last_name,'phone' => $phone,
                              'email'=>$email, 'address'=>$address,'city'=>$city,'country'=>$country,
                              'postal_code'=>$postal_code, 'shipping' => $shipping, 'initial_payment' => $initial_payment];
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
                    $installmentDetail = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'phone' => $request->phone,
                            'state' => $request->state, 'city' => $request->city, 'country' => $request->country, 'address' => $request->address, 
                            'email' => $request->email, 'shipping' => $request->shipping, 'postal_code' => $request->postal_code,
                            'installment' => $installments, 'balance' => $balance, 'initial_payment'=> $request->initial_payment,
                            'total_price' => $total_price
                        ];

                    Session::put('installmentDetail', $installmentDetail);
            }
        }
        return response()->json(['data' => $data, 'initial_payment' => $request->initial_payment]);
    }









    public function installment_success()
    {
        // get subcategories
        $sideCategories = Category::where('is_feature', 1)->get(); 


        if(Session::has('installment_reference'))
        {
            $reference = Session::get('installment_reference');
            $order = DB::table('installments')->where('reference', $reference)->leftJoin('installment_products', 'installments.reference', '=', 'installment_products.reference_number')
                    ->leftJoin('products', 'installment_products.product_id' , '=', 'products.id')->get();

                    Session::forget('installment_reference'); //deletes the reference from session
        }else{
            return redirect('/');
        }

        return view('web.order-success', compact('sideCategories', 'order'));
    }








    public function store_installment_buyers_details($reference)
    {
        if(Session::has("installmentDetail"))
        {
            $installmentDetails = Session::get('installmentDetail');

            $store = new Installment();
            $store->installment_user_id = Auth::user()['id'];
            $store->reference = $reference;
            $store->first_name = $installmentDetails['first_name'];
            $store->last_name = $installmentDetails['last_name'];
            $store->phone = $installmentDetails['phone'];
            $store->state = $installmentDetails['state'];
            $store->city = $installmentDetails['city'];
            $store->address = $installmentDetails['address'];
            $store->country = $installmentDetails['country'];
            $store->email = $installmentDetails['email'];
            $store->shipping = $installmentDetails['shipping'];
            $store->postal_code = $installmentDetails['postal_code'];
            $store->installment = $installmentDetails['installment'];
            $store->balance = $installmentDetails['balance'];
            $store->total_price = $installmentDetails['total_price'];
            $store->initial_payment = $installmentDetails['initial_payment'];
            $store->save();

            Session::forget('installmentDetail');
            return true;
        }
    }




    public function store_intallment_items_ajax(Request $request)
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
                    $paid = new InstallmentProduct();
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
                $this->store_installment_buyers_details($request->reference);
                Session::put('installment_reference', $request->reference);
                Session::forget('cart');
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }




    public function installment_orders()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        //get buyers orders
        $buyer_order = null;
        if(Auth::user())
        {
            $user_id = Auth::user()['id'];
            $installment_orders = DB::table('installments')->where('installment_user_id', $user_id)
                        ->leftJoin('installment_products', 'installments.reference', '=', 'installment_products.reference_number')
                        ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->limit(4)->get();
        
            if(count($installment_orders) == "")
            {
                $installment_orders = null;
            }
        }else{
            return redirect('/')->with('alert', 'Signup or login to access that page!');
        }

        return view('web.installment_orders', compact('sideCategories', 'installment_orders'));
    }


    public function installment_orders_all()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        $user_id = Auth::user()['id'];
        $installment_orders = DB::table('installments')->where('installment_user_id', $user_id)
                    ->leftJoin('installment_products', 'installments.reference', '=', 'installment_products.reference_number')
                    ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();

        return view('web.installment_orders', compact('sideCategories', 'installment_orders'));
    
    }



    public function installment_complete_payment_show()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        $user_id = Auth::user()['id'];
        $installment_orders = DB::table('installments')->where('installment_user_id', $user_id)->where('is_complete', 0)
                    ->leftJoin('installment_products', 'installments.reference', '=', 'installment_products.reference_number')
                    ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();


        return view('web.installment_orders', compact('sideCategories', 'installment_orders'));
    }





    public function complete_payment_show()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        return view('web.complete_payments', compact('sideCategories'));
    }





    public function complete_payment_now_ajax(Request $request)
    {
        if($request->ajax())
        {
            if($user_id = Auth::user())
            {
                $email = null;
                $amount = null;
                $error_array = array();
                $installmentBuyer = Installment::where('installment_user_id', $user_id['id'])->where('is_complete', 0)->first();

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

                if(empty($request->amount))
                {
                    $amount = "amount field is required";
                }else if($request->amount > $installmentBuyer->balance)
                {
                    $money =  $money = "&#x20A6;".number_format($installmentBuyer->balance);
                    $amount = "Payment must be maximum of ".$money;
                }
                //   i stopped here

                $error_message = ['email' => $email, 'amount' => $amount ];
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
                }
            }
        }
        return response()->json(['data' => $data]);
    }


    // end
}

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
use App\Models\Web\Product;
use App\Models\Web\Paystack;




use DB;
use Session;



class InstallmentController extends Controller
{

 

    public function index()
    {
         // dd( (35 / 100) * 120000 ); percentage convertion

        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();
        
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
                $installments = DB::table('installment_methods')->where('range', '<=', $total_price)->orderBy('range', 'desc')->first()->count;
                
                $initial_payment = (35 / 100) * $total_price;
                // dd( (35/100) * $total_price );
            }
        }else{
            return redirect('/')->with('alert', 'Signup or login to view that page!');
        }

        return view('web.installments', compact('sideCategories', 'installments', 'initial_payment'));
    }





    public function pay_installment(Request $request)
    {
        if(!Auth::user())
        {
            return back()->with('error', 'Something went wrong');
        }

        $Verification = Verification::where('user_id', Auth::user('user')['id'])->first();
        if(!$Verification)
        {
            return back()->with('verification_error', 1);
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
            'amount' => 'required',
            'shipping' => 'required',
        ]);
    
        $total_price = Session::get('cart')->_totalPrice;
        $initial_payment = (35 / 100) * $total_price;
       
        if($request->amount < $initial_payment)
        {
           
            return back()->with('amount_error', '*amount must be minimum of '.$initial_payment);
        }
        
        Session::put('insatllment_details', $request->all());
        
        $callback_url = url('/installment-success');        
        Paystack::initialize($request->email, $request->amount, $callback_url);
    }

    










    public function installment_success()
    {
        $sideCategories = Category::where('is_feature', 1)->get();  
        if(Session::has('insatllment_details'))
        {
            $reference = Paystack::call_back(); //paystack call back 
            $this->store_installment_buyers_details($reference);  //store buyers details

            $order = DB::table('installments')->where('reference', $reference)->where('installment_user_id', '=', Auth::user()['id'])->get();
        }else{
            return redirect('/');
        }

        return view('web.order-success', compact('sideCategories', 'order'));
    }








    public function store_installment_buyers_details($reference)
    {
        if(Session::has("insatllment_details"))
        {
            $installmentDetails = Session::get('insatllment_details');
            $total_price = Session::get('cart')->_totalPrice;
            $uniqID = uniqid(36);

            $store = new Installment();
            $store->installment_user_id = Auth::user()['id'];
            $store->reference = $reference;
            $store->unique_key = $uniqID;
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
            $store->installment = $installmentDetails['count'];
            $store->installment_count =  $installmentDetails['count']; //editted here
            $store->balance = $total_price - $installmentDetails['amount'];
            $store->total_price = $total_price;
            $store->initial_payment = $installmentDetails['amount'];
            $store->save();

            $this->store_installments($reference, $uniqID,  $installmentDetails);
            return true;
        }
    }










    public function store_installments($reference ,$uniqID, $installmentDetails)
    {
        $user = Auth::user();
    
        $total_price = Session::get('cart')->_totalPrice;
        $balance = $total_price - $installmentDetails['amount'];
         
        $update = DB::table("installment_balance")->insert(array(
           'balance_user_id' => $user['id'],
           'balance_reference' => $reference,
           'balance_unique_key' => $uniqID,
           'balance_total_price' => $total_price,
           'balance_paid' => $installmentDetails['amount'],
           'balance_balance' => $balance,
        ));

       
        if($installmentDetails['amount'] >= $total_price)
        {
            $installments = Installment::where('installment_user_id', $user['id'])->where('is_complete', 0)->first();
            $installments->is_complete = 1;
            $installments->save();
        } 

        $this->store_installment_paid_products($reference); //store installment paid products
    }









  
    public function store_installment_paid_products($reference)
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
                    $paid = DB::table('installment_products')->insert(array(
                        'user_id' => $user['id'],
                        'product_id' => $items['product_id'],
                        'reference_number' => $reference,
                        'price' =>  $items['price'],
                        'quantity' =>  $items['quantity'],
                        'total' =>  $items['total'],
                        'size' => $items['size']
                    ));
                }

                foreach($cart_items as $items)
                {
                    $product = Product::where('id', $items['product_id'])->first();
                    $product->products_quantity -= $items['quantity'];
                    $product->quantity_sold  += $items['quantity'];
                    $product->save();
                }
                Session::forget('cart');
                Session::forget('insatllment_details');
                return true;
            }
        }
        return false;
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










// INSTALLMENT ORDERS
    // public function installment_orders_all()
    // {
    //     //get all category
    //     $sideCategories = Category::where('is_feature', 1)->get();

    //     $user_id = Auth::user()['id'];
    //     $installment_orders = DB::table('installments')->where('installment_user_id', $user_id)
    //                 ->leftJoin('installment_products', 'installments.reference', '=', 'installment_products.reference_number')
    //                 ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();

                    
    //     return view('web.installment_orders', compact('sideCategories', 'installment_orders'));
    
    // }











    public function installment_complete_payment_show()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        $user_id = Auth::user()['id'];
        $installment_orders = DB::table('installments')->where('installment_user_id', $user_id)->where('is_complete', 0)->get();

        if(count($installment_orders) == "")
        {
            $installment_orders = null;
        }

        return view('web.installment_orders', compact('sideCategories', 'installment_orders'));
    }






    public function complete_installment_payment(Request $request)
    {
        $payment_fields = $request->validate([
            'email' => 'required|email',
            'amount' => 'required',
        ]);

        //i stopped here

        Session::put('insatllment_balance', $request->all());
    }







    public function complete_payment_show($reference)
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();

        if(Session::has('installments'))
        {
            Session::forget('installments');
        }

        // installment balance
        $balance = Installment::where('installment_user_id', Auth::user()['id'])->where('is_complete', 0)->first();
        if(!$balance)
        {
          return redirect('account')->with('success', "Congratulations, you have completed this transaction!");
        }

        // get installment balance
        $installment_balance = DB::table('installment_balance')->where('balance_reference', $reference)->get();


        // get installment products
        $installment_products = DB::table('installment_products')->where('reference_number', $reference)
                        ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();

        $payment_balance = Installment::where('reference', $reference)->where('is_complete', 0)->first();

       

        return view('web.complete_payments', compact('sideCategories', 'payment_balance', 'installment_balance', 'installment_products'));
    }












  







    public function update_installments_ajax(Request $request)
    {
        if($request->ajax())
        {
            $user = Auth::user();
            $paid_installment = Session::get('installments'); 
            $installments = Installment::where('installment_user_id', $user['id'])->where('is_complete', 0)->first();

            $balance = $installments['balance'] - $paid_installment['amount'];
             
            $update = DB::table("installment_balance")->insert(array(
               'balance_user_id' => $user['id'],
               'balance_reference' => $request->reference,
               'balance_unique_key' => $installments['unique_key'],
               'balance_paid' => $paid_installment['amount'],
               'balance_total_price' => $installments['total_price'],
               'balance_balance' => $balance,
            ));

            $installments->balance = $balance;
            $installments->installment_count =  $installments->installment_count - 1; 
            if($balance == 0)
            {
                $installments->is_complete = 1;
            }

            Session::flash('success', 'Payment has been made successfully!');
            $installments->save();
            $data = true;
        }
        return response()->json(['data' => $data]);
    }






    // end
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use Session;
use DB;

class AdminIndexController extends Controller
{
    public function index()
    {
        if(!Session::has('admin'))
        {
            return redirect('admin/login');
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }
        
        $todays_date =  date("Y-m-d H:s:i");
       
       
        // get total amount of today one time revenue
        $oneTimePayment = DB::table('paid_buyers')->where('paid_date', '>=', $todays_date )->get();
        if(count($oneTimePayment) != '')
        {
            $onetime_dayRevenue = 0;
            foreach($oneTimePayment as $revenue)
            {
                $onetime_dayRevenue += $revenue->amount;
            }
        }else{
            $onetime_dayRevenue = 0000;
        }
       

        // get total amount of today installment revenue
        $total_installment = DB::table('');
      

        // get new customers
        $todays_date =  date("Y-m-d H:s:i");
        $new_customers = DB::table('users')->where('date_joined', '>=', $todays_date)->get();

        // get one time recent orders
        $recent_orders = DB::table('paids')->leftJoin('products', 'paids.product_id', '=', 'products.id')
                              ->leftJoin('paid_buyers', 'paids.reference_number', '=', 'paid_buyers.reference')->limit(5)->get();


        
        // get new visitors
        $last_week = date('Y-m-d H:i:s', strtotime('-7 days'));
        $new_visitors = DB::table('visitors')->where('visit_date', '>=', $last_week)->get();
        $total_new_visitors = DB::table('visitors')->get();


        // get total product views
        $total_products_views = 0;
        $total_product_views = DB::table('products')->get();
        foreach($total_product_views as $products)
        {
            $total_products_views += $products->product_views;
        }
    

        // get highest product view
        $highest_product_views = DB::table('products')->orderBy('product_views', 'desc')->first();
        

        return view('admin.index', compact('admin', 'onetime_dayRevenue', 'new_customers', 'recent_orders', 'total_new_visitors', 
                                    'total_products_views', 'highest_product_views', 'new_visitors'));
    }


    // end
}

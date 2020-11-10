<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;


class AdminProductDelivery extends Controller
{
    public function index()
    {
        $deliveries = DB::table('paid_buyers')->leftJoin('paids', 'paid_buyers.user_id', 'paids.buyer_user_id')
                            ->leftJoin('products', 'paids.product_id', '=', 'products.id')->get();
        if(count($deliveries) == '')
        {
            $deliveries = null;
        }
        return view('admin.delivery', compact('deliveries'));
    }




    public function installment_delivery()
    {
        $deliveries = DB::table('installments')->leftJoin('installment_products', 'installments.installment_user_id', 'installment_products.user_id')
                 ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();
            if(count($deliveries) == '')
            {
            $deliveries = null;
            }

        
        return view('admin.installment_delivery', compact('deliveries'));
    }





    public function product_return()
    {
        $return_products = DB::table('return_products')->leftJoin('users', 'return_products.buyer_id', '=', 'users.id')->get();
        if(count($return_products) == '')
        {
        $return_products = null;
        }
    
        return view('admin.product_return', compact('return_products'));
    }




    // end
}

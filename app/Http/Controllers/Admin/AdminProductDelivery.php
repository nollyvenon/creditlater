<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use DB;
use Session;


class AdminProductDelivery extends Controller
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


        $deliveries = DB::table('paids')->leftJoin('paid_buyers', 'paids.reference_number', '=' , 'paid_buyers.reference')
                      ->leftjoin('products', 'paids.product_id', '=', 'products.id')->get();
        if(count($deliveries) == '')
        {
            $deliveries = null;
        }

        
        return view('admin.delivery', compact('deliveries', 'admin'));
    }




    public function installment_delivery()
    {
            $deliveries = DB::table('installments')->leftJoin('installment_products', 'installments.installment_user_id', 'installment_products.user_id')
                 ->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();
            if(count($deliveries) == '')
            {
            $deliveries = null;
            }

            $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
            if(!$admin)
            {
                $admin = null;
            }

        
        return view('admin.installment_delivery', compact('deliveries', 'admin'));
    }




    //  return products
    public function product_return()
    {
        $return_products = DB::table('return_products')->leftJoin('users', 'return_products.buyer_id', '=', 'users.id')->get();
        if(count($return_products) == '')
        {
        $return_products = null;
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }
    
        return view('admin.product_return', compact('return_products', 'admin'));
    }




    // end
}

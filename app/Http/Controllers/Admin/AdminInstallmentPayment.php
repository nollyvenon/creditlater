<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;

use DB;
use Session;

class AdminInstallmentPayment extends Controller
{
    public function index()
    {
        if(!Session::has('admin'))
        {
            return redirect('admin/login');
        }

        $installments = DB::table('installments')->get();

        if(count($installments) == "")
        {
            $installments = null;
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        return view('admin.installments', compact('installments', 'admin'));
    }





    public function installment_detials()
    {
        return view('admin.installment_detail');
    }



    public function installment_detials_create(Request $request, $key)
    {
        $get_installment = DB::table('installments')->where('unique_key', $key)
                           ->leftJoin('installment_balance', 'installments.unique_key', '=', 'installment_balance.balance_unique_key')->get();
        if(count($get_installment) == "")
        {
            $get_installment = null;
        }

        return view('admin.installment_detail', compact('get_installment'));
    }





    public function installment_products()
    {
        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        $installment_products = DB::table('installment_products')->leftJoin('products', 'installment_products.product_id', '=', 'products.id')->get();
        if(count($installment_products) == '')
        {
            $installment_products = null;
        }

        // total installment realized from installment
        $total = 0;
        foreach($installment_products as $sold)
        {
            $total += $sold->total;
        }


        return view('admin.installment_product', compact('admin', 'installment_products', 'total'));
    }




    public function installment_products_delete($id)
    {
        if($id)
        {
            DB::table('installment_products')->where('installment_product_id', $id)->delete();  
        }
        return back();
    }




    // end
}

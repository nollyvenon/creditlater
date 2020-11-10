<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;

class AdminInstallmentPayment extends Controller
{
    public function index()
    {
        $installments = DB::table('installments')->get();

        if(count($installments) == "")
        {
            $installments = null;
        }

        return view('admin.installments', compact('installments'));
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









    // end
}

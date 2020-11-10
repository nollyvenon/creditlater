<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;

class AdminPaidController extends Controller
{
    public function index()
    {
        // get all one time paid orders
        $paid_orders = DB::table('paid_buyers')->get();
        if(count($paid_orders) == "")
        {
            $paid_orders = null;
        }
        return view('admin.paid', compact('paid_orders'));
    }








    public function paid_detail(Request $request, $reference)
    {
         // get all one time paid orders
         $paid_details = DB::table('paid_buyers')->where('reference', $reference)
                         ->leftJoin('paids', 'paid_buyers.reference', '=', 'paids.reference_number')
                         ->leftJoin('products', 'paids.product_id', '=', 'products.id')->get();

         if(count($paid_details) == "")
         {
             $paid_details = null;
         }

         return view('admin.paid_detail', compact('paid_details'));
    }





    // end
}

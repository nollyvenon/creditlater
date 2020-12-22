<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;

use DB;
use Session;

class AdminPaidController extends Controller
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


        // get all one time paid orders
        $paid_orders = DB::table('paid_buyers')->get();
        if(count($paid_orders) == "")
        {
            $paid_orders = null;
        }
        return view('admin.paid', compact('paid_orders', 'admin'));
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

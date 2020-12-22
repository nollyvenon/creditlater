<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use DB;
use Session;

class AdminProductSoldController extends Controller
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

        $sold_products = DB::table('paids')->leftJoin('products', 'paids.product_id', 'products.id')->get();
        $total = 0;
        foreach($sold_products as $sold)
        {
            $total += $sold->total;
        }

      
        return view('admin.sold', compact('admin', 'sold_products', 'total'));
    }







    public function sold_products_delete($id)
    {
        if($id)
        {
            DB::table('paids')->where('paid_id', $id)->delete();             
        }
        return back();
    }


    // end
}

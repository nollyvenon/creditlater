<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use DB;
use Session;

class AdminProductController extends Controller
{
    public function index()
    {

        if(!Session::has('admin'))
        {
            return redirect('admin/login');
        }


        // get products
        $products = DB::table('products')->leftJoin('brands', 'products.brand_id', '=', 'brands.brand_id')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')->get();
        if(count($products) == "")
        {
            $products = null;
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }


        return view('admin.products', compact('products', 'admin'));
    }




    public function product_approve($id)
    {
        if($id)
        {
            $product = DB::table('products')->where('id', $id)->first();
            if($product)
            {
                $is_approve = $product->is_approve ? 0 : 1;
                DB::table('products')->where('id', $id)->update(array(
                      'is_approve' => $is_approve
                ));
            }
        }
        return back();
    }




    // end
}

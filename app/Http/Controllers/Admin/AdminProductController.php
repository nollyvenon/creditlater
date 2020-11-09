<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class AdminProductController extends Controller
{
    public function index()
    {
        // get products
        $products = DB::table('products')->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')->get();
        if(count($products) == "")
        {
            $products = null;
        }
        return view('admin.products', compact('products'));
    }




    public function product_add()
    {
        return view('admin.product_add');
    }




    // end
}

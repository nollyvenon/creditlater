<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class VendorProductController extends Controller
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
        return view('vendor.products', compact('products'));
    }




    public function product_add()
    {
        
        return view('vendor.product_add');
    }
}

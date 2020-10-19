<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\Product;
use App\Models\Web\Brand;
use DB;


class CategoryController extends Controller
{
   
    public function index(){
        $categories = Category::where('is_feature', 1)->get(); //get all category
        return view("web.category", compact('categories'));
    }

    public function show(Request $request, $category_id)
    {
        $productByBrand = null;
        $brand_id = null;
        if($request->input()){
            // $productByBrand = Product::where('is_feature', 1)
            //                          ->where('category_id', $category_id)
            //                          ->where('brand_id', $request->input("brand_id"));
            $productFilter = Product::where('is_feature', 1);
            if($request->brand_id){
                $productFilter = Product::where('is_feature', 1)->where('brand_id', $brand_id)->get();
            }
           
            
            dd($productFilter);
        }

       
        $sideCategories = Category::where('is_feature', 1)->get();   //get all category
        
        $categories = Category::where('id', $category_id)->where('is_feature', 1)->first(); //get categories by id
        
       
        $brand_ids = DB::table('category_brand')->where('category_id', $category_id)->get();   // get brands associated with category id;
        $brands = array();
        foreach($brand_ids as $brand_id)
        {
            $brands[] = Brand::where('id', $brand_id->brand_id)->first();
        }
        $categoryBrands = $brands;

        // category left side products
        // $categoryNewProducts = Product::where('is_feature', 1)->orderBy('products_date_added', 'desc')->inRandomOrder()->limit(6)->get();
        // foreach($categoryNewProducts as $keys => $values)
        // {
        //     if($keys < 3)
        //     {
        //         $itemArry[] = $values;
        //     }
        // }
        // $container["items"] = $itemArry ;
        
        


        return view("web.category", compact('categoryBrands', 'sideCategories', 'categories', 'productByBrand'));
    }


    public function put(Request $request, $category_id)
    {
       if($request->all()){
            $brand_id = $request->input("brand");
            $product = Product::where('brand_id', $brand_id)->get();
       }

        return redirect('category/'.$category_id)->with(['productArray' => $product]);
    }


}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Brand;
use App\Models\Web\Category;
use App\Models\Web\Slider;

class BrandsController extends Controller
{
   public function show(Request $request, $brand)
   {
     //  side categories
    $sideCategories = Category::where('is_feature', 1)->get();
    

    
    // stopped here , make a brand page and fetch products by brand name

    return view('web.index', compact('sideCategories', 'sliders', 'brands', 'onSales'));
   }

//    end
}

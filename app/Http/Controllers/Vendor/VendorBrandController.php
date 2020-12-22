<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

use Session;

class VendorBrandController extends Controller
{
    public function index()
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }
        
        // get brands
        $brands = DB::table('brands')->get();
        if(count($brands) == "")
        {
            $brands = null;
        }

        return view('vendor.brands', compact('brands'));
    }





    public function store(Request $request)
    {
        if($request)
        {
            $addBrand = $request->validate([
                        'brand' => 'required|min:3|max:50'
                        ]);

            $brands = DB::table('brands')->where('brand_name', $request->brand)->get();
            if(!count($brands) == "")
            {
                return back()->with('error', 'Brand already exists!');
            }
            $date = date("Y-m-d H:s:i", time());
            DB::table('brands')->insert(array(
                'brand_name' => $request->brand,
                'brand_date_added' => $date
            ));
        }
        return back()->with('success', "The Brand ".$request->brand." has been added!");
    }






    // DELETE BRAND 
    public function vendor_brand_delete_ajax(Request $request)
    {
        if($request->ajax())
        { 
            $data = false;
            $brand = DB::table('brands')->where('brand_id', $request->brand_id);
            Session::flash('success', 'The brand '.$brand->first()->brand_name.' has been deleted!');
            if($brand->delete())
            {
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }




    // BRAND FEATURE
    public function vendor_brand_feature_ajax(Request $request)
    {
        if($request->ajax())
        { 
            $data = false;
            $brand = DB::table('brands')->where('brand_id', $request->brand_id);
            if($brand->first()->is_feature)
            {
                $brand->update([
                    'is_feature' => 0
                ]);
                Session::flash('success', 'The brand '.$brand->first()->brand_name.' is not featured');
                $data = true;
            }else{
                $brand->update([
                    'is_feature' => 1
                ]);
                Session::flash('success', 'The brand '.$brand->first()->brand_name.' is featured');
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }










    // EDIT BRAND
    public function vendor_brand_edit_ajax(Request $request)
    {
        if($request->ajax())
        { 
            $error = ['brand' => null];
            $date = date("Y-m-d H:s:i", time());
            $brandCheck = DB::table('brands')->where('brand_id', $request->brand_id);

           if(empty($request->brand_name))
           {
               $error['brand'] = "Brand must not be empty";
           }else if(strlen($request->brand_name) < 3){
               $error['brand'] = "Brand must be minimum of 3 character";
           }else if(strlen($request->brand_name) > 30){
            $error['brand'] = "Brand must be maximum of 30 character";
           }else if($brandCheck->first()->brand_name == $request->brand_name)
            {
                $brandCheck->update(array(
                    'brand_last_modified' => $date
                ));
                $data = true;
            }else{
                if($brandCheck->first()->brand_name != $request->brand_name)
                {
                    if(count($brandCheck->where('brand_name', $request->brand_name)->get()) != "")
                    {
                        $error['brand']  = "brand already exists";
                    }else{
                        DB::table('brands')->where('brand_id', $request->brand_id)->update([
                            'brand_name' => $request->brand_name,
                            'brand_last_modified' => $date
                        ]);
                        Session::flash('success', 'Brand has been edited successfuly');
                        $data = true;
                    }
                }
            }

           if(!$error['brand'] == null)
           {
            return response()->json(['error' => $error]);
           }
                
        
        }
        return response()->json(['data' => $data]);
    }






    





    // end
}

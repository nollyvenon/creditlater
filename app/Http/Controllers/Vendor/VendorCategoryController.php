<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;



class VendorCategoryController extends Controller
{
    public function index()
    {
        // get all categories
        $categories = DB::table("categories")->get();
        if(count($categories) == "")
        {
            $categories = null;
        }
        return view('vendor.category', compact('categories'));
    }




    public function category_add()
    {
        return view('vendor.category_add');
    }


    
    public function vendor_category_feature_ajax(Request $request)
    {
        if($request->ajax())
        {
            $category = DB::table('categories')->where('id', $request->category_id);
            if($category->first()->is_feature)
            {
                $category->update([
                    'is_feature' => 0
                ]);
                $data = true;                
            }else{
                $category->update([
                    'is_feature' => 1
                ]);
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }





    // DELETE CATEGORY
    public function vendor_category_delete_ajax(Request $request)
    {
        if($request->ajax())
        {
            $data = false;
            $category = DB::table('categories')->where('id', $request->category_id);
            if($category->delete())
            {
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }








    // ADD CATEGORY
    public function store(Request $request)
    {
        //  $request->validate([
        //     'category_name' => 'required|min:3|max:30',
        //     'category_image' => 'required',
        //     'round_category' => 'required',
        // ]);

        $category = DB::table('categories')->where('category_name', $request->category_name)->first();
        if(!$category)
        {             
            $image = $request->file('category_image');
            $newFileName = 'category_image_'.time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/web/images/category_image');
            $storeImage = "/web/images/category_image/".$newFileName;

            $roundCategory = $request->file('round_category');
            $newRoundFileName = 'round_category_'.time().'.'.$roundCategory->getClientOriginalExtension();
            $RoundDestination = public_path('/web/images/round_category');
            $storeRoundImage = "/web/images/round_category/".$newRoundFileName;


            if($roundCategory->move($RoundDestination, $newRoundFileName))
            {
                if( $image->move($destination, $newFileName))
                {
                     DB::table('categories')->insert(array(
                         'category_name' => $request->category_name,
                         'category_image' => $storeImage,
                         'round_cat_image' => $storeRoundImage
                     ));
                }
            }

        }else{
            return back()->with('error', "Category already exist!");
        }
    
        return redirect('vendor/category')->with('success', "Category ".$request->category_name." has been added!");
    }









    public function update(Request $request)
    {
        if($request->ajax())
        {
            $data = true;
            $error = null;
            if(empty($request->category_name))
            {
                 $error = "Category name is required!";
            }else if(strlen($request->category_name ) < 3)
            {
                $error = "Category name must be minimum of 3 character!";
            }else if(strlen($request->category_name ) > 30)
            {
                $error = "Category name must be maximum of 30 character!";
            }

            if($error)
            {
                return response()->json(['error' => $error]);
            }else{
                
                $category = DB::table('categories')->where('id', $request->category_id);
                if($category->first()->category_name == $request->category_name)
                {
                    $data = true;
                }
            }
        }
        return response()->json(['data' => $data]);
    }





    // /end
}

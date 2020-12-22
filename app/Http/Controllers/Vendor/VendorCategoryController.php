<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;


class VendorCategoryController extends Controller
{
    public function index()
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }


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
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }

        return view('vendor.category_add');
    }


    
    public function vendor_category_feature_ajax(Request $request)
    {
        if($request->ajax())
        {
            $category = DB::table('categories')->where('category_id', $request->category_id);
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
            $category = DB::table('categories')->where('category_id', $request->category_id);

            unlink(public_path().$category->first()->category_image);
            unlink(public_path().$category->first()->round_cat_image);
            if($category->delete())
            {
                $data = true;
            }
        }
        return response()->json(['data' => $data]);
    }






    public function vendor_category_delete($id)
    {
        if($id)
        {
            $data = false;
            $category = DB::table('categories')->where('category_id', $id);

            unlink(public_path().$category->first()->category_image);
            unlink(public_path().$category->first()->round_cat_image);
            $category->delete();
        }
        return back();
    }







    // ADD CATEGORY
    public function store(Request $request)
    {
         $request->validate([
            'category_name' => 'required|min:3|max:30',
            'category_image' => 'required',
            'round_category' => 'required',
        ]);

        $category = DB::table('categories')->where('category_name', $request->category_name)->first();
        if(!$category)
        {             
            $image = $request->file('category_image');
            $newFileName = 'category_image_'.time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/vendor/images/category_image');
            $storeImage = "/vendor/images/category_image/".$newFileName;

            $roundCategory = $request->file('round_category');
            $newRoundFileName = 'round_category_'.time().'.'.$roundCategory->getClientOriginalExtension();
            $RoundDestination = public_path('/vendor/images/round_category');
            $storeRoundImage = "/vendor/images/round_category/".$newRoundFileName;


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






// EDIT CATEGORY
    public function show(Request $request, $id)
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }
        
        $category = DB::table('categories')->where('category_id', $id)->first();
    
        return view('vendor.category_edit', compact('category'));
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'min:3|max:30',
            'category_image' => "image|mimes:jpg,jpeg,png|max:2048",
            'round_category' => "image|mimes:jpg,jpeg,png|max:2048"
        ]);

        $category = DB::table('categories')->where('category_id', $id);

        if($request->category_image)
        {
            if(file_exists(public_path().$category->first()->category_image))
            {
                unlink(public_path().$category->first()->category_image);
                $image = $request->file('category_image');
                $newFileName = 'category_image_'.time().'.'.$image->getClientOriginalExtension();
                $destination = public_path('/web/images/category_image');
                $storeImage = "/web/images/category_image/".$newFileName;
    
                if( $image->move($destination, $newFileName))
                {
                    DB::table('categories')->where('category_id', $id)->update(array(
                        'category_image' => $storeImage,
                    ));
                }
            }
        }

        if($request->round_category)
        {
            if(file_exists(public_path().$category->first()->round_cat_image))
            {
                unlink(public_path().$category->first()->round_cat_image);
                $image = $request->file('round_category');
                $newFileName = 'category_image_'.time().'.'.$image->getClientOriginalExtension();
                $destination = public_path('/web/images/round_category');
                $storeImage = "/web/images/round_category/".$newFileName;

                if( $image->move($destination, $newFileName))
                {
                    DB::table('categories')->where('category_id', $id)->update(array(
                        'round_cat_image' => $storeImage,
                    ));
                }
            }
        }

        if($request->category_name)
        {
            DB::table('categories')->where('category_id', $id)->update(array(
                'category_name' => $request->category_name
            ));
        }

        return redirect('vendor/category')->with('success', "Category has been updated successfully!");
    }


    // /end
}

<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Vendor\Image;
use DB;
use Session;

class VendorProductController extends Controller
{
    public function index()
    {
        if(!Session::has('vendor'))
        {
            return redirect('vendor/login');
        }
        // get products
        $products = DB::table('products')->leftJoin('brands', 'products.brand_id', '=', 'brands.brand_id')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')->get();
        if(count($products) == "")
        {
            $products = null;
        }


        return view('vendor.products', compact('products'));
    }




    public function product_add()
    {
        $brands = DB::table('brands')->get();
        if(count($brands) == "")
        {
            $brands = null;
        }

        $categories = DB::table('categories')->get();
        if(count($categories) == "")
        {
            $categories = null;
        }

        return view('vendor.product_add', compact('brands', 'categories'));
    }




    //ADD PRODUCTS
    public function product_add_store(Request $request)
    {

        $varification = $request->validate([
            'product_name' => 'required|min:3|max:50',
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required',
            'warranty' => 'required',
            'image' => 'required',
            'quantity' => 'required',
            'details' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
        

        

        $file = $_FILES['image'];
        $image = new Image();

        $fileExt = explode('.', $file['name']);
        $fileExt = end($fileExt);

        $fileName = 'image_'.uniqid().'.'.$fileExt;
        $images = $image->resize_image($file, [ 'name' => $fileName, 'width' => 768, 'height' =>998,  'size_allowed' => 1000000,'file_destination' => 'web/images/layout-1/product/' ]);
           
        if($image->passed())
        {
            $image_name = 'web/images/layout-1/product/'.$fileName;
            $product_slug = DB::table('categories')->where('id', $request->category)->first()->category_name;

            DB::table('products')->insert(array(
               'products_name' => $request->product_name,
               'products_quantity' => $request->quantity,
               'category_id' => $request->category,
               'brand_id' => $request->brand,
               'products_model' => $request->model,
               'products_image' => $image_name,
               'products_price' => $request->price,
               'products_slug' => $product_slug,
               'products_detail' => $request->details,
               'products_description' => $request->description,
               'products_type' => $request->type,
               'products_video_link' => $request->type,
            ));
        }

        return back()->with('success', 'product has been added successfully!');
    }	





    public function product_edit($id)
    {
        if($id)
        {
            $brands = DB::table('brands')->get();
            if(count($brands) == "")
            {
                $brands = null;
            }
    
            $categories = DB::table('categories')->get();
            if(count($categories) == "")
            {
                $categories = null;
            }

            $product = DB::table('products')->where('id', $id)->first();
        }

        return view('vendor.product_edit', compact('brands', 'categories', 'product'));
    }




    public function product_update(Request $request, $id)
    {
        $varification = $request->validate([
            'product_name' => 'required|min:3|max:50',
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required',
            'warranty' => 'required',
            'quantity' => 'required',
            'details' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $product = DB::table('products')->where('id', $id)->first();
        $product_slug = DB::table('categories')->where('category_id', $request->category)->first()->category_name;

        if(!$_FILES['image']['name'])
        {
            $image_name = $product->products_image;
        }else{

            $image = new Image();
            $file = $_FILES['image'];
            $fileExt = explode('.', $file['name']);
            $fileExt = end($fileExt);

            $fileName = 'image_'.uniqid().'.'.$fileExt;
            $image->resize_image($file, [ 'name' => $fileName, 'width' => 768, 'height' =>998,  'size_allowed' => 1000000,'file_destination' => 'web/images/layout-1/product/' ]);
            
            if(!$product->products_image)
            {
                $image_name = 'web/images/layout-1/product/'.$fileName;
            }else{
                $image_name = $product->products_image.','.'web/images/layout-1/product/'.$fileName;
            }
           
        }
        
        
        DB::table('products')->where('id', $id)->update(array(
            'products_name' => $request->product_name,
            'products_quantity' => $request->quantity,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'products_model' => $request->model,
            'products_image' => $image_name,
            'products_price' => $request->price,
            'products_slug' => $product_slug,
            'warranty' => $request->warranty,
            'products_detail' => $request->details,
            'products_description' => $request->description,
            'products_type' => $request->type,
            'products_video_link' => $request->type,
        ));

         return redirect('/vendor/products')->with('success', 'product has been added successfully!');
    }
    




    public function product_delete($id)
    {
        if($id)
        {
            $product = DB::table('products')->where('id', $id)->first();
            $array_images = explode(',', $product->products_image);
            foreach($array_images as $image)
            {
                if(!Image::delete($image))
                {
                    return back()->with('error', 'An error has occour while uploading image');
                }
            }
            $product = DB::table('products')->where('id', $id)->delete();
            
        }
        return redirect('/vendor/products')->with('success', 'product has been deleted successfully!');
    }






    public function product_delete_image($id, $key)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if($product)
        {
            $array_images = explode(',', $product->products_image);
            if(array_key_exists($key, $array_images))
            {
                $img = $array_images[$key];
                if(!Image::delete($img))
                {
                    return back()->with('error', 'An error has occour while uploading image');
                }
               unset( $array_images[$key]);
            }
            if(count($array_images) > 0)
            { 
                $x = 1;
                $img = null;
                foreach($array_images as $image)
                {
                    $img .= $image;
                    if($x < count($array_images))
                    {
                        $img .= ',';
                    }
                    $x++;
                }
            }
            if(count($array_images) == '')
            {
                $img = null;
            }
            $product = DB::table('products')->where('id', $id)->update(array(
                'products_image' => $img
            ));
        }
        return back();
    }






    public function product_return_show()
    {
        $return_products = DB::table('return_products')->leftJoin('users', 'return_products.buyer_id', '=', 'users.id')->get();
        if(count($return_products) == '')
        {
        $return_products = null;
        }
    
        return view('vendor.product_return', compact('return_products'));
    }




    // MAXIMIZE WARRANTY SLIP
    public function maximize_warranty_slip_ajax(Request $request)
    {
        if($request->ajax())
        {
            $warranty = DB::table('return_products')->where('id', $request->warranty_id)->first();
            // return to the dropdown page with the image
            // i stopped here, i must finish this project
            $data = true;
        }
        return response()->json(['data' => $data]);
    }





    public function product_feature($id)
    {
        if($id)
        {
            $product = DB::table('products')->where('id', $id)->first();
            if($product)
            {
                $is_featured = $product->is_product_feature ? 0 : 1;
                DB::table('products')->where('id', $id)->update(array(
                      'is_product_feature' => $is_featured
                ));
            } 
        }
        return back();
    }




}

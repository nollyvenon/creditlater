<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use App\Models\Admin\Image;
use App\Models\Vendor\Vendor;
use DB;
use Session;

class AdminVendorController extends Controller
{
    public function index()
    {
        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        $vendors = DB::table('vendors')->get(); //get all vendors

        return view('admin.vendor', compact('admin', 'vendors'));
    }







    public function vendor_deactivate_toggle($id)
    {
       if($id)
       {
            $vendor = DB::table('vendors')->where('id', $id)->first();
            if($vendor->is_deactivate)
            {
                DB::table('vendors')->where('id', $id)->update(array(
                    'is_deactivate' => 0,
                ));
            }else{
                DB::table('vendors')->where('id', $id)->update(array(
                    'is_deactivate' => 1,
                    'active' => 0
                ));
            }
       }
       return back();
    }







    public function vendor_edit($id)
    {
        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        $vendor_products = DB::table('products')->where('vendor_id', $id)->get(); //get vendors products

        $vendor = DB::table('vendors')->where('id', $id)->first();


        return view('admin.vendor-edit', compact('admin', 'vendor_products', 'vendor'));
    }






    public function vendor_update(Request $request, $id)
    {
        $request->validate([
            "first_name" => "required|min:3|max:50",
            "last_name" => "required|min:3|max:50",
            "email" => "required|email",
            "phone" => "required|min:11|max:15",
            "address" => "required|min:3",
            "city" => "required|min:3",
            "state" => "required|min:3",
            "country" => "required|min:3",
            "about" => "required|min:3",
        ]);

 
        if($_FILES['image']['name'])
        {
             $file = $_FILES['image'];
                 $image = new Image();
             
                 $fileExt = explode('.', $file['name']);
                 $fileExt = end($fileExt);
             
                 $fileName = 'vendor_'.uniqid().'.'.$fileExt;
                 $vendor_image = 'vendors/images/vendor_image/'.$fileName;
                 $image->resize_image($file, [ 'name' => $fileName, 'width' => 210, 'height' => 200, 'size_allowed' => 1000000,'file_destination' => 'vendors/images/vendor_image/' ]);
                     
                if(!$image->passed())
                {
                    return back()->with('image_error', $image->error());
                }else{
                    $stored_image = DB::table('vendors')->where("id", $id)->first()->image;
                    $image->delete($stored_image);
                }
        }

        
        if(!$request->image)
        {
            $stored_image = DB::table('vendors')->where("id", $id)->first()->image;
            $vendor_image = $stored_image;
            if(!$stored_image)
            {
                $vendor_image = null;
            }
        }

        DB::table('vendors')->where('id', $id)->update(array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "about" => $request->about,
            'image' => $vendor_image
        ));

        return back()->with('success', 'vendor detail updated successfully!');
    }






    public function vendor_delete($id)
    {
        if($id)
        {
            $vendor_image = DB::table('vendors')->where("id", $id)->first()->image;
            $image = new Image();
            $image->delete($vendor_image);
            if($image)
            {
                DB::table('vendors')->where('id', $id)->delete();
            }
        }
        return back()->with('success', 'vendor deleted successfully!');
    }
    




    public function vendor_add_page()
    {
        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        return view('admin.vendor-add', compact('admin'));
    }




    public function vendor_add_store(Request $request)
    {
        $new_vendor = $request->validate([
                    "first_name" => "required|min:3|max:50",
                    "last_name" => "required|min:3|max:50",
                    "email" => "required|email|unique:vendors",
                    "phone" => "required|min:11|max:15",
                    "address" => "required|min:3",
                    "city" => "required|min:3",
                    "state" => "required|min:3",
                    "country" => "required|min:3",
                    "password" => "required|min:6|max:12"
                ]);

        
        Vendor::create($new_vendor);
        return redirect('admin/vendor')->with('success', 'The Vendor '.$request->first_name.' '.$request->last_name.' added successfully!');
    }







    // end
}

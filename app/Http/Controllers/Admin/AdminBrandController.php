<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use DB;
use Session;


class AdminBrandController extends Controller
{
    public function index()
    {
        if(!Session::has('admin'))
        {
            return redirect('register');
        }

        // get brands
        $brands = DB::table('brands')->get();
        if(count($brands) == "")
        {
            $brands = null;
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }


        return view('admin.brands', compact('brands', 'admin'));
    }





    public function brand_approved($id)
    {
        if($id)
        {
            $category = DB::table('brands')->where('brand_id', $id)->first();
            if($category)
            {
                $is_approved = $category->is_approved ? 0 : 1;
                DB::table('brands')->where('brand_id', $id)->update(array(
                      'is_approved' => $is_approved
                ));
            }
        }
        return back();
    }


    



    // end
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;

use DB;
use Session;

class AdminCategoryController extends Controller
{
    public function index()
    {
        if(!Session::has('admin'))
        {
            return redirect('admin/login');
        }

        // get all categories
        $categories = DB::table("categories")->get();
        if(count($categories) == "")
        {
            $categories = null;
        }

        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }


        return view('admin.category', compact('categories', 'admin'));
    }




    public function category_approve($id)
    {
        if($id)
        {
            $category = DB::table('categories')->where('category_id', $id)->first();
            if($category)
            {
                $is_approved = $category->is_approved ? 0 : 1;
                DB::table('categories')->where('category_id', $id)->update(array(
                      'is_approved' => $is_approved
                ));
            }
        }
        return back();
    }



    // end
}




<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;

class AdminCategoryController extends Controller
{
    public function index()
    {
        // get all categories
        $categories = DB::table("categories")->get();
        if(count($categories) == "")
        {
            $categories = null;
        }
        return view('admin.category', compact('categories'));
    }




    public function category_add()
    {
        return view('admin.category_add');
    }


    // end
}




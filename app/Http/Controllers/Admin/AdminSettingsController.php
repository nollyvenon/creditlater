<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Auth;
use App\Models\Admin\Admin;
use App\Models\Admin\Image;
use DB;
use Session;


class AdminSettingsController extends Controller
{
    public function index()
    {
        $admin = Admin::where('token',  Auth::admin()['token'])->where('id',  Auth::admin()['id'])->first();
       
        if(!$admin)
        {
            $admin = null;
        }

        $payment_method = DB::table('payment_methods')->get();
        if(count($payment_method) == '')
        {
            $payment_method = null;
        }

        $settings = DB::table('settings')->where('setting_id', 1)->first();

        return view('admin.settings', compact('admin', 'payment_method', 'settings'));
    }






    // STORE SETTINGS
    public function store_seetings(Request $request)
    {

        $request->validate([
            'about' => 'required|min:3',
            'contact' => 'required|min:11|max:15',
            'top_nav_amount' => 'required',
            'top_nav' => 'required|min:3',
            'copy_right' => 'required|min:3',
        ]);

        $settings = DB::table('settings')->where('setting_id', 1)->first();

       if($_FILES['logo']['name'])
       {
            $file = $_FILES['logo'];
                $image = new Image();
            
                $fileExt = explode('.', $file['name']);
                $fileExt = end($fileExt);
            
                $fileName = 'logo_'.uniqid().'.'.$fileExt;
                $logo = 'web/images/logo/'.$fileName;
                $image->resize_image($file, [ 'name' => $fileName, 'width' => 210, 'height' => 66, 'size_allowed' => 1000000,'file_destination' => 'web/images/logo/' ]);
                    
                if(!$image->passed())
                {
                    return back()->with('image_error', $image->error());
                }else{
                    $stored_image = DB::table('settings')->where("setting_id", 1)->first()->logo;
                    $image->delete($stored_image);
                }
       }else{
           $logo = $settings->logo;
       }

        DB::table('settings')->where('setting_id', 1)->update(array(
            'about' => $request->about,
            'contact' => $request->contact,
            'top_nav_amount' => $request->top_nav_amount,
            'copy_rights' => $request->copy_right,
            'top_banner' => $request->top_nav,
            'logo' => $logo,
        ));

       return back()->with('success', 'settings updated successfully!');
    }








    public function payment_metho_header(Request $request)
    {
        $request->validate([
            'payment_method_header' => 'required|min:3|max:50'
        ]);

        DB::table('settings')->where('setting_id', 1)->update(array(
            'payment_method_header' => $request->payment_method_header
        ));
        
        return back()->with('success', 'payment method header updated successfully!');
    }







    // INSERT PAYMENT MATHOD 
    public function admin_add_payment_method_ajax(Request $request)
    {
        // 25 x 25
        if($request->ajax())
        {
            $data = false;
            $error_image = false;
            $error_name = false;
            $errors = null;

            if(empty($_POST['payment_name']))
            {
                $errors['error_name'] = '*Payment method field is required!';
            }else if(strlen($_POST['payment_name']) > 20)
            {
                $errors['error_name']  =   '*Maximum of 20 characters';
            }


            if(isset($_FILES['payment_method_image']['name']))
            {
                $file = $_FILES['payment_method_image'];
                $image = new Image();
            
                $fileExt = explode('.', $file['name']);
                $fileExt = end($fileExt);
            
                $fileName = 'image_'.uniqid().'.'.$fileExt;
                $image->resize_image($file, [ 'name' => $fileName, 'width' => 25, 'height' => 25, 'size_allowed' => 1000000,'file_destination' => 'web/images/pay/' ]);
                    
                if(!$image->passed())
                {
                    $errors['error_image'] = $image->error();
                }
                if($errors == null){
                    $date = date('Y-m-d H:i:s');
                    $payment_method = DB::table('payment_methods')->insert(array(
                        'payment_method_name' => $_POST['payment_name'],
                        'payment_link' => $_POST['payment_link'],
                        'payment_method_image' => 'web/images/pay/'.$fileName,
                        'date_added' => $date
                    ));
                    $data = true;
                    Session::put('success', 'payment method added successfully!');
                }
            }
        }

        return response()->json(['data' => $data, 'errors' => $errors]);
    }





 

    public function payment_method_activate($id)
    {
        if($id)
        {
            DB::table('payment_methods')->where('id', $id)->update(array(
                'active' => 1
            ));
            Session::put('success', 'payment method updated successfully!');
        }
        return back();
    }



    public function payment_method_deactivate($id)
    {
        if($id)
        {
            DB::table('payment_methods')->where('id', $id)->update(array(
                'active' => 0
            ));
            Session::put('success', 'payment method updated successfully!');
        }
        return back();
    }



    public function payment_method_delete($id)
    {
        if($id)
        {
            DB::table('payment_methods')->where('id', $id)->delete();
        }
        return back();
    }




    // end
}

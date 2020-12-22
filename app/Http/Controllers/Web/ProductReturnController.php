<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\Auth;
use App\Models\Web\User;

use DB;
use Session;



class ProductReturnController extends Controller
{
    public function index()
    {
        //  side categories
        $sideCategories = Category::where('is_feature', 1)->get();

        return view('web.return', compact('sideCategories'));
    }





    public function store(Request $request)
    {
        if(Auth::user())
        {
            $validate = $request->validate([
                'email' => 'required|email',
                'warranty_number' => 'required',
                'warranty_slip' => 'required'
            ]);


            $user = User::where('email', $request->email)->first();
            if($user)
            {
                $warranty_slip = $request->file('warranty_slip');
                $newImageName = 'warranty_file_'.time().'.'.$warranty_slip->getClientOriginalExtension();
                $Destination = public_path('/admin/images/warranty_file');
                $W_ImagePath = "/admin/images/warranty_file/".$newImageName;
               
                if($warranty_slip->move($Destination, $newImageName))
                {
                    $return = DB::table('return_products')->insert(array(
                        'buyer_id' => $user->id,
                        'email' => $request->email,
                        'warranty_number' => $request->warranty_number,
                        'warranty_slip' =>  $W_ImagePath
                    ));

                    if($return){
                        return redirect("account")->with('success', "Your request would be attended to shortly!");
                    }
                }

            }else{
                return back()->with('error', "Email does not exist!");
            }
        }else{
            return back()->with('error', "Login or Signup to return a product!");
        }
        return back();
    }




    // end
}

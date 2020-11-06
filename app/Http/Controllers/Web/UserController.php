<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Category;
use App\Models\Web\User;
use App\Models\Web\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Web\Verification;


use DB;
use Session;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();  

        return view('web.register', compact('sideCategories'));
    }




    public function store(Request $request)
    {
        $data = $request->validate([
                'first_name' => 'required|min:3|max:50',
                'last_name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:20'
            ]);

        $user = User::create($data);
        Auth::login($request->email);

        return redirect('/');
    }



    public function account()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get();  

        return view('web.account', compact('sideCategories'));
    }



    public function edit_info()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get(); 
        return view('web.edit-info', compact('sideCategories'));
    }


    public function edit_user_info(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'email' => 'required|email|',
            'password' => 'required|min:6|max:20'
        ]);
        
        $user = User::where('id', $id)->first();

        if(Auth::user())
        {
            if($user->email == $request->email)
            {
                if(Hash::check($request->password, $user->password))
                {
                    $user->first_name = $request->first_name;
                    $user->last_name = $request->last_name;
                    $user->email = $request->email;
                    $user->save();
                    Auth::login($request->email);
                }else{
                    return back()->withErrors('Wrong password, try again!');
                }
            }else if($user->email != $request->email )
                {
                    $new_email = User::where('email', $request->email)->first();
                    if(!$new_email)
                    {
                        if(Hash::check($request->password, $user->password))
                       {
                            $user->first_name = $request->first_name;
                            $user->last_name = $request->last_name;
                            $user->email = $request->email;
                            $user->save();
                            Auth::login($request->email);
                       }else{
                           return back()->withErrors('Wrong password, try again!');
                       }
                    }else{
                        return back()->withErrors('The email already exist!');
                    }
                }
        }
        return redirect('account')->with('success', 'Contact has been updated successfully!');
    }




    public function verification()
    {
        //get all category
       $sideCategories = Category::where('is_feature', 1)->get(); 
       
       // get my registration
       $verification = Verification::where('user_id', Auth::user('user')['id'])->where('is_approved', 1)->first();
       if(!$verification)
       {
            $verification = null;
       }

       return view('web.verification', compact('sideCategories', 'verification'));
    }




    public function registration_form()
    {
       //get all category
       $sideCategories = Category::where('is_feature', 1)->get();  

       return view('web.registration_form', compact('sideCategories'));
    }



    public function registration_form_store(Request $request, $id)
    {
        if(Auth::user())
        {
            if($request->hasFile('proof_of_employment'))
            {
                $user_id = Auth::user()['id'];
                $date = date("Y-m-d H:s:i", time());

                $validate = $request->validate([
                    'first_name' => 'required|min:3|max:50',
                    'last_name' => 'required|min:3|max:50',
                    'date_of_birth' => 'required',
                    'phone' => 'required|min:11|max:11',
                    'national_id' => 'required|min:3|max:20',
                    'status' => 'required',
                    'occupation' => 'required|min:3|max:50',
                    'proof_of_employment' => 'required',
                    'address' => 'required|min:10|max:150',
                    'guarantor_first_name' => 'required|min:3|max:50',
                    'guarantor_last_name' =>  'required|min:3|max:50',
                    'guarantor_phone' =>  'required|min:11|max:11',
                    'guarantor_date_of_birth' =>  'required',
                    'guarantor_national_id' =>  'required|min:5|max:20',
                    'guarantor_status' => 'required',
                    'guarantor_occupation' => 'required|min:3|max:50',
                    'guarantor_relationship' => 'required|min:6|max:50',
                    'guarantor_address' => 'required|min:6|max:200',
                ]);


                if( $request->supporting_document == null)
                {
                    $request->supporting_document = null;
                }

  
                Verification::create([
                    'user_id' => $user_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'date_of_birth' => $request->date_of_birth,
                    'phone' => $request->phone,
                    'national_id' => $request->national_id,
                    'status' => $request->status,
                    'occupation' => $request->occupation,
                    'proof_of_employment' => $request->proof_of_employment,
                    'supporting_documents' => $request->supporting_document,
                    'address' => $request->address,
                    'guarantor_first_name' => $request->guarantor_first_name,
                    'guarantor_last_name' =>  $request->guarantor_last_name,
                    'guarantor_phone' =>  $request->guarantor_phone,
                    'guarantor_date_of_birth' =>  $request->guarantor_date_of_birth,
                    'guarantor_national_id' =>  $request->guarantor_national_id,
                    'guarantor_status' => $request->guarantor_status,
                    'guarantor_occupation' => $request->guarantor_occupation,
                    'guarantor_relationship' => $request->guarantor_relationship,
                    'guarantor_address' => $request->guarantor_address,
                    'date_registered' => $date
                ]);

            }else{
                return back()->with( 'image-error','Proof of employment is require!');
            }
        }else{
            return redirect('/')->with('alert', 'Signup or Login to access that page!');
        }
        return redirect('registration-success')->with('success', 'Your have successfully registered, your details will be reviewed shortly!');
    }





    public function registration_form_edit($id)
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get(); 

        $saved_reg_details = Verification::where('user_id', Auth::user('user')['id'])->first();


        return view('web.registration_form', compact('sideCategories', 'saved_reg_details'));
    }





     public function registration_success()
     {
         return view('web.registration-success');
     }



    //  EDIT PASSWORD PAGE
    public function change_password()
    {
        //get all category
        $sideCategories = Category::where('is_feature', 1)->get(); 

         return view('web.edit-password', compact('sideCategories'));
    }




    // EDIT PASSWORD
    public function change_password_update(Request $request, $id)
    {
        if($id)
        {
            $request->validate([
                'email' => 'required|email|',
                'password' => 'required|min:6|max:20',
                'confirm_password' => 'required|min:6|max:20'
            ]);

            $user = User::where('email', $request->email)->where('id', $id)->first();
            if(!$user)
            {
                return back()->withErrors('Email '.$request->email.' is wrong!');
            }

            if($request->password != $request->confirm_password)
            {
                return back()->withErrors('Password must equal confirm password!');
            }

            $user->password = $request->password;
            $user->save();
        }
        return redirect('account')->with('success', 'Password updated successfully!');
    }


// end
}




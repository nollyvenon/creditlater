<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Web\Cart;
use App\Models\Web\User;
use App\Models\Web\Product;
use App\Models\Web\ProductReview;
use App\Models\Web\Rating;

use App\Models\Web\Auth;

use DB;
use Session;
use Validator;

class ProductReviewController extends Controller
{
    public function product_review_ajax(Request $request)
    {
        $user_id = Auth::user();
        $name = $request->name;
        $email = $request->email;
        $star = $request->star;
        $title = $request->title;
        $review = $request->review;
        $date = date('Y-m-d H:i:s');
        $product_id = $request->product_id;

        if(!Auth::user())
        {
           Session::flash('alert', 'Signup or Login to review this product!');
           return response()->json(['data' => 'quest']);
        }
        // if(ProductReview::where('user_id', $user_id['id'])->where('product_id', $product_id)->first())
        // {
        //     Session::flash('alert', 'You have reviewed this product!');
        //     return response()->json(['data' => 'reviewed']);
        // }

     

        $message = ['name' => '', 'email' => '', 'star' => '', 'title' => '', 'review' => ''];
    

        if(empty($email))
        {
            $message['email'] = '*Email is required';
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message['email'] = '*Invalid email format';
        }else if(!User::where('id', $user_id['id'])->where('email', $email)->first()){
            $message['email'] = '*Email does not exist!';
        }
        
        if(empty($name)){
            $message['name'] = '*Name is required!';
        }else if(strlen($name) < 3){
            $message['name'] = '*Name must be minimum of 3 characters';
        }else if(strlen($name) > 50){
            $message['name'] = '*Name must be maxmum of 50 characters';
        }

        if(empty($title)){
            $message['title'] = '*Title is required!';
        }else if(strlen($title) < 6){
            $message['title'] = '*Title must be minimum of 6 characters';
        }else if(strlen($title) > 30){
            $message['title'] = '*Title must be maxmum of 30 characters';
        }

        if(empty($review)){
            $message['review'] = '*Review field is required!';
        }else if(strlen($review) < 6){
            $message['review'] = '*Review field must be minimum of 20 characters';
        }else if(strlen($review) > 1000){
            $message['review'] = '*Review field must be maxmum of 400 characters';
        }

        if(empty($message['name']) && empty($message['email']) && empty($message['title']) && empty($message['namDreviewe']))
        {
            if(!$this->update_star_ratings($product_id, $star))
            {
                Session::flash('alert', "Error in reviewing product");
                return response()->json(['data' => 'not-reviewed']);
            }
            $oldreview  = ProductReview::where('user_id', Auth::user()['id'])->where('product_id', $product_id)->first();
            if($oldreview)
            {
                $oldreview->stars = $star;
                $oldreview->review_title = $title;
                $oldreview->review = $review;
                $oldreview->date_added = $date;
                $oldreview->save();

                $product_review = true;
            }else{
                $product_review = ProductReview::create([
                    'user_id' => $user_id['id'],
                    'name' => $name,
                    'email' => $email,
                    'product_id' => $product_id,
                    'stars' => $star,
                    'review_title' => $title,
                    'review' => $review,
                    'date_added' => $date
                ]);

            }
       
            if($product_review)
            {
                Session::flash('alert-success', "Product has been reviewed successfully!");
                return response()->json(['data' => 'reviewed']);
            }else{
                Session::flash('alert', "Error in reviewing product");
                return response()->json(['data' => 'not-reviewed']);
            }
        }

         return response()->json(['data' => $message]);
    }



    public function update_star_ratings($product_id, $star)
    {
        if($product_id)
        {
            $star_ratings = Rating::where('product_id', $product_id)->first();
            $oldreview  = ProductReview::where('user_id', Auth::user()['id'])->where('product_id', $product_id)->first();
            if($oldreview)
            {
                $star = $star - $oldreview->stars;
                $star_ratings->rating_total += $star;
                $star_ratings->save();
            }else{
                if($star_ratings)
                {
                    $star_ratings->rating_count += 1;
                    $star_ratings->rating_total += $star;
                    $star_ratings->save();
                }
            }
            return true;
        }
        return false;
    }

}

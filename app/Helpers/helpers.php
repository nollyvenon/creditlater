<?php
use App\Models\Web\Rating;

    function star_rating($id)
    {
        $values = null;
        $ratings = Rating::where('product_id', $id)->first();
        
        if($ratings)
         {
            $values = ceil($ratings["rating_total"] / $ratings["rating_count"]);
         }
       
        return $values;
    }

<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;


    public $_userRatings = null;

    public function __construct($ratings = null)
    {
        if($ratings)
        {
            $this->_userRatings = $ratings;
        }
    }


    public function add($id, $star)
    {
        $star_ratings = ['ratings' => 0];

        if($this->_userRatings)
        {
            if(array_key_exists($id, $this->_userRatings))
            {
                $star_ratings = $this->_userRatings[$id];
            }
        }

        $star_ratings['ratings'] = $star;
        $this->_userRatings[$id] = $star_ratings;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());

        DB::table('categories')->insert(array(
            array(
                'id' => 1,
                'category_name' => 'fashion',
                'category_image' => '/web/images/category_image/01.png',
                'round_cat_image' => '/web/images/round_category/1.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 1,
            ),
            array(
                'id' => 2,
                'category_name' => 'book',
                'category_image' => '/web/images/category_image/02.png',
                'round_cat_image' => '/web/images/round_category/2.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 1,
            ),
            array(
                'id' => 3,
                'category_name' => 'sports',
                'category_image' => '/web/images/category_image/03.png',
                'round_cat_image' => '/web/images/round_category/3.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 0,
            ),
            array(
                'id' => 4,
                'category_name' => 'electronics',
                'category_image' => '/web/images/category_image/04.png',
                'round_cat_image' => '/web/images/round_category/4.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 0,
            ),
            array(
                'id' => 5,
                'category_name' => 'toys',
                'category_image' => '/web/images/category_image/05.png',
                'round_cat_image' => '/web/images/round_category/5.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 1,
            ),
            array(
                'id' => 6,
                'category_name' => 'footwares',
                'category_image' => '/web/images/category_image/06.png',
                'round_cat_image' => '/web/images/round_category/6.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 0,
            ),
            array(
                'id' => 7,
                'category_name' => 'games',
                'category_image' => '/web/images/category_image/07.png',
                'round_cat_image' => '/web/images/round_category/1.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 0,
            ),
            array(
                'id' => 8,
                'category_name' => 'adventure',
                'category_image' => '/web/images/category_image/08.png',
                'round_cat_image' => '/web/images/round_category/3.png',
                'date_added' => $date,
                'last_modified' => $date,
                'is_feature' => 1,
                'is_approved' => 0,
            ),
        ));
    }
}

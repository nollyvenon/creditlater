<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());

        DB::table('brands')->insert(array(
        array(
            'id' => 1,
            'brand_name' => 'levis',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 2,
            'brand_name' => 'addidass',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 3,
            'brand_name' => 'shantel',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 4,
            'brand_name' => 'gucci',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 5,
            'brand_name' => 'vassarette',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 6,
            'brand_name' => 'Versace ',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 7,
            'brand_name' => 'chinos',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 8,
            'brand_name' => 'levis',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 9,
            'brand_name' => 'Microsoft',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 10,
            'brand_name' => 'Toyota',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 11,
            'brand_name' => 'Samsung',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 12,
            'brand_name' => 'McDonald',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 13,
            'brand_name' => 'Disney ',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 14,
            'brand_name' => 'Oracle',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 15,
            'brand_name' => 'Cisco',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 16,
            'brand_name' => 'Audi',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 17,
            'brand_name' => 'Nescafe',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 18,
            'brand_name' => 'eBay ',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        ),
        array(
            'id' => 19,
            'brand_name' => 'Nissan',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 0,
        ),
        array(
            'id' => 20,
            'brand_name' => 'Allianz',
            'brand_date_added' => $date,
            'brand_last_modified' => $date,
            'is_feature' => 1,
             'is_approved' => 1,
        )
        )
        );

    }
}

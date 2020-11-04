<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());

        DB::table('buyers')->insert(array(
            array(
                'id' => 1,
                'buyer_name' => 'samuel',
                'buyer_id' => 1,
                'valid_id' => 123454321,
                'date_of_birth' => $date,
                'state_of_origin' => 'ekiti',
                'image' => 'admin/images/buyer-profile-image/3.jpg',
                'phone_one' => '08016264748',
                'phone_two' => null,
                'email' => 'olaoluwa@gmail.com',
                'lga' => 'alimosho',
                'state' => 'lagos',
                'country' => 'nigeria',
                'marital_status' => 'married',
                'occupation' => 'business man',
                 'company_address' => '17 abdul jabal street off ikotun , ikeja, lagos.',
                'company_name' => 'self employed',
                'address' => '15 samuel okwo street lekkki',
                'date_registered' => $date,
            ),
            array(
                'id' => 2,
                'buyer_name' => 'simeon',
                'buyer_id' => 2,
                'valid_id' => '09876543',
                'date_of_birth' => $date,
                'state_of_origin' => 'kwuara state',
                'image' => 'admin/images/buyer-profile-image/1.png',
                'phone_one' => '08079625394',
                'phone_two' => null,
                'email' => 'jones@gmail.com',
                'lga' => 'oworo ishoki',
                'state' => 'lagos',
                'country' => 'nigeria',
                'marital_status' => 'married',
                'occupation' => 'business man',
                 'company_address' => '1/2 akim ajuwon plaza road idumota, lagos.',
                'company_name' => 'self employed',
                'address' => '15 samuel okwo street lekkki',
                'date_registered' => $date,
            ),
        ));
    }
}

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
                'guarantor_lga' => 'ikeja lga',
                'guarantor_name' => 'john oni',
                'guarantor_valid_id' => null,
                'guarantor_date_of_birth' => $date,
                'guarantor_phone_one' => '08087455782',
                'guarantor_phone_two' => '08084567880',
                'guarantor_email' => 'johnoni@gmail.com',
                'guarantor_occupation' => 'business man',
                'guarantor_marital_status' => 'married',
                'guarantor_image' => 'admin/images/guarantor-image/1.png',
                'guarantor_address' => '8/10 mega chicken way idumota lagos',
                'guarantor_state_of_origin' => 'ibadan',
                'guarantor_country' => 'nigeria',
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
                'guarantor_lga' => 'iyanaba lga',
                'guarantor_name' => 'seun egidiogun',
                'guarantor_valid_id' => null,
                'guarantor_date_of_birth' => $date,
                'guarantor_phone_one' => '08029364547',
                'guarantor_occupation' => 'business woman',
                'guarantor_phone_two' => '09028374645',
                'guarantor_email' => 'seunagidiogun@gmail.com',
                'guarantor_marital_status' => 'married',
                'guarantor_image' => 'admin/images/guarantor-image/2.png',
                'guarantor_address' => '37 sherif idowu street fadeyi lagos',
                'guarantor_state_of_origin' => 'ogun state',
                'guarantor_country' => 'nigeria',
                'date_registered' => $date,
            ),
        ));
    }
}

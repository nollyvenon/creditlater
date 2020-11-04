<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuarantorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());

        DB::table('guarantors')->insert(array(
            array(
                'id' => 1,
                'buyer_id' => 1,
                'lga' => 'ikeja lga',
                'name' => 'john oni',
                'valid_id' => null,
                'date_of_birth' => $date,
                'phone_one' => '08087455782',
                'phone_two' => '08084567880',
                'email' => 'johnoni@gmail.com',
                'occupation' => 'business man',
                'marital_status' => 'married',
                'image' => 'admin/images/guarantor-image/1.png',
                'address' => '8/10 mega chicken way idumota lagos',
                'state_of_origin' => 'ibadan',
                'country' => 'nigeria',
                'date_registered' => $date,
            ),
            array(
                'id' => 2,
                'buyer_id' => 2,
                'lga' => 'iyanaba lga',
                'name' => 'seun egidiogun',
                'valid_id' => null,
                'date_of_birth' => $date,
                'phone_one' => '08029364547',
                'occupation' => 'business woman',
                'phone_two' => '09028374645',
                'email' => 'seunagidiogun@gmail.com',
                'marital_status' => 'married',
                'image' => 'admin/images/guarantor-image/2.png',
                'address' => '37 sherif idowu street fadeyi lagos',
                'state_of_origin' => 'ogun state',
                'country' => 'nigeria',
                'date_registered' => $date,
            ),
        ));
    }
}

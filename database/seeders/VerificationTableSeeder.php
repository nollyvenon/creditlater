<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Session;

class VerificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());
        DB::table('verifications')->insert(array(
            array(
                'user_id' => 1,
                'first_name' => 'charles',
                'last_name' => 'anonye',
                'date_of_birth' => $date,
                'phone' => '0805678909',
                'national_id' => '123456789876',
                'status' => 'single',
                'occupation' => 'business man',
                'proof_of_employment' => 'example',
                'supporting_documents' => null,
                'address' => 'alone street iyanapaja',
                'guarantor_first_name' => 'sule',
                'guarantor_last_name' =>  'garba',
                'guarantor_phone' =>  '0801234567',
                'guarantor_date_of_birth' =>  $date,
                'guarantor_national_id' =>  '1234567789',
                'guarantor_status' => 'married',
                'guarantor_occupation' => 'business man',
                'guarantor_relationship' => 'unknown',
                'guarantor_address' => 'klhflsvhbkrvkurgbvku,gbvubgfr',
                'date_registered' => $date,
                'is_approved' => 1
            )
        ));
    }
}

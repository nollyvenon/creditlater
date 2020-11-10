<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallmentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:s:i", time());

        DB::table('installment_methods')->insert(array(
              array(
                  'id' => 1,
                  'start_range' => 20000,
                  'end_range' => 30000,
                  'count' => 2,
                  'date_added' => $date
              ),
              array(
                'id' => 2,
                'start_range' => 30000,
                'end_range' => 40000,
                'count' => 3,
                'date_added' => $date
            ),
            array(
                'id' => 3,
                'start_range' => 40000,
                'end_range' => 50000,
                'count' => 4,
                'date_added' => $date
            ),
            array(
                'id' => 4,
                'start_range' => 50000,
                'end_range' => 60000,
                'count' => 5,
                'date_added' => $date
            )
        ));
    }
}

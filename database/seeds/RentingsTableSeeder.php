<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RentingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++){
            DB::table('rentings')->insert(
              [
                  'user_id'=>rand(0,5),
                  'vehicle_id'=>rand(0,5),
                  'start_date'=>date('Y-m-d H-i-s'),
                  'end_date'=>date('Y-m-d H-i-s'),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

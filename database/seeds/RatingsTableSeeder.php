<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=6; $i++){
            DB::table('ratings')->insert(
              [
                  'vehicle_id'=>rand(0, 5),
                  'star'=>rand(1, 5),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

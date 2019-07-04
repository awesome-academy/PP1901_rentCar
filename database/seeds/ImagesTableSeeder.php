<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=10; $i++){
            DB::table('images')->insert(
              [
                  'vehicle_id'=>rand(0, 5),
                  'path'=>Str::random(10),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

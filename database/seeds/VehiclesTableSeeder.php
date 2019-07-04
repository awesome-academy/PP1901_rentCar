<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=10; $i++){
            DB::table('vehicles')->insert(
              [
                  'name'=>Str::random(10),
                  'type_id'=>rand(0, 2),
                  'brand_id'=>rand(0, 5),
                  'number_plate'=>Str::random(5),
                  'status_id'=>rand(0, 5),
                  'color_id'=>rand(0, 5),
                  'content'=>Str::random(15),
                  'price'=>rand(0, 333),
                  've_status_id'=>rand(0, 2),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

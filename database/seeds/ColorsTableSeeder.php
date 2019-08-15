<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=6; $i++){
            DB::table('colors')->insert(
              [
                  'name'=>Str::random(10),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

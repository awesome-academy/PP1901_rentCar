<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Ve_statusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<3; $i++){
            DB::table('ve_statuses')->insert(
              [
                  'name'=>Str::random(10),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

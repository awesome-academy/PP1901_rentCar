<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<=5;$i++){
            DB::table('users')->insert(
              [
                  'name'=>Str::random(10),
                  'email'=>Str::random(10),
                  'password'=>Str::random(8),
                  'role_id'=>rand(0,1),
                  'address'=>Str::random(20),
                  'phone'=>Str::random(10),
                  'card_id'=>Str::random(9),
                  'birthday'=>date('Y-m-d H-i-s'),
                  'created_at'=>date('Y-m-d H-i-s'),
                  'updated_at'=>date('Y-m-d H-i-s'),
              ]
            );
        }
    }
}

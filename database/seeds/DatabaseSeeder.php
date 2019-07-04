<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
         $this->call(ColorsTableSeeder::class);
         $this->call(CommentsTableSeeder::class);
         $this->call(ImagesTableSeeder::class);
         $this->call(RatingsTableSeeder::class);
         $this->call(RentingsTableSeeder::class);
         $this->call(VehiclesTableSeeder::class);
         $this->call(Ve_statusTableSeeder::class);
    }
}

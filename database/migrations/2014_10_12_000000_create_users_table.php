<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable('false');
            $table->string('email')->unique();
            $table->string('password')->nullable('false');
            $table->integer('role_id')->nullable('false');
            $table->string('address')->nullable('false');
            $table->string('phone')->nullable('false');
            $table->string('card_id')->nullable('false');
            $table->string('birthday')->nullable('false');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('ID');
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('User_Name');
            $table->date('Dob');
            $table->string('Email')->unique();
            $table->string('Number_Phone')->unique();
            $table->string('Password');
            $table->string('Rank')->default('Normal')->comment('Normal->Vip->Diamond');
            $table->string('Code');
            $table->timestamp('email_verified_at')->nullable();
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

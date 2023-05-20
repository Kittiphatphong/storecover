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
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->date('birthday')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean("status")->default(true);
            $table->string('user_type')->nullable();
            $table->unsignedBigInteger("store_id")->nullable();
            $table->longText('remark')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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

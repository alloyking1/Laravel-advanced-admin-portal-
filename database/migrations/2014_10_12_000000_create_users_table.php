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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone')->nullable();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('area')->nullable();
            $table->string('parish')->nullable();
            $table->boolean('isAdmin')->nullable();
            $table->boolean('isAdminSuper')->nullable();
            $table->boolean('portalStatus')->nullable();
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

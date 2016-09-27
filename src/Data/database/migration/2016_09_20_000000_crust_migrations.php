<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrustMigrations extends Migration
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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->text('permit_codes')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('crust_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->text('permit_codes')->nullable();
        });

        Schema::create('crust_permits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permit_name');
            $table->string('permit_code');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('crust_roles');
        Schema::drop('crust_permits');
    }
}

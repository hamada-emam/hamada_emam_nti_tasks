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
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('   id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('email')->unique('email');
            $table->string('password');
            $table->char('phone', 11)->unique('phone');
            $table->enum('gender', ['f', 'm']);
            $table->string('image', 64)->default('default.jpg');
            $table->integer('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
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

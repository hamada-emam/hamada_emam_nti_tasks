<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name');
            $table->string('email');
            $table->string('paswword');
            $table->string('phone');
            $table->string('image')->default('default.jpg');
            $table->boolean('gender')->comment('1=>male 0=>female');
            $table->timestamp('email_verfied_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

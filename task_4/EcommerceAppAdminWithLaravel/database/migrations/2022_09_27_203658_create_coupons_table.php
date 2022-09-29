<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code');
            $table->tinyInteger('discount')->nullable();
            $table->tinyInteger('discount_type')->nullable();
            $table->tinyInteger('max_discount_value')->nullable();
            $table->bigInteger('max_usage');
            $table->tinyInteger('max_usage_per_user');
            $table->bigInteger('mini_order');
            $table->integer('start_at');
            $table->timestamp('end_at')->useCurrent();
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
        Schema::dropIfExists('coupons');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('picture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用户id');
            $table->string('type')->comment('图片类型');
            $table->string('pic_name')->default('default.jpg');
            $table->string('pic_path');
            $table->string('sort')->comment('排序');
            $table->string('shop_id')->comment('商家标识');
            $table->timestamps();
            $table->foreign('uid')->references('id')->on('users');
            $table->foreign('shop_id')->references('shop_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture');
    }
}

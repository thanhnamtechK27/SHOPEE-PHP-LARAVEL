<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cmt');
            $table->unsignedBigInteger('id_blog');
            $table->unsignedBigInteger('id_user');
            $table->string('avatar');
            $table->string('name');
            $table->integer('level');
            $table->timestamp('thoi_gian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmt');
    }
};

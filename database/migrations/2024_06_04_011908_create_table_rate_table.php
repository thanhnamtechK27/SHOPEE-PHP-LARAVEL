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
        Schema::create('rate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rate');
            $table->unsignedBigInteger('id_blog');
            $table->unsignedBigInteger('id_user');
            $table->timestamp('time')->useCurrent();
            
            // Xác định các ràng buộc ngoại khoá
            $table->foreign('id_blog')->references('id')->on('blog');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate');
    }
};

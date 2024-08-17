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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->decimal('price', 10, 2); // Decimal with precision 10 and scale 2
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_brand');
            $table->boolean('status')->default(0); // Boolean with default value 0
            $table->boolean('sale')->default(0); // Boolean with default value 0
            $table->string('company')->nullable(); // Nullable string
            $table->string('hinhanh')->nullable(); // Nullable string
            $table->text('detail')->nullable(); // Nullable text
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns for timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};

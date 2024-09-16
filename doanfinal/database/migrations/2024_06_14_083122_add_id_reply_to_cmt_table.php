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
    Schema::table('cmt', function (Blueprint $table) {
        $table->unsignedBigInteger('id_reply')->nullable()->after('id_user');
    });
}

public function down()
{
    Schema::table('cmt', function (Blueprint $table) {
        $table->dropColumn('id_reply');
    });
}

};

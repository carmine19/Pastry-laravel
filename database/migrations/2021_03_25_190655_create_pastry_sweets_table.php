<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastrySweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sweets', function (Blueprint $table) {
            $table->unsignedBigInteger('pastry_id')->after('id');
            $table->foreign('pastry_id')->references('id')->on('pastries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('sweets', function (Blueprint $table) {
            $table->dropForeign(['pastry_id']);
            $table->dropColumn('pastry_id');
        });
    }
}

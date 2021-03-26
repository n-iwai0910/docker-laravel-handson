<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('jan');
            $table->integer('size_x');
            $table->integer('size_y');
            $table->integer('size_z');
            $table->integer('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //$table->dropColumn('column');
            $table->dropColumn('jan');
            $table->dropColumn('size_x');
            $table->dropColumn('size_y');
            $table->dropColumn('size_z');
            $table->dropColumn('weight');
        });
    }
}

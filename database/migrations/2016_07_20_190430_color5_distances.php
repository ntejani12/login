<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color5Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('courses', function (Blueprint $table) {
            $table->integer('color5d1')->default(-1);
            $table->integer('color5d2')->default(-1);
            $table->integer('color5d3')->default(-1);
            $table->integer('color5d4')->default(-1);
            $table->integer('color5d5')->default(-1);
            $table->integer('color5d6')->default(-1);
            $table->integer('color5d7')->default(-1);
            $table->integer('color5d8')->default(-1);
            $table->integer('color5d9')->default(-1);
            $table->integer('color5d10')->default(-1);
            $table->integer('color5d11')->default(-1);
            $table->integer('color5d12')->default(-1);
            $table->integer('color5d13')->default(-1);
            $table->integer('color5d14')->default(-1);
            $table->integer('color5d15')->default(-1);
            $table->integer('color5d16')->default(-1);
            $table->integer('color5d17')->default(-1);
            $table->integer('color5d18')->default(-1);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

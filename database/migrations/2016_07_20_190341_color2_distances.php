<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color2Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('courses', function (Blueprint $table) {
            $table->integer('color2d1')->default(-1);
            $table->integer('color2d2')->default(-1);
            $table->integer('color2d3')->default(-1);
            $table->integer('color2d4')->default(-1);
            $table->integer('color2d5')->default(-1);
            $table->integer('color2d6')->default(-1);
            $table->integer('color2d7')->default(-1);
            $table->integer('color2d8')->default(-1);
            $table->integer('color2d9')->default(-1);
            $table->integer('color2d10')->default(-1);
            $table->integer('color2d11')->default(-1);
            $table->integer('color2d12')->default(-1);
            $table->integer('color2d13')->default(-1);
            $table->integer('color2d14')->default(-1);
            $table->integer('color2d15')->default(-1);
            $table->integer('color2d16')->default(-1);
            $table->integer('color2d17')->default(-1);
            $table->integer('color2d18')->default(-1);
            
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

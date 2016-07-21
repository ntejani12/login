<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color1Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('color1d1')->default(-1);
            $table->integer('color1d2')->default(-1);
            $table->integer('color1d3')->default(-1);
            $table->integer('color1d4')->default(-1);
            $table->integer('color1d5')->default(-1);
            $table->integer('color1d6')->default(-1);
            $table->integer('color1d7')->default(-1);
            $table->integer('color1d8')->default(-1);
            $table->integer('color1d9')->default(-1);
            $table->integer('color1d10')->default(-1);
            $table->integer('color1d11')->default(-1);
            $table->integer('color1d12')->default(-1);
            $table->integer('color1d13')->default(-1);
            $table->integer('color1d14')->default(-1);
            $table->integer('color1d15')->default(-1);
            $table->integer('color1d16')->default(-1);
            $table->integer('color1d17')->default(-1);
            $table->integer('color1d18')->default(-1);
            
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

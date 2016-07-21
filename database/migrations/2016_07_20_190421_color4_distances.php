<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color4Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('courses', function (Blueprint $table) {
            $table->integer('color4d1')->default(-1);
            $table->integer('color4d2')->default(-1);
            $table->integer('color4d3')->default(-1);
            $table->integer('color4d4')->default(-1);
            $table->integer('color4d5')->default(-1);
            $table->integer('color4d6')->default(-1);
            $table->integer('color4d7')->default(-1);
            $table->integer('color4d8')->default(-1);
            $table->integer('color4d9')->default(-1);
            $table->integer('color4d10')->default(-1);
            $table->integer('color4d11')->default(-1);
            $table->integer('color4d12')->default(-1);
            $table->integer('color4d13')->default(-1);
            $table->integer('color4d14')->default(-1);
            $table->integer('color4d15')->default(-1);
            $table->integer('color4d16')->default(-1);
            $table->integer('color4d17')->default(-1);
            $table->integer('color4d18')->default(-1);
            
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

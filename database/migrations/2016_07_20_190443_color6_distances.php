<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color6Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('courses', function (Blueprint $table) {
            $table->integer('color6d1')->default(-1);
            $table->integer('color6d2')->default(-1);
            $table->integer('color6d3')->default(-1);
            $table->integer('color6d4')->default(-1);
            $table->integer('color6d5')->default(-1);
            $table->integer('color6d6')->default(-1);
            $table->integer('color6d7')->default(-1);
            $table->integer('color6d8')->default(-1);
            $table->integer('color6d9')->default(-1);
            $table->integer('color6d10')->default(-1);
            $table->integer('color6d11')->default(-1);
            $table->integer('color6d12')->default(-1);
            $table->integer('color6d13')->default(-1);
            $table->integer('color6d14')->default(-1);
            $table->integer('color6d15')->default(-1);
            $table->integer('color6d16')->default(-1);
            $table->integer('color6d17')->default(-1);
            $table->integer('color6d18')->default(-1);
            
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color3Distances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('courses', function (Blueprint $table) {
            $table->integer('color3d1')->default(-1);
            $table->integer('color3d2')->default(-1);
            $table->integer('color3d3')->default(-1);
            $table->integer('color3d4')->default(-1);
            $table->integer('color3d5')->default(-1);
            $table->integer('color3d6')->default(-1);
            $table->integer('color3d7')->default(-1);
            $table->integer('color3d8')->default(-1);
            $table->integer('color3d9')->default(-1);
            $table->integer('color3d10')->default(-1);
            $table->integer('color3d11')->default(-1);
            $table->integer('color3d12')->default(-1);
            $table->integer('color3d13')->default(-1);
            $table->integer('color3d14')->default(-1);
            $table->integer('color3d15')->default(-1);
            $table->integer('color3d16')->default(-1);
            $table->integer('color3d17')->default(-1);
            $table->integer('color3d18')->default(-1);
            
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

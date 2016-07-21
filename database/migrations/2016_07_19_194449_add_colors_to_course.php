<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorsToCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('courses', function (Blueprint $table) {
            $table->string('color1')->default("");
            $table->string('color2')->default("");
            $table->string('color3')->default("");
            $table->string('color4')->default("");
            $table->string('color5')->default("");
            $table->string('color6')->default("");
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

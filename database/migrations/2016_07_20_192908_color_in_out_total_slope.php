<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColorInOutTotalSlope extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('color1parin')->default(-1);
            $table->integer('color1parout')->default(-1);
            $table->integer('color2parin')->default(-1);
            $table->integer('color2parout')->default(-1);
            $table->integer('color3parin')->default(-1);
            $table->integer('color3parout')->default(-1);
            $table->integer('color4parin')->default(-1);
            $table->integer('color4parout')->default(-1);
            $table->integer('color5parin')->default(-1);
            $table->integer('color5parout')->default(-1);
            $table->integer('color6parin')->default(-1);
            $table->integer('color6parout')->default(-1);
            $table->integer('color1total')->default(-1);
            $table->integer('color2total')->default(-1);
            $table->integer('color3total')->default(-1);
            $table->integer('color4total')->default(-1);
            $table->integer('color5total')->default(-1);
            $table->integer('color6total')->default(-1);
            $table->integer('color1slope')->default(-1);
            $table->integer('color2slope')->default(-1);
            $table->integer('color3slope')->default(-1);
            $table->integer('color4slope')->default(-1);
            $table->integer('color5slope')->default(-1);
            $table->integer('color6slope')->default(-1);
            

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

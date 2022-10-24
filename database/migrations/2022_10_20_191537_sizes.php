<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sizes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('sample_id');
            $table->decimal('x1');
            $table->decimal('x2');
            $table->decimal('x3');
            $table->decimal('x4');
            $table->decimal('x5');
            $table->decimal('x6');
            $table->decimal('y1');
            $table->decimal('y2');
            $table->decimal('y3');
            $table->decimal('y4');
            $table->decimal('y5');
            $table->decimal('y6');
            $table->decimal('z1');
            $table->decimal('z2');
            $table->decimal('z3');
            $table->decimal('z4');
            $table->boolean('perpendicularity');
            $table->boolean('flatness');
            $table->string('notes', 300)->nullable();
            $table->tinyInteger('lab_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}

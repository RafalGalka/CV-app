<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WSResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WSResults', function (Blueprint $table) {
            $table->id();
            $table->integer('protocol_number');
            $table->tinyInteger('sample_number')->nullable();
            $table->date('date');
            $table->time('time')->nullable();
            $table->smallInteger('weight');
            $table->smallInteger('force');
            $table->tinyInteger('test_type');
            $table->string('notes', 400)->nullable();
            $table->tinyInteger('lab_id');
            $table->integer('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WSResults');
    }
}

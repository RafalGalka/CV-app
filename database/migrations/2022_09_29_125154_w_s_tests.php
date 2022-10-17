<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WSTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WSTests', function (Blueprint $table) {
            $table->id();
            $table->integer('protocol_number');
            $table->date('test_age')->nullable();
            $table->boolean('tested')->default(false);
            $table->smallInteger('sample_nr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WSTests');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Samples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('protocol_number')->unsigned()->index();
            $table->tinyInteger('number')->unsigned()->nullable();
            $table->string('wz_number', 80)->unsigned()->nullable();
            $table->string('hour')->nullable();
            $table->boolean('natural_conditions')->default(false);
            $table->smallInteger('consistency')->unsigned()->nullable();
            $table->decimal('temperature', $precision = 3, $scale = 1)->nullable();
            $table->decimal('air_content', $precision = 3, $scale = 1)->nullable();
            $table->decimal('reinforcement_volume', $precision = 3, $scale = 1)->nullable();
            $table->string('my_comment', 400)->nullable();
        });

        Schema::create('take_samples', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('protocol_number')->unsigned()->index();
            $table->string('mark')->nullable();
            $table->date('picking_date')->index();
            $table->tinyInteger('number')->unsigned()->nullable();
            $table->tinyInteger('test_type')->unsigned()->nullable();
            $table->string('element', 400)->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->string('client_comment', 400)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
        Schema::dropIfExists('take_samples');
    }
}

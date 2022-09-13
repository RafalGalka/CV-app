<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdTakeSamples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('take_samples', function (Blueprint $table) {
            $table->tinyInteger('compression_class')->unsigned()->nullable();
            $table->tinyInteger('test_time')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('take_samples', function (Blueprint $table) {
            $table->dropColumn('compression_class');
            $table->dropColumn('test_time');
        });
    }
}

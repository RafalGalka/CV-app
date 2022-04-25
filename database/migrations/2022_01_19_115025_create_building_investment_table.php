<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->smallInteger('client_id')->unsigned();
            $table->string('name', 400)->nullable();
            $table->string('short_name', 80)->nullable()->index();
            $table->string('detail_picking', 400)->nullable();
            $table->string('comment', 400)->nullable();
            $table->boolean('activ');
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('short_name', 80);
            $table->string('name', 400);
            $table->string('address', 400)->nullable();
            $table->string('comment', 400)->nullable();
            $table->boolean('activ');
        });

        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->smallInteger('investment_id')->unsigned();
            $table->string('recipe_number', 200)->index();
            $table->string('strenght_class', 80)->nullable()->index();
            $table->integer('rate_time')->unsigned()->nullable();
            $table->string('waterproof', 80)->nullable();
            $table->integer('w_days')->unsigned()->nullable();
            $table->string('properties', 250)->nullable();
            $table->string('comment', 400)->nullable();
            $table->boolean('activ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('recipes');
    }
}

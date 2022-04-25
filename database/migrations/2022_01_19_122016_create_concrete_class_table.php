<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcreteClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strenghtClasses', function (Blueprint $table) {
            $table->id();
            $table->string('material_types', 80)->nullable();
            $table->string('strenght_class', 20)->unique();
            $table->boolean('activ')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strenghtClasses');
    }
}

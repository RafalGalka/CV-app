<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Protocols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unsigned()->unique()->index();
            $table->boolean('activ')->default(true);
            $table->mediumInteger('veryfication_key')->unsigned()->index()->nullable();
            $table->char('check_key', 1)->nullable();
        });

        Schema::create('protocolOthers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unsigned()->unique()->index();
            $table->date('date')->index();
            $table->boolean('drive')->default(true);
            $table->smallInteger('client_id')->unsigned();
            $table->smallInteger('invest_id')->index()->nullable();
            $table->tinyInteger('test_type')->unsigned()->nullable();
            $table->smallInteger('number_of_sample')->unsigned()->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id')->unsigned();
            $table->smallInteger('user_id')->unsigned()->nullable();
            $table->string('client_comment', 400)->nullable();
        });

        Schema::create('protocolZS', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unsigned()->unique()->index();
            $table->date('date')->index();
            $table->boolean('drive')->default(true);
            $table->smallInteger('client_id')->unsigned();
            $table->smallInteger('invest_id')->unsigned()->index()->nullable();
            $table->string('recipe', 200)->nullable();
            $table->tinyInteger('compression_class')->unsigned()->nullable();
            $table->tinyInteger('bending_class')->unsigned()->nullable();
            $table->string('element', 400)->nullable();
            $table->tinyInteger('days_28')->unsigned()->nullable();
            $table->tinyInteger('days_7')->unsigned()->nullable();
            $table->tinyInteger('days_56')->unsigned()->nullable();
            $table->tinyInteger('volume_A')->unsigned()->nullable();
            $table->tinyInteger('day_A')->unsigned()->nullable();
            $table->time('time')->nullable();
            $table->tinyInteger('collection')->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id')->unsigned();
            $table->smallInteger('user_id')->unsigned()->nullable();
            $table->string('client_comment', 400)->nullable();
        });

        Schema::create('protocolOD', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unsigned()->unique()->index();
            $table->boolean('drive')->default(true);
            $table->date('date')->index();
            $table->smallInteger('client_id')->unsigned();
            $table->smallInteger('invest_id')->unsigned()->index()->nullable();
            $table->smallInteger('number_of_sample')->unsigned()->nullable();
            $table->smallInteger('sample_type')->unsigned()->nullable();
            $table->tinyInteger('collection')->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id')->unsigned();
            $table->smallInteger('user_id')->unsigned()->nullable();
            $table->string('client_comment', 400)->nullable();
        });

        /*      Schema::create('protocolGB', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unique()->index();
            $table->date('date')->index();
            $table->tinyInteger('factory');
            $table->string('invest', 200)->nullable();
            $table->integer('recipe_GB');
            $table->string('compression_class', 20)->nullable();
            $table->boolean('collect_in_factory')->default(true);
            $table->tinyInteger('28_days')->nullable();
            $table->tinyInteger('56_days')->nullable();
            $table->tinyInteger('7_days')->nullable();
            $table->tinyInteger('14_days')->nullable();
            $table->tinyInteger('X_days')->nullable();
            $table->tinyInteger('X')->nullable();
            $table->tinyInteger('Y_days')->nullable();
            $table->tinyInteger('Y')->nullable();
            $table->tinyInteger('Z_days')->nullable();
            $table->tinyInteger('Z')->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id');
            $table->boolean('drive')->default(true);
            $table->boolean('collection')->default(true);
        });

        Schema::create('protocolGBOD', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unique()->index();
            $table->date('date_pick');
            $table->date('date')->index();
            $table->tinyInteger('factory');
            $table->integer('recipe_GB');
            $table->tinyInteger('compression_class')->nullable();
            $table->tinyInteger('28_days')->nullable();
            $table->tinyInteger('56_days')->nullable();
            $table->tinyInteger('7_days')->nullable();
            $table->tinyInteger('14_days')->nullable();
            $table->tinyInteger('X_days')->nullable();
            $table->tinyInteger('X')->nullable();
            $table->tinyInteger('Y_days')->nullable();
            $table->tinyInteger('Y')->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id');
            $table->boolean('drive');
        }); */

        Schema::create('protocolPOB', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumInteger('protocol_number')->unsigned()->unique()->index();
            $table->date('date')->index();
            $table->boolean('drive')->default(true);
            $table->smallInteger('client_id')->unsigned();
            $table->smallInteger('invest_id')->unsigned()->index()->nullable();
            $table->mediumInteger('recipe')->unsigned()->nullable();
            $table->tinyInteger('compression_class')->unsigned()->nullable();
            $table->tinyInteger('waterproof')->unsigned()->nullable();
            $table->decimal('air_temp', $precision = 3, $scale = 1)->nullable();
            $table->tinyInteger('collection')->nullable();
            $table->string('element')->nullable();
            $table->tinyInteger('days_28')->unsigned()->nullable();
            $table->tinyInteger('days_56')->unsigned()->nullable();
            $table->tinyInteger('days_7')->unsigned()->nullable();
            $table->tinyInteger('volume_phone')->unsigned()->nullable();
            $table->tinyInteger('volume_W')->unsigned()->nullable();
            $table->tinyInteger('type_A')->unsigned()->nullable();
            $table->tinyInteger('volume_A')->unsigned()->nullable();
            $table->tinyInteger('day_A')->unsigned()->nullable();
            $table->tinyInteger('type_B')->unsigned()->nullable();
            $table->tinyInteger('volume_B')->unsigned()->nullable();
            $table->tinyInteger('day_B')->unsigned()->nullable();
            $table->tinyInteger('type_C')->unsigned()->nullable();
            $table->tinyInteger('volume_C')->unsigned()->nullable();
            $table->tinyInteger('day_C')->unsigned()->nullable();
            $table->string('my_comment', 400)->nullable();
            $table->smallInteger('lab_id')->unsigned();
            $table->smallInteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('protocols');
        Schema::dropIfExists('protocolOthers');
        Schema::dropIfExists('protocolZS');
        Schema::dropIfExists('protocolOD');
        Schema::dropIfExists('protocolGB');
        Schema::dropIfExists('protocolGBOD');
        Schema::dropIfExists('protocolPOB');
    }
}

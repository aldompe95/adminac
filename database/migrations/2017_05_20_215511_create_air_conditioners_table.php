<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirConditionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_conditioners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nserie');
            $table->integer('technological_id');
            $table->string('brand');
            $table->string('model');
            $table->date('purchase_at');
            $table->date('remission_at')->nullable(true);
            $table->boolean('status');
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
        Schema::dropIfExists('air_conditioners');
    }
}

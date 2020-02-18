<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('chassis_no')->nullable();
            $table->double('motor_cc')->nullable()
                ->comment('Cylinder Capacity or Cubic Centimeters');
            $table->text('description')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('vehicles');
    }
}

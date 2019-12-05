<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('depots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buyer_name');
            $table->tinyInteger('load_point')->nullable();
            $table->tinyInteger('unload_point')->nullable();
            $table->string('item')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('no_of_box')->nullable();
            $table->integer('no_of_drum')->nullable();
            $table->integer('no_of_jar')->nullable();
            $table->integer('no_of_bag')->nullable();
            $table->integer('no_of_roll')->nullable();
            $table->integer('no_of_bell')->nullable();
            $table->float('no_of_cbm', 10, 6)->nullable();
            $table->integer('no_of_kg')->nullable();
            $table->integer('fare')->nullable();
            $table->integer('no_of_van')->nullable();
            $table->string('transport_name')->nullable();
            $table->string('cover_van_no')->nullable();
            $table->string('cover_van_capacity')->nullable();
            $table->string('reason_for_transfer')->nullable();
            $table->string('concern_person_name')->nullable();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       //  Schema::dropIfExists('depots');
    }
}

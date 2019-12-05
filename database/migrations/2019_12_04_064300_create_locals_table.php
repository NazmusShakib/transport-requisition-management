<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('locals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('requisition_no')->unique()->nullable();
            $table->bigInteger('requisition_no')->unique()->nullable();
            $table->date('requisition_date')->nullable();
            $table->string('requisition_create_by')->nullable();
            $table->tinyInteger('requisition_location')->nullable();
            $table->tinyInteger('load_point')->nullable();
            $table->tinyInteger('unload_point')->nullable();
            $table->string('chalan_no')->nullable();
            $table->date('chalan_date')->nullable();
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
            $table->time('load_time')->nullable();
            $table->time('get_out_time')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('store_concern_name')->nullable();
            $table->string('store_concern_cell_no')->nullable();
            $table->integer('no_of_van')->nullable();
            $table->integer('fare')->nullable();
            $table->string('transport_name')->nullable();
            $table->string('cover_van_capacity')->nullable();
            $table->string('cover_van_no')->nullable();
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
        // Schema::dropIfExists('locals');
    }
}

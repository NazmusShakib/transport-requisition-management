<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requisition_no')->unique()->nullable();
            $table->date('requisition_date')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('requisition_location')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('load_point')->nullable();
            $table->string('item')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('no_of_van')->nullable();
            $table->time('load_time')->nullable();
            $table->time('unload_time')->nullable();
            $table->time('cut_of_time')->nullable();
            $table->float('fare', 8, 2)->nullable();
            $table->string('transport_name')->nullable();
            $table->string('cover_van_capacity')->nullable();
            $table->string('cover_van_no')->nullable();
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
        Schema::dropIfExists('exports');
    }
}

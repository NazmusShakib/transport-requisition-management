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

            $table->bigInteger('created_by')->unsigned()->nullable()
                ->comment('We will get that from auth user id');
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('requisition_location')->nullable();
            $table->string('buyer_name', 100)->nullable();
            $table->string('load_point', 100)->nullable();
            $table->string('unload_point', 100)->nullable();
            $table->string('items', 100)->nullable();
            $table->integer('qty')->nullable();
            $table->string('cbm')->nullable();
            $table->integer('no_of_van')->nullable();
            $table->timestamp('load_time')->nullable();
            $table->timestamp('unload_time')->nullable();
            $table->timestamp('cut_off_moment')->nullable();
            $table->float('fare', 8, 2)->nullable();
            $table->string('transport_name', 100)->nullable();
            $table->string('cover_van_capacity', 100)->nullable();
            $table->string('cover_van_no', 100)->nullable();
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

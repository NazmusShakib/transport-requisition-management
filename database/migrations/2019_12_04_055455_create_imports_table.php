<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requisition_no')->unique()->nullable();
            $table->date('requisition_date')->nullable();

            $table->string('requisition_location')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('lc_no')->nullable();
            $table->date('lc_date')->nullable();
            $table->string('items')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('no_of_box')->nullable();
            $table->integer('no_of_drum')->nullable();
            $table->integer('no_of_jar')->nullable();
            $table->integer('no_of_bag')->nullable();
            $table->integer('no_of_roll')->nullable();
            $table->integer('no_of_bell')->nullable();
            $table->float('no_of_cbm', 10, 6)->nullable();
            $table->string('cnf_name')->nullable();
            $table->string('jetty_sorkar_cell_no')->nullable();
            $table->string('load_time')->nullable();
            $table->string('get_out_time')->nullable();
            $table->string('storage_location')->nullable();
            $table->string('store_concern_name')->nullable();
            $table->string('store_concern_cell_no')->nullable();
            $table->integer('no_of_van')->nullable();
            $table->float('fare', 8, 2)->nullable();
            $table->string('transport_name')->nullable();
            $table->string('cover_van_capacity')->nullable();
            $table->string('cover_van_no')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable()
                ->comment('We will get that from auth user id');
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');

            $table->bigInteger('updated_by')->unsigned()->nullable()
                ->comment('We will get that from auth user id');
            $table->foreign('updated_by')->references('id')
                ->on('users');

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
        Schema::dropIfExists('imports');
    }
}

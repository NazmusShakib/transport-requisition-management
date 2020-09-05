<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->bigInteger('source_id')->unsigned()->nullable();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->string('pay_mode')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('ready_to_approve')->nullable();
            $table->string('place_of_delivery')->nullable();
            $table->string('part_of_loading')->nullable();
            $table->string('tenor')->nullable();
            $table->string('pay_term')->nullable();
            $table->string('attention')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users');

            $table->foreign('company_id')->references('id')
                ->on('companies');
            $table->foreign('supplier_id')->references('id')
                ->on('suppliers');
            $table->foreign('location_id')->references('id')
                ->on('locations');
            $table->foreign('source_id')->references('id')
                ->on('sources');

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
        Schema::dropIfExists('work_orders');
    }
}

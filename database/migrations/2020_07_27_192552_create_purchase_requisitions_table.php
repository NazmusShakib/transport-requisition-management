<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('division_id')->unsigned()->nullable();
            $table->bigInteger('source_id')->unsigned()->nullable();
            $table->string('pay_mode')->nullable();
            $table->date('requisition_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('ready_to_approve')->nullable();
            $table->string('iso_no')->nullable();
            $table->string('manual_requisition_no')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users');

            $table->foreign('company_id')->references('id')
                ->on('companies');
            $table->foreign('department_id')->references('id')
                ->on('departments');
            $table->foreign('store_id')->references('id')
                ->on('stores');
            $table->foreign('location_id')->references('id')
                ->on('locations');
            $table->foreign('section_id')->references('id')
                ->on('sections');
            $table->foreign('division_id')->references('id')
                ->on('divisions');
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
        Schema::dropIfExists('purchase_requisitions');
    }
}

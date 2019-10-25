<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_service_id')->unsigned()->nullable();
            $table->text('days');
            $table->date('start_time');
            $table->date('end_time');
            $table->timestamps();
            $table->softDeletes();

            // foreign keys
            $table->foreign('employee_service_id')->references('id')->on('employeeservices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}

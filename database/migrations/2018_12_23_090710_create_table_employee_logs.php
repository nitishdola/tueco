<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployeeLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_logs', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('Remarks', 900)->nullable();
            $table->string('machine_ip', 100)->nullable(); 
            $table->integer('created_by',false, true);
            $table->timestamps();    
            $table->foreign('created_by')->references('id')->on('employees');
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::dropIfExists('employee_logs');
    }
}

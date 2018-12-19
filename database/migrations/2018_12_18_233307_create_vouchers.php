<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_financial', false, true);
            $table->string('voucher_number', 20);    
            $table->date('voucher_date');            
            $table->integer('voucher_type_id', false, true);
            $table->string('remarks', 1000)->nullable(); 
            $table->string('financial_year', 10)->nullable(); 
            $table->boolean('status')->default(1); 
            $table->integer('created_by'); 
            $table->timestamps();
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}

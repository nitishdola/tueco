<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('register_id', false, true);
            $table->integer('voucher_transaction_id', false, true);
            $table->integer('member_id', false, true);
            $table->unsignedDecimal('credit', 8, 2)->default(0);   
            $table->unsignedDecimal('debit', 8, 2)->default(0);    
            $table->boolean('status')->default(1);                
            $table->foreign('register_id')->references('id')->on('registers');
            $table->foreign('voucher_transaction_id')->references('id')->on('voucher_transactions');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_transactions');
    }
}

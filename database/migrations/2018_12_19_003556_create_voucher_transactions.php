<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id', false, true);
            $table->integer('accounts_group_id', false, true);  
            $table->integer('ledger_id', false, true);
            $table->unsignedDecimal('credit', 8, 2)->default(0);   
            $table->unsignedDecimal('debit', 8, 2)->default(0);    
            $table->boolean('status')->default(1);  
            $table->timestamps();
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('accounts_group_id')->references('id')->on('accounts_groups');
            $table->foreign('ledger_id')->references('id')->on('ledgers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_transactions');
    }
}

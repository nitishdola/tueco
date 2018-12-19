<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ledger_code', 100)->nullable();    
            $table->string('name', 200);                  
            $table->integer('group_id', false, true); 
            $table->boolean('cash_ledger')->default(0); 
            $table->string('narration', 400)->nullable(); 
            $table->integer('register')->default(0); 
            $table->boolean('status')->default(1); 
            $table->boolean('active')->default(1); 
            $table->timestamps(); 
            $table->foreign('group_id')->references('id')->on('accounts_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}

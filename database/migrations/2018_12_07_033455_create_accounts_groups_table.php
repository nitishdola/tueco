<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_code', 100)->nullable();    
            $table->string('name', 200);            
            $table->integer('group_under'); 
            $table->integer('head_id', false, true); 
            $table->string('narration', 400)->nullable(); 
            $table->boolean('status')->default(1); 
            $table->boolean('active')->default(1); 
            $table->timestamps();
            $table->foreign('head_id')->references('id')->on('head_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_groups');
    }
}

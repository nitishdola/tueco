<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('member_code')->unique();
            $table->string('name', 100);
            $table->string('fathers_name', 100)->nullable(); 
            $table->string('mothers_name', 100)->nullable(); 
            $table->string('address', 300)->nullable(); 
            $table->string('bank_account_number', 100)->nullable(); 
            $table->string('bank_name', 100)->nullable();  
            $table->integer('gender');// 1 - Male, 2 - Female
            $table->date('birth_date')->nullable();
            $table->date('joining_date')->nullable();      
            $table->string('email', 100)->nullable(); 
            $table->string('mobile', 16)->unique();
            $table->string('password');
            $table->rememberToken();   
            $table->integer('membership_status')->default(0); // 0 is member, 1 is retired, 2 is expired, 3 is in-actived but chances to be get membership again.     
            $table->date('exit_date')->nullable();  
            $table->boolean('status')->default(1); 
            $table->integer('created_by'); 
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
        Schema::dropIfExists('members');
    }
}

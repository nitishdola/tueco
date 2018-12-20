<?php

use Illuminate\Database\Seeder;

class employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(array(
            array('name'=>'Employee',  'username' => 'employee', 'password' => bcrypt('password'))
        ));
     }
}

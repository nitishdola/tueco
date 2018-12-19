<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
	      array('name'=>'Nitish Dolakasharia',  'username' => 'admin', 'password' => bcrypt('password'))
	    ));
    }
}

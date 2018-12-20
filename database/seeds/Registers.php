<?php

use Illuminate\Database\Seeder;

class Registers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registers')->insert(array(
            array('name'=>'Share I'),
            array('name'=>'Share II'),
            )
        );
    }
}

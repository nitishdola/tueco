<?php

use Illuminate\Database\Seeder;

class AccountsMainHead extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('head_groups')->insert(array(
            array('name'=>'Assets'),
            array('name'=>'Liabilities'),
            array('name'=>'Income'),
            array('name'=>'Expenditure'), 
            )
        );
    }
}

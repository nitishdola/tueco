<?php

use Illuminate\Database\Seeder;

class VoucherTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_types')->insert(array(
            array('name'=>'Payment'),
            array('name'=>'Receipt'),
            array('name'=>'Jornal'),
            array('name'=>'Contra'), 
            )
        );
    }
}

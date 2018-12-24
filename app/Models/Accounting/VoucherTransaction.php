<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    protected $table = 'voucher_transactions';
    public $primaryKey = 'id';
    
    public function ledgers(){
        return $this->belongsTo('App\Models\Accounting\Ledger','ledger_id');
    } 
}


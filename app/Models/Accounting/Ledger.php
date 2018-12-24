<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'ledgers';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name','ledger_code','group_id','cash_ledger','register','created_by','narration'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [ 
        'name' 				=> 'required|max:127|unique:ledgers,name,0,status', 
        'group_id' 	        => 'required|exists:accounts_groups,id', 
        'ledger_code' 		=> 'required|numeric|unique:ledgers,ledger_code,0,status', 
         
    ];
    public static $messages = array(        
        'name.required' => 'The Ledger name is required!',
        'name.unique' => 'The Ledger name is already be taken!',
        'name.max' => 'The Ledger name must be less than 128 character!',

        'ledger_code.required' => 'The Ledger Code is required!',
        'ledger_code.unique' => 'The Ledger Code is already be taken!', 
        'ledger_code.numeric' => 'Only number allowed!',

        'group_id.required' => 'Head Under is required!', 
    );
    public function accounts_groups(){
        return $this->belongsTo('App\Models\Accounting\AccountsHead','group_id');
    } 
    public function voucher_transactions()
    {
        return $this->hasMany('App\Models\Accounting\VoucherTransaction'); 
	}
}

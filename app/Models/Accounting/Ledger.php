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
        'name' 				=> 'required|max:127|unique:accounts_groups', 
        'group_id' 	        => 'required|exists:head_groups,id', 
        'ledger_code' 		=> 'required|numeric|unique:accounts_groups', 
    ];
    public static $messages = array(        
        'name.required' => 'The Account Head is required!',
        'name.unique' => 'The Account Head is already be taken!',
        'name.max' => 'The Account Head must be less than 128 character!',

        'group_code.required' => 'The Account Code is required!',
        'group_code.unique' => 'The Account Code is already be taken!', 
        'group_code.numeric' => 'Only number allowed!',

        'head_id.required' => 'Group Under is required!', 
    );
    public function accounts_groups(){
        return $this->belongsTo('App\Models\Accounting\AccountsHead','group_id');
    } 
}

<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountsHead extends Model
{
    protected $table = 'accounts_groups';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name','group_code','head_id','created_by','narration'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [ 
        'name' 				=> 'required|max:127|unique:accounts_groups', 
        'head_id' 	        => 'required|exists:head_groups,id', 
        'group_code' 		=> 'required|numeric|unique:accounts_groups', 
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
    public function head_groups(){
        return $this->belongsTo('App\Models\Accounting\HeadGroup','head_id');
    } 
}

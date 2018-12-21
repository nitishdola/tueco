<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountsHead extends Model
{
    protected $table = 'accounts_groups';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
    public function head_groups(){
        return $this->belongsTo('App\Models\Accounting\HeadGroup','head_id');
    } 
}

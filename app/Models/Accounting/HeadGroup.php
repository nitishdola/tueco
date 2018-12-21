<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class HeadGroup extends Model
{
    protected $table = 'head_groups';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
    
    public function accounts_groups()
    {
        return $this->hasMany('App\Models\Accounting\AccountsHead'); 
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'employee_logs';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('remarks','machine_ip','created_by'); 
    protected $guarded   	= ['_token'];
}

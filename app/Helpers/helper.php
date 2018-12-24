<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Profile\UserProfile;
class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }
  
    public static function allGroupsHead($list = false, $where = [])
    {
    	if($list) return DB::table('head_groups')->where($where)->where('status',1)->pluck('name','id');
		return DB::table('head_groups')->where($where)->where('status',1)->get();    
    }
    public static function allAccountsHead($list = false, $where = [])
    {
    	if($list) return DB::table('accounts_groups')->orderBy('name','asc')->where($where)->where('status',1)->pluck('name','id');
		return DB::table('accounts_groups')->orderBy('name','asc')->where($where)->where('status',1)->get();    
    }
    public static function allActiveAccountsHead($list = false, $where = [])
    {
    	if($list) return DB::table('accounts_groups')->orderBy('name','asc')->where($where)->where('status',1)->where('active',1)->pluck('name','id');
		return DB::table('accounts_groups')->orderBy('name','asc')->where($where)->where('status',1)>where('active',1)->get();    
    }
    public static function allLedgers($list = false, $where = [])
    {
    	if($list) return DB::table('ledgers')->orderBy('name','asc')->where($where)->where('status',1)->pluck('name','id');
		return DB::table('ledgers')->orderBy('name','asc')->where($where)->where('status',1)->get();    
    }
    public static function allActiveLedgers($list = false, $where = [])
    {
    	if($list) return DB::table('ledgers')->orderBy('name','asc')->where($where)->where('status',1)->where('active',1)->pluck('name','id');
		return DB::table('ledgers')->orderBy('name','asc')->where($where)->where('status',1)>where('active',1)->get();    
    }
    public static function allRegisters($list = false, $where = [])
    {
    	if($list) return DB::table('registers')->orderBy('name','asc')->where($where)->where('status',1)->where('is_active',1)->pluck('name','id');
		return DB::table('registers')->orderBy('name','asc')->where($where)->where('status',1)>where('is_active',1)->get();    
    }
}
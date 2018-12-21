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
}
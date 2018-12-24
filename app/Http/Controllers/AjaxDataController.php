<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Accounting\HeadGroup;
use App\Models\Accounting\AccountsHead; 
use App\Models\Logs;  
use Illuminate\Support\Facades\Auth;
use App\Employee;  
use DB, Crypt, Helper, Validator, Redirect;

class AjaxDataController extends Controller
{
    public function logs($remarks, $id)
    {          
        $data['remarks'] = $remarks;
        $data['machine_ip'] = request()->ip();
        $data['created_by'] = $id;    
        Logs::create($data);
    }
    public function statusupdate(Request $request)
    {  
        
        DB::beginTransaction();  
        $st = $request->st;        
        $id = $request->id;
        $user_id = $request->uid;
        $act="";
        $accounts = AccountsHead::findOrFail($id);   
        $name = $accounts->name;    
        if($st==1) {
            $accounts->active ="1"; 
            $act='Active' ;
        }
        if($st==0) {
            $accounts->active ="0";  
            $act='De-Active' ;
        }
        $accounts->save();
        $rmk = 'Account Head: '.$name. ' has been '.$act.' successfully.';
        $this->logs($rmk,$user_id);
        DB::commit();        
        return response()->json([
            'success' => 'Account Head '.$name. ' has been '.$act.' successfully!'
        ]);
    }
}

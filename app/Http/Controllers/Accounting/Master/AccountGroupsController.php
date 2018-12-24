<?php

namespace App\Http\Controllers\Accounting\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Accounting\HeadGroup; 
use App\Models\Accounting\AccountsHead;  
use App\Models\Accounting\Ledger;  
use App\Models\Logs;  
use Illuminate\Support\Facades\Auth;
use App\Employee;  
use DB, Crypt, Helper, Validator, Redirect;

class AccountGroupsController extends Controller
{
 
    public function breadcumlink()
    {       
        $l1="Home";
        $l2="Accounting";
        $l3="Masters";
        $l4="Accounting Head"; 
        $level = '2'; 
        $sublevel = '21'; 
        $menu = '211'; 
        $msgtype    =   '';
        $message    = '';
        $link = compact('l1','l2','l3','l4','level', 'sublevel', 'menu','msgtype', 'message');
        
        return  $link;
    }
    public function index(request $request)
    {           
        $link= $this->breadcumlink(); 
        $user_id = Auth::id();  
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }  
        $accounts = AccountsHead::where('status','1')->where($where)->orderBy('group_code', 'asc')->paginate(20);         
         
        return view('accounts.master.accountshead.view', compact('accounts','request','user_id'))->with($link); 
    
    }
 
    public function create()
    {  
        $link= $this->breadcumlink();  
        $groups   = Helper::allGroupsHead($list = true); 
        return view('accounts.master.accountshead.create', compact('groups'))->with($link);  
   
    }
 
    public function store(Request $request)
    {       
        
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $data       = $request->all();   
        $user_id = Auth::id();  
        $data['created_by'] = $user_id ;     
        $name = $request->name;
        $rules      = AccountsHead::$rules;    
        $messages      = AccountsHead::$messages;   
        $validator = Validator::make($data, $rules,$messages);
       // $validator = Validator::make($data, AccountsHead::$rules, AccountsHead::$messages);   
        if ($validator->fails()) 
        {  
            DB::commit();           
            return Redirect::back()->withErrors($validator)->withInput(); 
        }
        if(AccountsHead::create($data)) { 
            $type    .= 'Success!';
            $message    .= 'Accounting Head has been added successfully !'; 
            $alert    =   'alert-success'; 
            $rmk = 'Account head: '.$name. ' has been added';
            $this->logs($rmk); 
        }
        else{ 
            $type    .= 'Failed!';
            $message    .= 'Unable to store Accounting Head!'; 
            $alert    =   'alert-danger';
        }
        DB::commit();    
        return Redirect::route('employee.accounthead.create')->with(compact('type','message', 'alert'));    
   
    } 
     
    public function edit($id)
    {
        $link= $this->breadcumlink();  
        $id = Crypt::decrypt($id);  
        $accounts = AccountsHead::findOrFail($id);  
        $groups   = Helper::allGroupsHead($list = true);  
        return view("accounts.master.accountshead.edit", compact('groups', 'accounts'))->with($link); 
  
    }
    public function rules_edit($id)
    {	       
        $name = 'required|max:127|unique:accounts_groups,name,0,status,id,!'.$id;
        $head_id = 'required|exists:head_groups,id'; 
        $group_code ='required|numeric|unique:accounts_groups,group_code,0,status,id,!'.$id; 
        return [ 
         'name'  => $name,
         'head_id'  => $head_id,
         'group_code'  => $group_code,
      ]; 
    }
    public function update(Request $request, $id)
    {
        
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $id = Crypt::decrypt($id);   
        $rules      = $this->rules_edit($id);    
        $messages      = AccountsHead::$messages;    
        $data       = $request->all();  
        $accounts = AccountsHead::find($id);    
        $name = $request->name;     
        $validator = Validator::make($data, $rules,$messages);
        if ($validator->fails())
        {
            DB::commit();
            return Redirect::back()->withErrors($validator)->withInput(); 
        }
        $accounts->fill($data); 
        if($accounts->save()) {
            $type    .= 'Success!';
            $message    .= 'Accounting Head has been updated successfully !'; 
            $alert    =   'alert-success';
            $rmk = 'Account head: '.$name. ' has been updated';
            $this->logs($rmk); 
        }else{
            $type    .= 'Failed!';
            $message    .= 'Unable to update Accounting Head!'; 
            $alert    =   'alert-danger';
        }   
         
        DB::commit(); 
        return Redirect::route('employee.accounthead.index')->with(compact('type','message', 'alert'));    
      
    }
     
    public function destroy($id)
    {  
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $ledgers = Ledger::where('status','1')->where('group_id',$id)->get();
        $ledgers = count($ledgers);
        if((int)$ledgers < 1)
        {   
            $accounts = AccountsHead::find($id);
            $name = $accounts->name;
            $code=  $accounts->group_code;
            $accounts->status ="0";     
            if($accounts->save()) {
                $type    .= 'Success!';
                $message    .= 'Accounting Head has been deleted successfully !'; 
                $alert    .=   'alert-success';
                $rmk = 'Account Head: '.$name.', head code: '.$code.' has been deleted.';
                $this->logs($rmk);
            }
            else
            {
                $type    .= 'Failed!';
                $message    .= 'Unable to delete Accounting Head!'; 
                $alert    .=   'alert-danger';
            } 
            DB::commit();     
            return Redirect::route('employee.accounthead.index')->with(compact('type','message', 'alert')); 
    
        }
        else
        {
            $type    .= 'Failed!';
            $message    .= 'You cannot delete this Accounting Head!'; 
            $alert    .=   'alert-danger'; 
            DB::commit();   
            return Redirect::route('employee.accounthead.index')->with(compact('type','message', 'alert')); 
        }
    }

    public function logs($remarks)
    {
        $user_id = Auth::id();  
        $data['remarks'] = $remarks;
        $data['machine_ip'] = request()->ip();
        $data['created_by'] = $user_id;    
        Logs::create($data);
    }

}

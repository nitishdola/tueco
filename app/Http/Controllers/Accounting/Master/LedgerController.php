<?php

namespace App\Http\Controllers\Accounting\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Models\Accounting\AccountsHead;  
use App\Models\Accounting\Ledger;  
use App\Models\Accounting\VoucherTransaction;  
use App\Models\Logs;  
use Illuminate\Support\Facades\Auth;
use App\Employee;  
use DB, Crypt, Helper, Validator, Redirect;

class LedgerController extends Controller
{
    public function breadcumlink()
    {       
        $l1="Home";
        $l2="Accounting";
        $l3="Masters";
        $l4="Ledger"; 
        $level = '2'; 
        $sublevel = '21'; 
        $menu = '212'; 
        $msgtype    =   '';
        $message    = '';
        $link = compact('l1','l2','l3','l4','level', 'sublevel', 'menu','msgtype', 'message');
        
        return  $link;
    }
    public function logs($remarks)
    {
        $user_id = Auth::id();  
        $data['remarks'] = $remarks;
        $data['machine_ip'] = request()->ip();
        $data['created_by'] = $user_id;    
        Logs::create($data);
    }
    public function rules_edit($id)
    {	       
        $name = 'required|max:127|unique:ledgers,name,0,status,id,!'.$id;
        $group_id = 'required|exists:accounts_groups,id'; 
        $ledger_code ='required|numeric|unique:ledgers,ledger_code,0,status,id,!'.$id; 
        return [ 
         'name'  => $name,
         'group_id'  => $group_id,
         'ledger_code'  => $ledger_code,
      ]; 
    }
    public function index(request $request)
    {
       $link= $this->breadcumlink(); 
        $user_id = Auth::id();  
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }  
        $ledgers = Ledger::where('status','1')->where($where)->orderBy('ledger_code', 'asc')->paginate(20);         
         
        return view('accounts.master.ledger.view', compact('ledgers','request','user_id'))->with($link); 
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $link= $this->breadcumlink();  
        $accounts   = Helper::allActiveAccountsHead($list = true); 
        $register   = Helper::allRegisters($list = true);  
        
        return view('accounts.master.ledger.create', compact('accounts','register'))->with($link);  
    }
 
    public function store(Request $request)
    {
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $data       = $request->all();   
        if($request['register'] == null)
        {
            $request['register'] = 0;
            $data['register'] = 0;
        }
        $user_id = Auth::id();  
        $data['created_by'] = $user_id ;     
        $name = $request->name;
        $rules      = Ledger::$rules;    
        $messages      = Ledger::$messages;   
        $validator = Validator::make($data, $rules,$messages); 
        if ($validator->fails()) 
        {   
            DB::commit();           
            return Redirect::back()->withErrors($validator)->withInput(); 
        }
        if(Ledger::create($data)) { 
            $type    .= 'Success!';
            $message    .= 'Ledger has been added successfully !'; 
            $alert    =   'alert-success'; 
            $rmk = 'Ledger Name: '.$name. ' has been added';
            $this->logs($rmk); 
        }
        else{ 
            $type    .= 'Failed!';
            $message    .= 'Unable to store Ledger!'; 
            $alert    =   'alert-danger';
        }
        DB::commit();    
        return Redirect::route('employee.ledger.create')->with(compact('type','message', 'alert'));    
   
    }  
    public function edit($id)
    {
        $link= $this->breadcumlink();  
        $id = Crypt::decrypt($id);  
        $ledgers = Ledger::findOrFail($id);  
        $accounts   = Helper::allActiveAccountsHead($list = true);  
        $register   = Helper::allRegisters($list = true);  
        return view("accounts.master.ledger.edit", compact('accounts', 'ledgers','register'))->with($link); 
  
    } 
    public function update(Request $request, $id)
    { 
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $id = Crypt::decrypt($id);   
        $rules      = $this->rules_edit($id);    
        $messages      = Ledger::$messages;    
        $data       = $request->all();  
        $ledgers = Ledger::find($id);    
        $name = $request->name;     
        if($request['register'] == null)
        {
            $request['register'] = 0;
            $data['register'] = 0;
        }
        $validator = Validator::make($data, $rules,$messages);
        if ($validator->fails())
        {
            DB::commit();
            return Redirect::back()->withErrors($validator)->withInput(); 
        }
        $ledgers->fill($data); 
        if($ledgers->save()) {
            $type    .= 'Success!';
            $message    .= 'Ledger has been updated successfully !'; 
            $alert    =   'alert-success';
            $rmk = 'Ledger Name: '.$name. ' has been updated';
            $this->logs($rmk); 
        }else{
            $type    .= 'Failed!';
            $message    .= 'Unable to update Ledger!'; 
            $alert    =   'alert-danger';
        }   
         
        DB::commit(); 
        return Redirect::route('employee.ledger.index')->with(compact('type','message', 'alert'));    
      
    } 
     
    public function destroy($id)
    {  
        DB::beginTransaction();  
        $alert    =   '';
        $type    =   '';
        $message    = '';
        $voucherTrans = VoucherTransaction::where('status','1')->where('ledger_id',$id)->get();
        $voucherTrans = count($voucherTrans);
        if((int)$voucherTrans < 1) 
        {  
            $ledger = Ledger::find($id);
            $name = $ledger->name;
            $code=  $ledger->ledger_code;
            $ledger->status ="0";     
            if($ledger->save()) {
                $type    .= 'Success!';
                $message    .= 'Ledger has been deleted successfully !'; 
                $alert    .=   'alert-success';
                $rmk = 'Ledger Name: '.$name.', Ledger code: '.$code.' has been deleted.';
                $this->logs($rmk);
            }
            else
            {
                $type    .= 'Failed!';
                $message    .= 'Unable to delete Ledger!'; 
                $alert    .=   'alert-danger';
            } 
            DB::commit();     
            return Redirect::route('employee.ledger.index')->with(compact('type','message', 'alert')); 
    
        }
        else
        {
            $type    .= 'Failed!';
            $message    .= 'You cannot delete this Ledger!'; 
            $alert    .=   'alert-danger'; 
            DB::commit();   
            return Redirect::route('employee.ledger.index')->with(compact('type','message', 'alert')); 
        } 
    }
}

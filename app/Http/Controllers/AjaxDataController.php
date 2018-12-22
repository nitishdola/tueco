<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Accounting\HeadGroup;
use App\Models\Accounting\AccountsHead; 
use DB, Crypt, Helper, Validator, Redirect;

class AjaxDataController extends Controller
{
    public function statusupdate(Request $request)
    {  
        $st = $request->st;        
        $id = $request->id;
        $head = AccountsHead::find($id);
        if($st==1) {
        $head->active ="1";  
        }
        if($st==0) {
            $head->active ="0";  
        }
        $head->save();
        return response()->json([
            'success' => 'Record has been de-active successfully!'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Accounting\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Accounting\HeadGroup; 
use App\Models\Accounting\AccountsHead;  
use DB, Crypt, Helper, Validator, Redirect;

class AccountGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function breadcumlink()
    {       
        $l1="Home";
        $l2="Accounting";
        $l3="Masters";
        $l4="Accounting Head"; 
        $level = '2'; 
        $sublevel = '21'; 
        $menu = '211'; 
        $link = compact('l1','l2','l3','l4','level', 'sublevel', 'menu');
        return  $link;
    }
    public function index(request $request)
    {          
        $link= $this->breadcumlink(); 
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }  
        $accounts = AccountsHead::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20);         
         
        return view('accounts.master.accountshead.view', compact('accounts','request'))->with($link); 
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $link= $this->breadcumlink();  
        $groups   = Helper::allGroupsHead($list = true); 
        return view('accounts.master.accountshead.create', compact('groups'))->with($link);  
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

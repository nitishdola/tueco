@extends('layout.employee.default')

@section('main_content') 
<div class="row">
    <div class="col-md-12"> 
        <div class="panel ">  
            <div class="panel-body"> 
               <ul class="nav nav-tabs">
                    <li><a  href="{{ route('employee.ledger.index') }}">View</a></li>
                    <li class="active"><a href="#">Edit</a></li>
               </ul> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">   
                            <span class="text-red pull-right"><b>*</b> fields are mandatory</span>
                             {!! Form::model($ledgers, array('route' => ['employee.ledger.update', Crypt::encrypt($ledgers->id)], 'id' => 'employee.ledger.update', 'class'=>'form-horizontal')) !!}
                                <div class="row" >      
                                    <div class="col-md-12">      
                                        @include('accounts.master.ledger._create')
                                    </div>
                                </div>
                                <div class="row" style="margin-top:12px;">
                                <div class="col-md-2"> </div>
                                    <div class="col-md-10"> 
                                        <a id="btnsubmit" class="btn btn-primary"  onclick="return validateForm()">Update</a>
                                        <a  href="{{ route('employee.ledger.index') }}"  class="btn btn-danger" >Back</a>
                                        @include('confirm')
                                    </div>
                                </div>
                            {!! Form::close() !!} 
                        </div>
                    </div>
                </div>

            </div> 
        </div>
    </div>
</div> 
@stop

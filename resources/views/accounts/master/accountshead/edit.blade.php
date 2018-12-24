@extends('layout.employee.default')

@section('main_content') 
<div class="row">
    <div class="col-md-12"> 
        <div class="panel ">  
            <div class="panel-body"> 
               <ul class="nav nav-tabs">
                    <li><a  href="{{ route('employee.accounthead.index') }}">View</a></li>
               <li class="active"><a href="{{ route('employee.accounthead.create') }}">{{ $accounts->id !="" ? "Edit" : "Add" }}</a></li>
               </ul> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">   
                            <span class="text-red pull-right"><b>*</b> fields are mandatory</span>
                            {!! Form::model($accounts, array('route' => ['employee.accounthead.update', Crypt::encrypt($accounts->id)], 'id' => 'employee.accounthead.update', 'class'=>'form-horizontal')) !!}
                                 <div class="row" >      
                                    <div class="col-md-12">      
                                        @include('accounts.master.accountshead._create')
                                    </div>
                                </div>
                                <div class="row" style="margin-top:12px;">
                                <div class="col-md-2"> </div>
                                    <div class="col-md-10"> 
                                        <a class="btn btn-primary"  onclick="return validateForm()">Update</a>
                                        <a  href="{{ route('employee.accounthead.index') }}"  class="btn btn-danger" >Back</a>
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

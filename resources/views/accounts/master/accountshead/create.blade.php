@extends('layout.employee.default')

@section('main_content') 
<div class="row">
    <div class="col-md-12"> 
        <div class="panel ">  
            <div class="panel-body"> 
               <ul class="nav nav-tabs">
                    <li><a  href="{{ route('employee.accounthead.index') }}">View</a></li>
                    <li class="active"><a href="{{ route('employee.accounthead.create') }}">Add</a></li>
               </ul> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">   
                                 
                            {!! Form::open(array('route' => 'employee.accounthead.create', 'id' => 'employee.accounthead.store', 'class'=>'form-horizontal')) !!}
                                <div class="row" >      
                                    <div class="col-md-12">      
                                        @include('accounts.master.accountshead._create')
                                    </div>
                                </div>
                                <div class="row" style="margin-top:12px;">
                                <div class="col-md-2"> </div>
                                    <div class="col-md-10"> 
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                        <a  href="{{ route('employee.accounthead.create') }}"  class="btn btn-danger" >Reset</a>
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

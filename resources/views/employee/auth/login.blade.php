@extends('layout.auth')

@section('main_content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/employee/login') }}">
                        {{ csrf_field() }}

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div>
        <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" aria-describedby="basic-addon1">
    </div>
    
    <div class="form-group text-center">
        <div class="col-xs-12 pb-3">
            <button class="btn btn-block btn-lg btn-info" type="submit">Data Entry Log In</button> 
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <!-- <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label> -->
                <a href="{{ route('admin.login') }}" title="Login as Admin" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Login as ADMIN</button>
            </div>
        </div>
    </div>
</form>
@stop

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Account Head', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-6">
      {!! Form::text('name',    null  , ['class' => 'form-control required ', 'id' => 'name', 'placeholder' => 'Accounts Head', 'required' => 'true', ]) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('group_code') ? 'has-error' : ''}}">
    {!! Form::label('Account Code', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
        <div class="col-sm-6">
      {!! Form::text('group_code',    null  , ['class' => 'form-control required', 'id' => 'group_code', 'placeholder' => 'Account Code', 'required' => 'true', ]) !!}
      </div>
    {!! $errors->first('group_code', '<span class="help-inline">:message</span>') !!}
</div>
 
<div class="form-group {{ $errors->has('group_name') ? 'has-error' : ''}}">
    {!! Form::label('Group Under', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-6">
    {!! Form::select('group', $groups, null, ['class' => 'form-control required', 'id' => 'group_name', 'placeholder' => '--Select--', ]) !!}
    </div>  
</div>
 
 
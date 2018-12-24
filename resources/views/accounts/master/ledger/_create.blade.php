<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Ledger Name:', '', array('class' => 'col-sm-3 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-5">
      {!! Form::text('name',    null  , ['class' => 'form-control required ', 'id' => 'name', 'placeholder' => 'Ledger Name', 'required' => 'true', ]) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('ledger_code') ? 'has-error' : ''}}">
    {!! Form::label('Ledger Code:', '', array('class' => 'col-sm-3 control-label')) !!}
    
    <b style='color:red;'>*</b>
        <div class="col-sm-5">
      {!! Form::text('ledger_code',    null  , ['class' => 'form-control required', 'id' => 'ledger_code', 'placeholder' => 'Ledger Code', 'required' => 'true', ]) !!}
      </div>
    {!! $errors->first('ledger_code', '<span class="help-inline">:message</span>') !!}
</div>
 
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    {!! Form::label('Accounting Head:', '', array('class' => 'col-sm-3 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-5">
    {!! Form::select('group_id', $accounts, null, ['class' => 'form-control required', 'id' => 'group_id', 'placeholder' => '--Select--', ]) !!}
    </div>  
    {!! $errors->first('group_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('cash_ledger') ? 'has-error' : ''}}">
     <label class ='col-sm-3  control-label'>Is a Cash or Bank Ledger?</label>
    <div class="col-sm-2"> 
    {!! Form::select('cash_ledger', array('0' => 'No', '1' => 'Yes'), null, ['class' => 'form-control required', 'id' => 'cash_ledger' ]) !!}
   </div>
</div>
 

<div class="form-group {{ $errors->has('register') ? 'has-error' : ''}}">
    <label class ='col-sm-3  control-label'>Is ledger link with Register?</label>
     <div class="col-sm-2">
    {!! Form::select('register', $register, null, ['class' => 'form-control required', 'id' => 'register', 'placeholder' => 'No', ]) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('Narration:', '', array('class' => 'col-sm-3 control-label')) !!} 
    <div class="col-sm-5">
        {!! Form::textarea('narration',    null  , ['class' => 'form-control', 'id' => 'narration', 'placeholder' => 'Narration', 'style' => 'height:90px;' ]) !!}
    </div>  
</div>
<script>     
        function validateForm(){
            var textbox1 = document.getElementById("name").value;
            var textbox2 = document.getElementById('ledger_code').value;
            var textbox3 = document.getElementById('group_id').value;;
            if(textbox1==''){ 
                $("#name").focus(); 
                alert('Ledger Name is empty!');
                return false;
            }
            if(textbox2==''){ 
                $("#ledger_code").focus(); 
                alert('Ledger Code is empty!');
                return false;
            }
            if(textbox3==''){ 
                $("#group_id").focus(); 
                alert('Select Accounting Head!');
                return false;
            } 
            if($('#btnsubmit').html()=="Submit")
            {
                $('#msgtext').html('Are you sure, you want to submit the record?'); 
                $('#btntext').html('Submit'); 
            }
            else
            {
                $('#msgtext').html('Are you sure, you want to update the record?'); 
                $('#btntext').html('Update'); 
            }
            $('#btnconfirm').attr('class','btn btn-primary'); 
            $('#myModalConfirm').modal('show'); 
        }
 
        </script>
 
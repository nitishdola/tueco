 <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Accounting Head:', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-6">
      {!! Form::text('name',    null  , ['class' => 'form-control required ', 'id' => 'name', 'placeholder' => 'Accounting Head', 'required' => 'true', ]) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('group_code') ? 'has-error' : ''}}">
    {!! Form::label('Head Code:', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
        <div class="col-sm-6">
      {!! Form::text('group_code',    null  , ['class' => 'form-control required', 'id' => 'group_code', 'placeholder' => 'Head Code', 'required' => 'true', ]) !!}
      </div>
    {!! $errors->first('group_code', '<span class="help-inline">:message</span>') !!}
</div>
 
<div class="form-group {{ $errors->has('head_id') ? 'has-error' : ''}}">
    {!! Form::label('Group Under:', '', array('class' => 'col-sm-2 control-label')) !!}
    <b style='color:red;'>*</b>
    <div class="col-sm-6">
    {!! Form::select('head_id', $groups, null, ['class' => 'form-control required', 'id' => 'head_id', 'placeholder' => '--Select--', ]) !!}
    </div>  
    {!! $errors->first('head_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('Narration:', '', array('class' => 'col-sm-2 control-label')) !!} 
    <div class="col-sm-6">
        {!! Form::textarea('narration',    null  , ['class' => 'form-control', 'id' => 'narration', 'placeholder' => 'Narration', 'style' => 'height:90px;' ]) !!}
    </div>  
</div>
<script>     
        function validateForm(){
            var textbox1 = document.getElementById("name").value;
            var textbox2 = document.getElementById('group_code').value;
            var textbox3 = document.getElementById('head_id').value;;
            if(textbox1==''){ 
                $("#name").focus(); 
                alert('Accounting Head is empty!');
                return false;
            }
            if(textbox2==''){ 
                $("#group_code").focus(); 
                alert('Head Code is empty!');
                return false;
            }
            if(textbox3==''){ 
                $("#head_id").focus(); 
                alert('Select Group Under!');
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
 
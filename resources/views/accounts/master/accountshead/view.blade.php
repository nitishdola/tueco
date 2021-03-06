@extends('layout.employee.default') 
 
@section('main_content') 
<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-default">  
            <div class="panel-body"> 
               <ul class="nav nav-tabs">
                <li class="active"><a  href="{{ route('employee.accounthead.index') }}">View</a></li>
                <li ><a href="{{ route('employee.accounthead.create') }}">Add</a></li>
               </ul> 
               <div class="panel-body"> 
                {!! Form::open(['method' => 'GET', 'route' => ['employee.accounthead.index']]) !!} 
                    <div class="row">
                        <div class="col-md-12  mg-1">
                            <div class="form-group input-group col-md-3">
                                <input type="text" placeholder="Search by Accounting Head"
                                    name="q" autocomplete="off" class="form-control " value="{{ $request->q }}"    >
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="submit" data-toggle="tooltip"   title="Search!"><i class="fa fa-search" style="color:#fff" ></i>
                                </button></span>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                    <?php $i = ($accounts->currentpage()-1)* $accounts->perpage(); ?> 
                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr role="row">
                    <th  style="width: 70px;"> Sl.No. </th>
                    <th  width="100px" >
                    Head Code</th>                        
                    <th>
                    Accounting Head</th>
                    <th>
                        Groups</th>
                     <th width="120px">Status</th>                               
                    <th  width="180px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accounts) > 0)
                    @foreach($accounts as $account) 
                    <?php   $i++;?>
                    <tr>
                    <td align="center">
                    <?php echo $i;?>
                    </td>
                    <td align="center">
                    {{$account->group_code}}
                    </td>
                    <td class="gradeA odd">
                    {{$account->name}}
                    </td> 
                    <td  class="gradeA odd">                       
                        {{$account->head_groups->name}}                     
                    </td>  
                    <td  align="center">
                            <div  class="btn-group float-left">
                                <button id="stgroup_{{$account->id}}" data-toggle="dropdown"  class="btn  {{  $account->active =="1" ? 'btn-success' : 'btn-danger' }}  btn-sm">{{  $account->active =="1" ? 'Active' : 'De-Active' }}</button>
                                <button  id="stbtn_{{$account->id}}"  data-toggle="dropdown" class="btn  {{  $account->active =="1" ? 'btn-success' : 'btn-danger' }} btn-sm dropdown-toggle" aria-expanded="true"><span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a onclick="return statusbtn({{$account->id}},1)"   style="cursor:pointer;">Active</a></li>
                                    <li><a  onclick="return statusbtn({{$account->id}},0)"  style="cursor:pointer;">De-Active</a></li> 
                                </ul>
                            </div>
                            </td>                 
                    <td align="center">   
                         {!! Form::open([ 'method' => 'POST', 'route' => ['employee.accounthead.destroy', $account->id],  'onsubmit' => 'return confirmDelete()' ]) !!}
                          <a href="{{route('employee.accounthead.edit', ['id'=>Crypt::encrypt($account->id)]) }}" data-toggle="tooltip" class="btn btn-primary btn-sm" title="Edit">Edit</a>
                         <button  data-toggle="tooltip" class=" btn btn-danger btn-sm"  title="Delete!">Delete</button>
                        {!! Form::close() !!}
                       
                    </td>
                    </tr>
                 
                    @endforeach
                    @endif
                    </tbody>
                    </table> 
                    {{ $accounts->links() }}
                <span id="userid" style="display:none;">{{ $user_id }}</span>
                </div>
            </div>
        </div> 
    </div>
</div>
          
<script>

function statusbtn(id, st){ 
    $('#stgroup_'+id).html("Process...");
    uid=$('#userid').html();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    debugger;
    $.ajax({ 
        data: {id : id, st : st, uid:uid}, 
        url  : "{{route('ajaxdata.statusupdate')}}",
        type : 'get',
        dataType: 'json',
        success: function(data) {
            if(st==1)
            {
                $('#stgroup_'+id).attr('class','btn btn-success btn-sm')
                $('#stbtn_'+id).attr('class','btn btn-success btn-sm dropdown-toggle')
                $('#stgroup_'+id).html("Active");
            }
            if(st==0)
            {
                $('#stgroup_'+id).attr('class','btn btn-danger btn-sm')
                $('#stbtn_'+id).attr('class','btn btn-danger btn-sm dropdown-toggle')
                $('#stgroup_'+id).html("De-Active");
            }
            console.log('Success:', data); 
        },   
        error: function (data) {
            console.log('Error:', data);
           }       
    })
}
function confirmDelete() {    
    if (confirm("Are you sure to Delete the Record!!")) {
        return true;
    }
    else {
        return false;
    } 
  }
function deleteconfirm(){
    $('#msgtext').html('Are you sure, you want to delete the record?'); 
    $('#btntext').html('Delete'); 
    $('#btnconfirm').attr('class','btn btn-danger');     
    $('#myModalConfirm').modal('show'); 
}
</script>

@stop
 
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
                                <input type="text" placeholder="Search by Head Name"
                                    name="q" autocomplete="off" class="form-control " value="{{ $request->q }}"    >
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="submit" data-toggle="tooltip"   title="Search!"><i class="fa fa-search" style="color:#fff" ></i>
                                </button></span>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                    <?php $i = 1;?>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="ascending" style="width: 70px;"> Sl.No. </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" width="100px" >
                    Code</th>   
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  >
                    Groups</th>   
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  >
                    Accounts Head</th>
                     <th width="120px">Status</th>                               
                    <th  width="180px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accounts) > 0)
                    @foreach($accounts as $accounts)
                    <tr>
                    <td align="center">
                    <?php echo $i;?>
                    </td>
                    <td align="center">
                    {{$accounts->group_code}}
                    </td>
                    <td class="gradeA odd">
                    {{$accounts->head_groups->name}}
                    </td> 
                    <td class="gradeA odd">
                    {{$accounts->name}}
                    </td>  
                    <td  align="center">
                            <div class="btn-group float-left">
                                <button class="btn btn-success btn-sm">Active</button>
                                <button data-toggle="dropdown" class="btn  btn-success btn-sm dropdown-toggle" aria-expanded="true"><span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Active</a></li>
                                    <li><a href="#">De-Active</a></li> 
                                </ul>
                            </div>
                            </td>                 
                    <td align="center">   
                        <a href="#" data-toggle="tooltip" class="btn btn-primary btn-sm" title="Edit">Edit</a>
                        <button  data-toggle="tooltip" class=" btn btn-danger btn-sm"  title="Delete!">Delete</button>
                    </td>
                    <?php   $i++;?>
                    </tr>

                    @endforeach
                    @endif
                    </tbody>
                    </table>
                
                 
                </div>
            </div>
        </div> 
    </div>
</div>

@stop
 
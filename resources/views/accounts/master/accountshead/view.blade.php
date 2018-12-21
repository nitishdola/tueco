@extends('layout.employee.default')
@section('page_title') 

<h1 class="page-header">Accounting Head</h1>
@stop
@section('breadcrumb') 
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Accounts</a></li>
    <li><a href="#">Master</a></li>
    <li class="active">Accounting Head</li>
</ol> 
@stop
@section('main_content') 
<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-default">  
            <div class="panel-body"> 
                <div class="table-responsive" >
                <?php $i = 1;?>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="ascending" style="width: 70px;"> Sl.No. </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  >
                    Groups</th>   
                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  >
                    Accounts Head</th>                                
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accounts) > 0)
                    @foreach($accounts as $accounts)
                    <tr>
                    <td>
                    <?php echo $i;?>
                    </td>
                    <td class="gradeA odd">
                    {{$accounts->head_groups->name}}
                    </td> 
                    <td class="gradeA odd">
                    {{$accounts->name}}
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
 
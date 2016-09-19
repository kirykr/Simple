@extends('layouts.admin')
@section('content')
    <div class="page-header clearfix">
       	<h1><i class="fa fa-shopping-cart fa-1x"></i> Shipping
    		@ability('admin,owner', 'create-post,edit-user')
       		<a href="#" class="btn btn-success pull-right"><i class="fa fa-plus fa-fw"></i>Add to Shipping</a>
    		@endability
   		</h1>
   		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>InvoDate</th>
					<th>CustomerName</th>
					<th>TAmount</th>
					<th>ShipAmount</th>
					<th>Location</th>
					{{-- <th>Photo ID</th> --}}
					<th>Select</th>
				</tr>
			</thead>
			<tbody>

        
                         
 				<tr>
                <td>1</td>
                <td></td>
                <td>kiry</td>
                <td>kiry@example.com</td>
                <td>admin</td>
                <td>Active</td>
               
                    <td>
                    {{-- <a href="http://localhost:8000/admin/users/1/edit" class=" btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>  --}}
                    <div class="radio">
                    	<label>
                    		<input type="radio" name="radioBox" id="inputCheck" value="" checked="checked" class="">
                    	</label>
                    </div>

                    
                    </td>
            </tr>

                         
                             <tr>
               
                <td>15</td>
                <td></td>
                <td>dara</td>
                <td>dara@example.com</td>
                <td>buyer</td>
                <td>Not Active</td>
               
                               <td>
                      <div class="radio">
                    	<label>
                    		<input type="radio" name="radioBox" id="inputCheck" value="" class="form-input">
                    	</label>
                    </div>
                                   </td>
            </tr>

                

        
			</tbody>
		</table>
	</div>
@stop
    
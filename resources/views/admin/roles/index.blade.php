@extends('layouts.admin')

@section('content')
{{-- @section('header') --}}
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Roles & Modules
            <a class="btn btn-success pull-right" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>
{{-- @endsection --}}

    <div class="row">
        <div class="col-md-12">

                <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>Module</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>@foreach($role->modules as $mo)
                                    <span class="label label-default">{{$mo->name}}</span>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    @if($role->name =='admin' or $role->name =='owner')

                                    @else
                                      <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}"><i class="fa fa-eye"></i> View</a>
                                      <a class="btn btn-xs btn-warning" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                      <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                      </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
        </div>
    </div>

    <script>
    $(document).ready(function() {
      $('#example').dataTable( {
          "aoColumnDefs": [
              { "bSortable": false, "aTargets": [ 3 ] }

          ] } );
    } );
    </script>

@endsection

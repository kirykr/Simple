@extends('layouts.admin')
@section('content')

<div class="page-header clearfix">
  <h1>
    <i class="fa fa-align-justify"></i> Modules
    <a class="btn btn-success pull-right" href="{{ route('admin.modules.create') }}"><i class="fa fa-plus"></i> Create</a>
  </h1>

</div>

<div class="row">
  <div class="col-md-12">
    @if($modules->count())
    <table id="moduletable" class="table table-condensed table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NAV</th>
          <th>DESCRIPTION</th>
          <th class="text-nowrap text-right">OPTIONS</th>
        </tr>
      </thead>

      <tbody>
        @foreach($modules as $module)
        <tr>
          <td>{{$module->id}}</td>
          <td>{{$module->name}}</td>
          <td>{{$module->nav}}</td>
          <td>{{$module->description}}</td>
          <td class="text-right">
            <a class="btn btn-xs btn-primary" href="{{ route('admin.modules.show', $module->id) }}"><i class="fa fa-eye"></i> View</a>
            <a class="btn btn-xs btn-warning" href="{{ route('admin.modules.edit', $module->id) }}"><i class="fa fa-edit"></i> Edit</a>
            <form action="{{ route('admin.modules.destroy', $module->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $modules->render() !!}
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#moduletable').dataTable( {
      "aoColumnDefs": [
      { "bSortable": false, "aTargets": [ 3 ] }

      ] } );
  } );
</script>
@endsection
@extends('layouts.admin')
@section('content')
    <div class="page-header clearfix">
       <h1><i class="fa fa-users fa-1x"></i> Users
       <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus fa-fw"></i> Create</a>
    </h1>
    </div>
	<div class="table-responsive">

		<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Email</th>
					<th>Roles</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>



        @foreach($users as $user)

            <tr>

                <td>{{$user->id}}</td>
                <td>


                  @if($user->avatar)
                          <img width="30" src="/uploads/avatars/{{$user->avatar}}" class="mg-responsive img-rounded" alt="">

                        @else
                          <img width="50" src="/uploads/avatars/default-no-image.png" class="img-responsive img-rounded">
                        @endif

                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @foreach($user->roles as $rol)
                    <span class="label label-default">{{$rol->name }}</span>
                  @endforeach
                </td>

                <td>

                  {{$user->is_active == 1 ? 'Active':'Not Active'}}</td>

               {{--  <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td> --}}
                <td>
                    <a href="{{route('admin.users.edit', $user->id)}}" class=" btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <input type="hidden" name="role_id" value="{{ $user->roles->first()->id }}"> --}}
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                   {{--  {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id]]) !!}
                    {!! Form::button('<i class="fa fa-trash-o "></i> Delete', ['type' => 'submit', 'class'=>'btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!} --}}
                </td>
            </tr>

        @endforeach



			</tbody>
		</table>
  
	</div>
@endsection

@section('footer')

@stop

@section('scripts')

 {{-- <script src="{{asset('js/libs.js')}}"></script> --}}

  <script>
  $(document).ready(function() {
    $('#example').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 1 ] },
            { "bSortable": false, "aTargets": [ 6 ] }
        ] } );
  } );
  </script>
@endsection

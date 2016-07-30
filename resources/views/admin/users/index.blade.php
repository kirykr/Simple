@extends('layouts.admin')
@section('content')
    <div class="page-header clearfix">
       <h1><i class="fa fa-users fa-1x"></i> Users 
    @ability('admin,owner', 'create-post,edit-user')
       <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus fa-fw"></i> Create</a>
    @endability
    </h1>
    </div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Email</th>
					<th>Roles</th>
					<th>Status</th>
					<th>Photo ID</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>

        @if($users->count())

        @foreach($users as $user)
                 {{ Debugbar::info($user)}}
                 {{-- {{dd($user)}} --}}
            <tr>
               
                <td>{{$user->id}}</td>
                <td><img width="50" src="{{$user->photo? $user->photo->path : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded" alt=""> </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles->first()? $user->roles->first()->name : 'No Role'}}</td>
                <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
                <td>{{$user->photo_id}}</td>
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
        {!! $users->render() !!}

        @else
            <h3 class="text-center alert alert-info">Empty!</h3>
        @endif

			</tbody>
		</table>
	</div>
@endsection
 
@section('footer')
	
@stop

@section('scripts')

 {{-- <script src="{{asset('js/libs.js')}}"></script> --}}

  <script>
   
  </script>
@endsection


@extends('layouts.admin')

@section('content')
	<h1><i class="fa fa-users fa-2x"></i> Users</h1>
	
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
					<th>Date Created</th>
					<th>Date Updated</th>
					<th>Edit User</th>
				</tr>
			</thead>
			<tbody>
			@if($users)
			{{-- {{dd($users)}} --}}
			@foreach ($users as $user) 
				<tr>
					
					<td>{{$user->id}}</td>
					<td><img width="50" src="{{$user->photo? $user->photo->path : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded" alt=""> </td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
					<td>{{$user->photo_id}}</td>
					<td>{{$user->created_at->diffForHumans()}}</td>
					<td>{{$user->updated_at->diffForHumans()}}</td>
					<td><a href="{{route('admin.users.edit', $user->id)}}"><i class="fa fa-edit"></i></a> </td>
				</tr>
			@endforeach
			@endif
			</tbody>
		</table>
	</div>
@endsection

@section('footer')

@stop;
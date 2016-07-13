@extends('layouts.admin')

@section('content')
	<h1><i class="fa fa-users fa-2x"></i> Users</h1>
	
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Roles</th>
					<th>Status</th>
					<th>Date Created</th>
					<th>Date Updated</th>
				</tr>
			</thead>
			<tbody>
			@if($users)
			{{-- {{dd($users)}} --}}
			@foreach ($users as $user) 
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
					<td>{{$user->created_at->diffForHumans()}}</td>
					<td>{{$user->updated_at->diffForHumans()}}</td>
				</tr>
			@endforeach
			@endif
			</tbody>
		</table>
	</div>
@endsection

@section('footer')

@stop;
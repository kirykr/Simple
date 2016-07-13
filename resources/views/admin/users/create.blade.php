@extends('layouts.admin')

@section('content')
	@include('errors.formError')

	 <div class="panel panel-info">
   	<div class="panel-heading">
   		<h1 class="panel-title"><i class="fa fa-cogs fa-2x"></i> Create Users</h1>
   	</div>
   	<div class="panel-body">
   		{{-- <form action="{{ url('/posts') }}" method="POST"> --}}
      <!-- {{ csrf_field() }} -->
         {!! Form::open(['action' => 'AdminUserController@store', 'method' => 'POST', 'files'=>true]) !!}
   					<legend>New User</legend>
   				
   					<div class="form-group">
                     {!! Form::label('name', 'User Name:') !!}
                     {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Input user name']) !!}
					</div>

					<div class="form-group">
                     {!! Form::label('email', 'Email:') !!}
                     {!! Form::email('email', null,['class'=>'form-control','placeholder'=>'Input user email']) !!}
					</div>

					<div class="form-group">
                     {!! Form::label('password', 'Password:') !!}
                     {!! Form::password('password',['class'=>'form-control','placeholder'=>'Input user password']) !!}
					</div>

					<div class="form-group">
                     {!! Form::label('role_id', 'Roles:') !!}
                     {!! Form::select('role_id',[''=>'Choose Options'] + $roles, null,['class'=>'form-control']) !!}
					</div>	

					<div class="form-group">
					 {!! Form::label('is_active', 'Status:') !!}
                     {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),0,['class'=>'form-control']) !!}
					</div>

               <div class="form-group">
                     {!! Form::label('photo_id', 'Image:') !!}
                     {!! Form::file('file', null, ['class'=>'']) !!}
               </div>
   				<div class="form-group">
                  	{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
					</div>

         {!! Form::close() !!}


   	</div>
   </div>
    
@endsection

@section('footer')

@stop;
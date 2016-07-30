@extends('layouts.admin')
@section('content')
	@include('errors.formError')
   
	 <div class="panel panel-info">
   	<div class="panel-heading">
   		<h1 class="panel-title"><i class="fa fa-cogs fa-2x"></i> Create Users</h1>
   	</div>
   	<div class="panel-body">
   		{{-- <form action="{{ url('/posts') }}" method="POST"> --}}
      
         {!! Form::open(['action' => 'AdminUserController@store', 'method' => 'POST', 'files'=>true]) !!}
   					<legend>New User</legend>
   				
   					<div class="form-group">
                     {!! Form::label('name', 'User Name:') !!}
                     {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Input user name']) !!}
					</div>

					{{-- <div class="form-group">
                     {!! Form::email('email', null,['class'=>'form-control','placeholder'=>'Input user email']) !!}
					</div> --}}
               {!! Form::label('email', 'Email:') !!}
               <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                  {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email Address']) !!}
                  {!! $errors->first('email','<span class="help-block">:message</span>') !!}
               </div>

					<div class="form-group">
                     {!! Form::label('password', 'Password:') !!}
                     {!! Form::password('password',['class'=>'form-control','placeholder'=>'Input user password']) !!}
					</div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                     {!! Form::label('role_id', 'Roles:') !!}
                     {!! Form::select('role_id',[''=>'Choose Options'] + $roles, null,['class'=>'form-control']) !!}
               </div>   
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                     {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null,['class'=>'form-control']) !!}
               </div>
                  </div>
               </div>
					

					

               <div class="form-group">
                     {!! Form::label('photo_id', 'Image:') !!}
                     {!! Form::file('photo_id', ['class'=>'']) !!}
               </div>
   				<div class="form-group">
                  	{!! Form::submit('Create User', ['class'=>'btn btn-primary', 'data-dismiss'=>'modal']) !!}
					</div>
               
         {!! Form::close() !!}

   	</div>
   </div>
@endsection

@section('footer')
    
@stop
@section('scripts')
 {{--  // <script src="{{asset('js/libs.js')}}"></script> --}}
  
  <script>
   
  </script>
@endsection

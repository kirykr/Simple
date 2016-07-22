@extends('layouts.admin')

@section('content')
	@include('errors.formError')

	 <div class="panel panel-info">
   	<div class="panel-heading">
   		<h1 class="panel-title"><i class="fa fa-cogs fa-2x"></i> Edit Users</h1>
   	</div>
   	<div class="panel-body">
   		{{-- <form action="{{ url('/posts') }}" method="POST"> --}}
       {{-- {{ csrf_field() }}  --}}
         <div class="col-md-2">
            <img src="{{$user->photo?$user->photo->path:'/images/default.jgp'}}" class="img-responsive img-circle" alt="Image">
         </div>
         <div class="col-md-10">
            {!! Form::model($user,['action' => ['AdminUserController@update', $user->id], 'method' => 'PATCH', 'files'=>true]) !!}
             {{-- {!! csrf_field() !!} --}}
                  <legend>{{ucfirst($user->name)}}</legend>
               
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
                     {!! Form::select('role_id', $roles, null,['class'=>'form-control']) !!}
               </div>   

               <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                     {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null,['class'=>'form-control']) !!}
               </div>

               <div class="form-group">
                     {!! Form::label('photo_id', 'Image:') !!}
                     {!! Form::file('photo_id', ['class'=>'']) !!}
               </div>
               <div class="form-group">
                     {!! Form::submit('Update User', ['class'=>'btn btn-info']) !!}
               </div>
               
         {!! Form::close() !!}

         </div>
   	</div>
   </div>
    
@endsection

@section('footer')

@stop;

@section('scripts')
  <script src="{{asset('js/libs.js')}}"></script>
  
  <script>
   
  </script>
@endsection
@extends('layouts.admin')

@section('content')
	
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
                     {!! Form::label('password', 'Content:') !!}
                     {!! Form::text('password', null,['class'=>'form-control','placeholder'=>'Input user password']) !!}
					 
                     {!! Form::label('email', 'Email:') !!}
                     {!! Form::text('email', null,['class'=>'form-control','placeholder'=>'Input user email']) !!}

                     {!! Form::label('image', 'Image:') !!}
                     {!! Form::file('file', ['class'=>'form-control ', 'style'=>'padding-top: -15px !important','placeholder'=>'Input user email']) !!}
                     
   					</div>
                  {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

         {!! Form::close() !!}


   	</div>
   </div>
    @if(count($errors)>0)
         
            <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <strong>Error!</strong>
               <hr> 
               @foreach ($errors->all() as $error)
                  {{$error}} <br>
               @endforeach
            </div>
         @endif
@endsection

@section('footer')

@stop;
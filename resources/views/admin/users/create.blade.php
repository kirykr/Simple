@extends('layouts.admin')
@section('content')
	@include('errors.formError')

	 <div class="panel panel-info">
   	<div class="panel-heading">
   		<h1 class="panel-title"><i class="fa fa-cogs fa-2x"></i> Create Users</h1>
   	</div>
   	<div class="panel-body">
   		{{-- <form action="{{ url('/posts') }}" method="POST"> --}}

         {!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'files'=>true]) !!}
   					<legend>New User</legend>

   					<div class="form-group">
							<div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                     {!! Form::label('name', 'User Name:') !!}
                     {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Input user name']) !!}
										 {!! $errors->first('name','<span class="help-block">:message</span>') !!}
							</div>
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
								<div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                     {!! Form::label('password', 'Password:') !!}
                     {!! Form::password('password',['class'=>'form-control','placeholder'=>'Input user password']) !!}
										 {!! $errors->first('password','<span class="help-block">:message</span>') !!}
		 				   </div>
					</div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
											 {{Form::label('role','Roles:')}}
			                     <select class="form-control select2-multi" name="roles[]" multiple="multiple">
			                         @foreach($roles as $ro)
			                           <option value='{{$ro->id}}'>{{$ro->name}}</option>
			                         @endforeach
			                     </select>
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
							<label class="btn btn-primary" for="my-file-selector">
 								    <input id="my-file-selector" type="file" style="display:none;" alt="" name="avatar" onchange="showMyImage(this)">
 								    Browse...
 								</label>
 								<span class='label label-info' id="upload-file-info"></span>

            </div>
						<div class="form-group">
	                  <img id="thumbnil" class="img-thumbnail" name="a" style="width:20%; margin-top:10px;"  src="/uploads/avatars/default-no-image.png" />
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
		$('.select2-multi').select2();
		function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("thumbnil");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
  </script>
@endsection

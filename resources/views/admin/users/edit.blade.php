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
					 @if($user->avatar)
									 <img width="150" src="/uploads/avatars/{{$user->avatar}}" class="mg-responsive img-rounded" alt="Image">
								 @else
									 <img width="150" src="/uploads/avatars/default-no-image.png" class="img-responsive img-circle" alt="Image">
								 @endif

         </div>
         <div class="col-md-10">

            {!! Form::model($user,['action' => ['UserController@update', $user->id], 'method' => 'PATCH', 'files'=>true]) !!}
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
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
										 {{Form::label('roles','Roles',['class'=>'form-spacing-top'])}}
 							 {{Form::select('roles[]',$roleA,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
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
 {{--  // <script src="{{asset('js/libs.js')}}"></script> --}}

  <script>
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($user->roles()->getRelatedIds())!!}).trigger('change');

		$(document).ready(function(){
			$('.image-file-button').each(function() {
			      $(this).off('click').on('click', function() {
			           $(this).siblings('.image-file').trigger('click');
			      });
			});
			$('.image-file').each(function() {
			      $(this).change(function () {
			           $(this).siblings('.image-file-chosen').val(this.files[0].name);
			      });
			});
		});

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

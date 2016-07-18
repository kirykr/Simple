  @extends('layouts.admin')
  @section('content')
  {{-- @section('header') --}}
  <div class="page-header">
    <h1><i class="fa fa-plus"></i> Admin / Posts / Create </h1>
  </div>
  {{-- @endsection --}}
 

  @include('error')
  <div class="row">
  <div class="col-md-12">

  {!! Form::open(['action'=>"PostController@store", 'method'=>"POST",'files'=>true]) !!}
   
  <div class="row">
  <div class="col-md-8 col-sm-8"> 
    {!! Form::label('title', 'Title') !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}
        {!! $errors->first('title','<span class="help-block">:message</span>') !!}
     </div>
  </div>
  <div class="col-md-4 col-sm-4">
   {!! Form::label('category_id', 'Categories') !!}
      <div class="form-group {{ $errors->has('category_id') ? 'has-error' :'' }}">
        {!! Form::select('category_id',[''=>'Choose Options'] + $categories,0,['class'=>'form-control']) !!}
        {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
      </div>
  </div>
  <div class="col-md-4 col-sm-4">
     {!! Form::label('photo_id', 'Photo') !!}
      <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }}">
        {!! Form::file('photo_id',null,['class'=>'','placeholder'=>'Photo']) !!}
        {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!}
      </div>
  </div>
  </div>
  
  

  {!! Form::label('body', 'Body') !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
        {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'']) !!}
        {!! $errors->first('body','<span class="help-block">:message</span>') !!}
     </div>
  
  <div class="well well-sm">
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary', 'data-dismiss'=>'modal']) !!}
      <a class="btn btn-link pull-right" href="{{ route('admin.posts.index') }}"><i class="fa fa-backward"></i> Back</a>
   
  </div>
  {!! Form::close() !!}
  </div>
  </div>
  @endsection

  @section('scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> --}}
  <script>
    $('.date-picker').datepicker({
    });
  </script>
  @endsection


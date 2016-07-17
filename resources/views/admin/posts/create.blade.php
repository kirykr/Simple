  @extends('layouts.admin')
  @section('content')
  {{-- @section('header') --}}
  <div class="page-header">
    <h1><i class="fa fa-plus"></i> Admin / Posts / Create </h1>
  </div>
  {{-- @endsection --}}
 

  @include('error')

  {!! Form::open(['action'=>"PostController@store", 'method'=>"POST",'files'=>true]) !!}
  <div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
  </div>
  <div class="row">
  <div class="col-md-4 col-sm-4">
   <div class="form-group">
    {!! Form::label('category_id', 'Categories') !!}
    {!! Form::select('category_id', [''=>'Choose Category'] + $categories,null, ['class'=>'form-control']) !!}
  </div>
  </div>
  <div class="col-md-4 col-sm-4">
    <div class="form-group">
      {!! Form::label('photo_id', 'Photo') !!}
      {!! Form::file('photo_id',null) !!}
    </div>
  </div>
  </div>
  

  <div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
  @endsection


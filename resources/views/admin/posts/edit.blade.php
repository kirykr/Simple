@extends('layouts.admin')
@section('content')
@section('header')
<div class="page-header">
  <h1><i class="fa fa-edit"></i> Posts / Edit #{{$post->id}}</h1>
</div>
@endsection


@include('error')

<div class="row">
  <div class="col-md-12">

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="form-group @if($errors->has('user_id')) has-error @endif">
          <label for="user_id-field">Owner</label>
           <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ is_null(old("user_id")) ? $post->user_id : old("user_id") }}"/>
           @if($errors->has("user_id"))
           <span class="help-block">{{ $errors->first("user_id") }}</span>
           @endif
         </div>
       </div>
       <div class="col-md-4 col-sm-4">
        <div class="form-group @if($errors->has('category_id')) has-error @endif">
         <label for="category_id-field">Categories</label>
         <input type="text" id="category_id-field" name="category_id" class="form-control" value="{{ is_null(old("category_id")) ? $post->category_id : old("category_id") }}"/>
         @if($errors->has("category_id"))
         <span class="help-block">{{ $errors->first("category_id") }}</span>
         @endif
       </div>
     </div>
     <div class="col-md-4 col-sm-4">
       <div class="form-group @if($errors->has('photo_id')) has-error @endif">
         <label for="photo_id-field">Photo</label>
         <input type="file" id="photo_id-field" name="photo_id" class="" value="{{ is_null(old("photo_id")) ? $post->photo_id : old("photo_id") }}"/>
         @if($errors->has("photo_id"))
         <span class="help-block">{{ $errors->first("photo_id") }}</span>
         @endif
       </div>
     </div>
   </div>



   <div class="form-group @if($errors->has('title')) has-error @endif">
     <label for="title-field">Title</label>
     <input type="text" id="title-field" name="title" class="form-control" value="{{ is_null(old("title")) ? $post->title : old("title") }}"/>
     @if($errors->has("title"))
     <span class="help-block">{{ $errors->first("title") }}</span>
     @endif
   </div>
   <div class="form-group @if($errors->has('body')) has-error @endif">
     <label for="body-field">Body</label>
     <textarea class="form-control" id="body-field" rows="3" name="body">{{ is_null(old("body")) ? $post->body : old("body") }}</textarea>
     @if($errors->has("body"))
     <span class="help-block">{{ $errors->first("body") }}</span>
     @endif
   </div>
   <div class="well well-sm">
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-link pull-right" href="{{ route('admin.posts.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</form>

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

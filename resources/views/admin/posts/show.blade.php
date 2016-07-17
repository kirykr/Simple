@extends('layouts.admin')
@section('header')
<div class="page-header">
    <h1>Posts / Show #{{$post->id}}</h1>
    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa fa-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <form action="#">
           {{--  <div class="form-group">
                <label for="nome">ID</label>
                <p class="form-control-static"></p>
            </div> --}}
            <div class="row">
                <div class="col-md-4 col-sm-4">
                   <div class="form-group">
                       <label for="user_id">USER</label>
                       <p class="form-control-static">{{$post->user_id}}</p>
                   </div>
               </div>
               <div class="col-md-4 col-sm-4">
                   <div class="form-group">
                       <label for="category_id">CATEGORIES</label>
                       <p class="form-control-static">{{$post->category_id}}</p>
                   </div>
               </div>
               <div class="col-md-4 col-sm-4">

                <div class="form-group">
                   <label for="photo_id">PHOTO</label>
                   <p class="form-control-static">{{$post->photo_id}}</p>
               </div>
           </div>
       </div>


       <div class="form-group">
           <label for="title">TITLE</label>
           <p class="form-control-static">{{$post->title}}</p>
       </div>
       <div class="form-group">
           <label for="body">BODY</label>
           <p class="form-control-static">{{$post->body}}</p>
       </div>
   </form>

   <a class="btn btn-link" href="{{ route('admin.posts.index') }}"><i class="fa fa-backward"></i>  Back</a>

</div>
</div>

@endsection
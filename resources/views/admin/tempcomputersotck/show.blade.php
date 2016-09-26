@extends('layouts.admin')
@section('content')
<div class="page-header">
    <h1>Add Serial Number</h1>
   
</div>

<div class="row">
  <div class="col-md-12">
    {!! Form::open(['action'=>"CimportController@store", 'method'=>"POST",'files'=>true]) !!}
      
    {!! Form::close() !!}    
  </div>
{{$tempcomputer->computer_id}}
{{$tempcomputer->color_id}}
</div>
<div class="row">
  <div class="col-md-12">
    <a class="btn btn-link" href="{{ route('admin.computers.create') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>

@endsection
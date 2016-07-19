@extends('layouts.admin')
@section('content')

{{-- @section('header') --}}
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Modells / Create </h1>
    </div>
{{-- @endsection --}}

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.modellsController.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"ModellController@store", 'method'=>"POST",'files'=>true]) !!}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
<div class="row">
               <div class="col-md-8">
                 {!! Form::label('name', 'Model Name') !!}
                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Model Name']) !!}
                  {!! $errors->first('name','<span class="help-block">:message</span>') !!}
               </div>
               </div>
               <div class="col-md-4">
                  {!! Form::label('brand_id', 'Brand Name') !!}
                <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
                  {!! Form::select('brand_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                  {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
                </div>
               </div>
             </div> 
              

              {!! Form::label('description', 'Model Description') !!}
              <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Model desc']) !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
             </div>
             

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.modells.index') }}"><i class="fa fa-backward"></i> Back</a>
                </div>
            {!! Form::close() !!}
            {{-- </form> --}}

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

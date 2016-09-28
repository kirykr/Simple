@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Colors / Create </h1>
    </div>

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.colorsController.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"ColorController@store", 'method'=>"POST",'files'=>true]) !!}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
  {{-- for Computer Name --}}
                 {!! Form::label('name', 'Computer Name') !!}
                 <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
                  {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                </div>

                  
              {!! Form::label('description', 'Color Description') !!}
              <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Brand desc']) !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
             </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.colors.index') }}"><i class="fa fa-backward"></i> Back</a>
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

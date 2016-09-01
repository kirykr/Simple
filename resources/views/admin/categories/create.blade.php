@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Categories / Create </h1>
    </div>

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('categories.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"CategoryController@store", 'method'=>"POST",'files'=>true]) !!}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name', []) !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                </div>
                    </div>
                    <div class="col-md-5">
                         {!! Form::label('type_id', 'Computer Type') !!}
                  <div class="form-group {{ $errors->has('type_id') ? 'has-error' :'' }}">
                    {!! Form::select('type_id',[''=>'Choose Options'] + $types,0,['class'=>'form-control']) !!}
                    {!! $errors->first('type_id','<span class="help-block">:message</span>') !!}
                    </div>
                    </div>
                </div>
                
                 {!! Form::label('description', 'Category Description') !!}
              <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Category desc']) !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
             </div>
               
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.categories.index') }}"><i class="fa fa-backward"></i> Back</a>
                </div>
            {!! Form::close() !!}
            {{-- </form> --}}

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

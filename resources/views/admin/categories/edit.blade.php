@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Categories / Edit #{{$category->id}}</h1>
    </div>

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">  --}}   
            {!! Form::model($category,['action'=>['CategoryController@update', $category->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
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
                    {!! Form::select('type_id', $types, null, ['class'=>'form-control']) !!}
                    {!! $errors->first('type_id','<span class="help-block">:message</span>') !!}
                    </div>
                    </div>
                </div>
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.categories.index') }}"><i class="fa fa-backward"></i>  Back</a>
                </div>
            </form>
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

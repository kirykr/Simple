@extends('layouts.admin')
@section('content')

    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Colors / Edit #{{$color->id}}</h1>
    </div>

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.colors.update', $color->id) }}" method="POST">  --}}   
            {!! Form::model($color,['action' => ['ColorController@update', $color->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $color->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('string')) has-error @endif">
                       <label for="string-field">String</label>
                    <input type="text" id="string-field" name="string" class="form-control" value="{{ is_null(old("string")) ? $color->string : old("string") }}"/>
                       @if($errors->has("string"))
                        <span class="help-block">{{ $errors->first("string") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.colors.index') }}"><i class="fa fa-backward"></i>  Back</a>
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

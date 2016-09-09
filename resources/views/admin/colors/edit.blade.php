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

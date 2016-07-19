@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Types / Edit #{{$type->id}}</h1>
    </div>
{{-- @endsection --}}


    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.types.update', $type->id) }}" method="POST">  --}}   
            {!! Form::model($type,['action' => ['TypeController@update', $type->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
                 <div class="row">
               <div class="col-md-8">
                 {!! Form::label('name', 'Type Name') !!}
                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type Name']) !!}
                  {!! $errors->first('name','<span class="help-block">:message</span>') !!}
               </div>
               </div>
               <div class="col-md-4">
                 {{--  {!! Form::label('category_id', 'Type Categories') !!}
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' :'' }}">
                  {!! Form::select('category_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                  {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                </div> --}}
               </div>
             </div> 
              

              {!! Form::label('description', 'Type Description') !!}
              <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Type desc']) !!}
                {!! $errors->first('description','<span class="help-block">:message</span>') !!}
             </div>
             
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.types.index') }}"><i class="fa fa-backward"></i>  Back</a>
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

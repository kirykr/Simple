@extends('layouts.admin')

@section('content')
@section('header')
    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Permissions / Edit #{{$permission->id}}</h1>
    </div>
@endsection

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">  --}}   
            {!! Form::model($permission,['action' => ['PermissionController@update', $permission->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $permission->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('display_name')) has-error @endif">
                       <label for="display_name-field">Display_name</label>
                    <input type="text" id="display_name-field" name="display_name" class="form-control" value="{{ is_null(old("display_name")) ? $permission->display_name : old("display_name") }}"/>
                       @if($errors->has("display_name"))
                        <span class="help-block">{{ $errors->first("display_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ is_null(old("description")) ? $permission->description : old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.permissions.index') }}"><i class="fa fa-backward"></i>  Back</a>
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

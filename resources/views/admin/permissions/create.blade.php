@extends('layouts.admin')

@section('content')
@section('header')
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Permissions / Create </h1>
    </div>
@endsection

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.permissionsController.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"PermissionController@store", 'method'=>"POST",'files'=>true]) !!}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('module')) has-error @endif">
                       <label for="module-field">Module</label>
                    <input type="text" id="module-field" name="module" class="form-control" value="{{ old("module") }}"/>
                       @if($errors->has("module"))
                        <span class="help-block">{{ $errors->first("module") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('discription')) has-error @endif">
                       <label for="discription-field">Discription</label>
                    <textarea class="form-control" id="discription-field" rows="3" name="discription">{{ old("discription") }}</textarea>
                       @if($errors->has("discription"))
                        <span class="help-block">{{ $errors->first("discription") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.permissions.index') }}"><i class="fa fa-backward"></i> Back</a>
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

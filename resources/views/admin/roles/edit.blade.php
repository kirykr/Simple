@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Roles / Edit #{{$role->id}}</h1>
    </div>
{{-- @endsection --}}


    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">  --}}   
            {!! Form::model($role,['action' => ['RoleController@update', $role->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
               {{--  <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $role->name : old("name") }}"/>
                   @if($errors->has("name"))
                    <span class="help-block">{{ $errors->first("name") }}</span>
                   @endif
                </div> --}}
                <div class="row">
                    <div class="col-md-3">{!! Form::label('name', 'Role Name') !!}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Role name']) !!}
                          {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                  <div class="form-group @if($errors->has('display_name')) has-error @endif">
                       <label for="display_name-field">Role display_name</label>
                    <input type="text" id="display_name-field" name="display_name" class="form-control" value="{{ old("display_name") }}"/>
                       @if($errors->has("display_name"))
                        <span class="help-block">{{ $errors->first("display_name") }}</span>
                       @endif
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Role Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                </div>
                </div>
                  <div class="row ">
                  <div class="col-md-2 wel">
                    <h5><strong>All</strong></h5>
                    <input type="checkbox" id="checkAll" value="">
                  </div>
                  {{-- loops for check box --}}
                  @foreach ($permissions as $permission)
                  <div class="col-md-2">
                    <h5><strong>{{ucfirst($permission->name)}}</strong></h5>
                    {{-- <input type="checkbox" name="permission[]" value="{{$permission->id}}"> --}}
                    {!! Form::checkbox('permission_id[]', $permission->id,  $role->hasPermission($permission->name), ['class'=>'form-control']) !!}
                  </div>
                @endforeach
                </div>
                <hr>
                <br><br>
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.roles.index') }}"><i class="fa fa-backward"></i>  Back</a>
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

    // check all uncheck all
    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
  </script>
@endsection

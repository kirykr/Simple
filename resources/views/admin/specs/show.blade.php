@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
<div class="page-header">
        <h1>Specs / Show #{{$spec->id}}</h1>
        <form action="{{ route('admin.specs.destroy', $spec->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.specs.edit', $spec->id) }}"><i class="fa fa-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
            </div>
        </form>
    </div>
{{-- @endsection --}}


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$spec->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.specs.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
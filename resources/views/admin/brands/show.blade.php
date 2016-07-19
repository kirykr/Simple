@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
<div class="page-header">
        <h1>Brands / Show #{{$brand->id}}</h1>
        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.brands.edit', $brand->id) }}"><i class="fa fa-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$brand->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$brand->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="category_id">CATEGORY_ID</label>
                     <p class="form-control-static">{{$brand->category_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.brands.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
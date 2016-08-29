@extends('layouts.admin')
@section('header')
<div class="page-header">
        <h1>Suppliers / Show #{{$supplier->id}}</h1>
        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.suppliers.edit', $supplier->id) }}"><i class="fa fa-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$supplier->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="contactperson">CONTACTPERSON</label>
                     <p class="form-control-static">{{$supplier->contactperson}}</p>
                </div>
                    <div class="form-group">
                     <label for="tel">TEL</label>
                     <p class="form-control-static">{{$supplier->tel}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$supplier->address}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.suppliers.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
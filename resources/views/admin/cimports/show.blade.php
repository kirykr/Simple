@extends('layouts.admin')
@section('content')
<div class="page-header">
        <h1>Cimports / Show #{{$cimport->id}}</h1>
        <form action="{{ route('admin.cimports.destroy', $cimport->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.cimports.edit', $cimport->id) }}"><i class="fa fa-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="impdate">IMPDATE</label>
                     <p class="form-control-static">{{$cimport->impdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="impindate">IMPINDATE</label>
                     <p class="form-control-static">{{$cimport->impindate}}</p>
                </div>
                    <div class="form-group">
                     <label for="invoicenum">INVOICENUM</label>
                     <p class="form-control-static">{{$cimport->invoicenum}}</p>
                </div>
                    <div class="form-group">
                     <label for="totalamount">TOTALAMOUNT</label>
                     <p class="form-control-static">{{$cimport->totalamount}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$cimport->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="supplier_id">SUPPLIER_ID</label>
                     <p class="form-control-static">{{$cimport->supplier_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
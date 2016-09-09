@extends('layouts.admin')
@section('content')
<div class="page-header">
        <h1>Oimports / Show #{{$oimport->id}}</h1>
        <form action="{{ route('admin.oimports.destroy', $oimport->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.oimports.edit', $oimport->id) }}"><i class="fa fa-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$oimport->impdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="impindate">IMPINDATE</label>
                     <p class="form-control-static">{{$oimport->impindate}}</p>
                </div>
                    <div class="form-group">
                     <label for="invoicenumber">INVOICENUMBER</label>
                     <p class="form-control-static">{{$oimport->invoicenumber}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$oimport->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="supplier_id">SUPPLIER_ID</label>
                     <p class="form-control-static">{{$oimport->supplier_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="totalamount">TOTALAMOUNT</label>
                     <p class="form-control-static">{{$oimport->totalamount}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.oimports.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
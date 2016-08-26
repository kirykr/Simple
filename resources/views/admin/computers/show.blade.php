@extends('layouts.admin')
@section('content')
<div class="page-header">
        <h1>Computers / Show #{{$computer->id}}</h1>
        <form action="{{ route('admin.computers.destroy', $computer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.computers.edit', $computer->id) }}"><i class="fa fa-edit"></i> Edit</a>
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
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$computer->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="qtyinstock">QTYINSTOCK</label>
                     <p class="form-control-static">{{$computer->qtyinstock}}</p>
                </div>
                    <div class="form-group">
                     <label for="sellprice">SELLPRICE</label>
                     <p class="form-control-static">{{$computer->sellprice}}</p>
                </div>
                    <div class="form-group">
                     <label for="photo_id">PHOTO_ID</label>
                     <p class="form-control-static">{{$computer->photo_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="type_id">TYPE_ID</label>
                     <p class="form-control-static">{{$computer->type_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="cat_id">CAT_ID</label>
                     <p class="form-control-static">{{$computer->cat_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="brand_id">BRAND_ID</label>
                     <p class="form-control-static">{{$computer->brand_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="model_id">MODEL_ID</label>
                     <p class="form-control-static">{{$computer->model_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.computers.index') }}"><i class="fa fa-backward"></i>  Back</a>

        </div>
    </div>

@endsection
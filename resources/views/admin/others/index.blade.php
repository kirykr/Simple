@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
<div class="page-header clearfix">
    <h1>
        <i class="fa fa-align-justify"></i> Others
        <a class="btn btn-success pull-right" href="{{ route('admin.others.create') }}"><i class="fa fa-plus"></i> Create</a>
    </h1>

</div>
{{-- @endsection --}}


<div class="row">
    <div class="col-md-12">
        @if($others->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PHOTO</th>
                    <th>NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th>TYPE_ID</th>
                    <th>CATEGORY_ID</th>
                    <th>BRAND_ID</th>
                    <th>MODEL_ID</th>
                    <th class="text-right text-nowrap">OPTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($others as $other)
                <tr>
                    <td>{{$other->id}}</td>
                    <td><img width="70" src=" {{ $other->photos->first() ? $other->photos->first()->path : '' }} " alt=""></td>
                    <td>{{$other->name}}</td>
                    <td>{{$other->qtyinstock}}</td>
                    <td>{{$other->sellprice}}</td>
                    <td>{{$other->type_id}}</td>
                    <td>{{$other->category_id}}</td>
                    <td>{{$other->brand_id}}</td>
                    <td>{{$other->model_id}}</td>
                    <td class="text-right">
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.others.show', $other->id) }}"><i class="fa fa-eye"></i> View</a>
                        <a class="btn btn-xs btn-warning" href="{{ route('admin.others.edit', $other->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.others.destroy', $other->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $others->render() !!}
        @else
        <h3 class="text-center alert alert-info">Empty!</h3>
        @endif

    </div>
</div>

@endsection
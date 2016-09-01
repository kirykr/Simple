@extends('layouts.admin')
@section('content')
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Computers
            <a class="btn btn-success pull-right" href="{{ route('admin.computers.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>

    <div class="row">
        <div class="col-md-12">
            @if($computers->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>PHOTO</th>
                        <th>NAME</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>TYPE</th>
                        <th>CAT</th>
                        <th>BRAND</th>
                        <th>MODEL</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($computers as $computer)
                            <tr>
                                <td>{{$computer->id}}</td>
                                {{-- {{ dd( $computer->photos->first()->path ) }} --}}
                                <td><img width="70" src=" {{ $computer->photos->first() ? $computer->photos->first()->path : '' }} " alt=""></td>
                                <td>{{$computer->name}}</td>
                                <td>{{$computer->qtyinstock}}</td>
                                <td>{{$computer->sellprice}}</td>
                                <td>{{$computer->type_id}}</td>
                                <td>{{$computer->category_id}}</td>
                                <td>{{$computer->brand_id}}</td>
                                <td>{{$computer->model_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.computers.show', $computer->id) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.computers.edit', $computer->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('admin.computers.destroy', $computer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $computers->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
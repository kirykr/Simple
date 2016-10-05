@extends('layouts.admin')
@section('content')

<div class="page-header clearfix">
    <h1>
        <i class="fa fa-align-justify"></i> Cimports
        <a class="btn btn-success pull-right" href="{{ route('admin.cimports.create') }}"><i class="fa fa-plus"></i> Create</a>
    </h1>

</div>

<div class="row">
    <div class="col-md-12">
        @if($cimports->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IMPDATE</th>
                    <th>IMPINDATE</th>
                    <th>INVOICENUM</th>
                    <th>TOTALAMOUNT</th>
                    <th>USER_ID</th>
                    <th>SUPPLIER_ID</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cimports as $cimport)
                <tr>
                    <td>{{$cimport->id}}</td>
                    <td>{{$cimport->impdate}}</td>
                    <td>{{$cimport->impindate}}</td>
                    <td>{{$cimport->invoicenum}}</td>
                    <td>{{$cimport->totalamount}}</td>
                    <td>{{$cimport->user_id}}</td>
                    <td>{{$cimport->supplier_id}}</td>
                    <td class="text-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cimports.show', $cimport->id) }}"><i class="fa fa-external-link fa-fw"></i> View Details</a>
                        <a class="btn btn-xs btn-warning" href="{{ route('admin.cimports.edit', $cimport->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.cimports.destroy', $cimport->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $cimports->render() !!}
        @else
        <h3 class="text-center alert alert-info">Empty!</h3>
        @endif

    </div>
</div>

@endsection
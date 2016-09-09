@extends('layouts.admin')
@section('content')
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Oimports
            <a class="btn btn-success pull-right" href="{{ route('admin.oimports.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>

    <div class="row">
        <div class="col-md-12">
            @if($oimports->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMPDATE</th>
                        <th>IMPINDATE</th>
                        <th>INVOICENUMBER</th>
                        <th>USER_ID</th>
                        <th>SUPPLIER_ID</th>
                        <th>TOTALAMOUNT</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($oimports as $oimport)
                            <tr>
                                <td>{{$oimport->id}}</td>
                                <td>{{$oimport->impdate}}</td>
                    <td>{{$oimport->impindate}}</td>
                    <td>{{$oimport->invoicenumber}}</td>
                    <td>{{$oimport->user_id}}</td>
                    <td>{{$oimport->supplier_id}}</td>
                    <td>{{$oimport->totalamount}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.oimports.show', $oimport->id) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.oimports.edit', $oimport->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('admin.oimports.destroy', $oimport->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $oimports->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
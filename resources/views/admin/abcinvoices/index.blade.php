@extends('layouts.admin')
@section('content')
<div class="page-header clearfix">
        <h1>
            <i class="fa fa-shopping-cart"></i> Invoices
            <a class="btn btn-success pull-right" href="{{ route('admin.invoices.create') }}"><i class="fa fa-plus"></i>New</a>
        </h1>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>InDate</th>
                <th>TAmount</th>
                <th>Discount</th>
                <th>SubTotal</th>
                <th>StaffName</th>
                <th class="text-right">OPTIONS</th>
                </tr>
            </thead>
            @foreach ($invoices as $invoice) 
                <tbody>
                    <tr>
                        <td>{{ $invoice->id}}</td>
                        <td>{{ $invoice->indate}}</td>
                        <td>{{ $invoice->tamount}}</td>
                        <td>{{ $invoice->discount*100 ."%"}}</td>
                        <td>{{ $invoice->subtotal}}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <td class="text-right">
                        <a class="btn btn-xs btn-primary" href="#"><i class="fa fa-eye"></i> View</a>
                        <form action="#" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        </div>
    </div>
@stop
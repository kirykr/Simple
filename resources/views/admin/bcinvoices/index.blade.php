@extends('layouts.admin')
@section('content')

    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-shopping-cart"></i> Invoices
            <a class="btn btn-success pull-right" href="{{ route('admin.bcinvoices.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($invoices->count())
                <table id="invoicetable" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>INDATE</th>
                            <th>TAMOUNT</th>
                            <th>DISCOUNT</th>
                            <th>SUBTOTAL</th>
                            <th>STAFF_NAME</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->indate }}</td>
                                <td><?php echo '$' ?>{{ $invoice->tamount }}</td>
                                <td>{{ $invoice->discount*100 ."%" }}</td>
                                <td><?php echo '$' ?>{{ $invoice->subtotal }}</td>
                                <td>{{ $invoice->user->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bcinvoices.show',$invoice->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    {{-- <a class="btn btn-xs btn-warning" href="{{ route('admin.invoices.edit', $bcinvoice->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> --}}
                                    <form action="{{ route('admin.bcinvoices.destroy',$invoice->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $invoices->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#invoicetable').dataTable( {
            "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 3 ] }

            ] } );
        } );
    </script>
@stop
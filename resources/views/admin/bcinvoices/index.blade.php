@extends('layouts.admin')
@section('content')

    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-shopping-cart"></i> Invoices
            <a class="btn btn-success pull-right" href="{{ route('admin.invoices.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($bcinvoices->count())
                <table class="table table-condensed table-striped">
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
                        @foreach($bcinvoices as $bcinvoice)
                            <tr>
                                <td>{{ $bcinvoice->id }}</td>
                                <td>{{ $bcinvoice->indate }}</td>
                                <td><?php echo '$' ?>{{ $bcinvoice->tamount }}</td>
                                <td>{{ $bcinvoice->discount*100 ."%" }}</td>
                                <td><?php echo '$' ?>{{ $bcinvoice->subtotal }}</td>
                                <td>{{ $bcinvoice->user->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $bcinvoice->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    {{-- <a class="btn btn-xs btn-warning" href="{{ route('admin.invoices.edit', $bcinvoice->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> --}}
                                    <form action="{{ route('admin.invoices.destroy', $bcinvoice->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $bcinvoices->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
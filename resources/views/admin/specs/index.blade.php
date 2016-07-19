@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Specs
            <a class="btn btn-success pull-right" href="{{ route('admin.specs.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>
{{-- @endsection --}}


    <div class="row">
        <div class="col-md-12">
            @if($specs->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($specs as $spec)
                            <tr>
                                <td>{{$spec->id}}</td>
                                <td>{{$spec->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.specs.show', $spec->id) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.specs.edit', $spec->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('admin.specs.destroy', $spec->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $specs->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
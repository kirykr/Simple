@extends('layouts.admin')

@section('content')
{{-- @section('header') --}}
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Roles
            <a class="btn btn-success pull-right" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>
{{-- @endsection --}}

    <div class="row">
        <div class="col-md-12">
            @if($roles->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $roles->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
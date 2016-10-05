@extends('layouts.admin')

@section('content')
{{-- @section('header') --}}
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Roles & Module
            <a class="btn btn-success pull-right" href="{{ route('admin.rol.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>
{{-- @endsection --}}

    <div class="row">
        <div class="col-md-12">

                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                          @foreach ($modules as $mod)
                            <tr>
                                <td>{{$mod->id}}</td>
                                <td>{{$mod->name}}</td>

                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" ><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" ><i class="fa fa-edit"></i> Edit</a>
                                    <form action="" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                    </tbody>
                </table>

        </div>
    </div>

@endsection

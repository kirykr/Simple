@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
<div class="page-header">
  <h1><i class="fa fa-plus"></i> Specs / Create </h1>
</div>
{{-- @endsection --}}


@include('error')

<div class="row">
  <div class="col-md-12">

    {{-- <form action="{{ route('admin.specsController.store') }}" method="POST"> --}}    
    {!! Form::open(['action'=>"SpecController@store", 'method'=>"POST",'files'=>true]) !!}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
    <div class="row">
      <div class="col-md-4">
        {!! Form::label('name', 'Spec Name') !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Other product Name']) !!}
          {!! $errors->first('name','<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-md-8">
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
    <div class="well well-sm">
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-link pull-right" href="{{ route('admin.computers.create') }}"><i class="fa fa-backward"></i> Back</a>
    </div>
    {!! Form::close() !!}
    {{-- </form> --}}

  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $('.date-picker').datepicker({
  });
</script>
@endsection

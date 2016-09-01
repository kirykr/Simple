@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <h1><i class="fa fa-edit"></i> Cimports / Edit #{{$cimport->id}}</h1>
    </div>

    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.cimports.update', $cimport->id) }}" method="POST">  --}}   
            {!! Form::model($cimport,['action' => ['CimportController@update', $cimport->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            --}}
                <div class="form-group @if($errors->has('impdate')) has-error @endif">
                       <label for="impdate-field">Impdate</label>
                    <input type="text" id="impdate-field" name="impdate" class="form-control" value="{{ is_null(old("impdate")) ? $cimport->impdate : old("impdate") }}"/>
                       @if($errors->has("impdate"))
                        <span class="help-block">{{ $errors->first("impdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('impindate')) has-error @endif">
                       <label for="impindate-field">Impindate</label>
                    <input type="text" id="impindate-field" name="impindate" class="form-control" value="{{ is_null(old("impindate")) ? $cimport->impindate : old("impindate") }}"/>
                       @if($errors->has("impindate"))
                        <span class="help-block">{{ $errors->first("impindate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('invoicenum')) has-error @endif">
                       <label for="invoicenum-field">Invoicenum</label>
                    <input type="text" id="invoicenum-field" name="invoicenum" class="form-control" value="{{ is_null(old("invoicenum")) ? $cimport->invoicenum : old("invoicenum") }}"/>
                       @if($errors->has("invoicenum"))
                        <span class="help-block">{{ $errors->first("invoicenum") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('totalamount')) has-error @endif">
                       <label for="totalamount-field">Totalamount</label>
                    <input type="text" id="totalamount-field" name="totalamount" class="form-control" value="{{ is_null(old("totalamount")) ? $cimport->totalamount : old("totalamount") }}"/>
                       @if($errors->has("totalamount"))
                        <span class="help-block">{{ $errors->first("totalamount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('user_id')) has-error @endif">
                       <label for="user_id-field">User_id</label>
                    <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ is_null(old("user_id")) ? $cimport->user_id : old("user_id") }}"/>
                       @if($errors->has("user_id"))
                        <span class="help-block">{{ $errors->first("user_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('supplier_id')) has-error @endif">
                       <label for="supplier_id-field">Supplier_id</label>
                    <input type="text" id="supplier_id-field" name="supplier_id" class="form-control" value="{{ is_null(old("supplier_id")) ? $cimport->supplier_id : old("supplier_id") }}"/>
                       @if($errors->has("supplier_id"))
                        <span class="help-block">{{ $errors->first("supplier_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-link pull-right" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i>  Back</a>
                </div>
            </form>
            {!! Form::close() !!}

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

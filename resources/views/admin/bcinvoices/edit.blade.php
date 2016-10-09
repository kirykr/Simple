@extends('layouts.admin')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Bcinvoices / Edit #{{$bcinvoice->bcinvoice_id}}</h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('bcinvoices.update', $bcinvoice->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('indate')) has-error @endif">
                       <label for="indate-field">Indate</label>
                    <input type="text" id="indate-field" name="indate" class="form-control" value="{{ is_null(old("indate")) ? $bcinvoice->indate : old("indate") }}"/>
                       @if($errors->has("indate"))
                        <span class="help-block">{{ $errors->first("indate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('tamount')) has-error @endif">
                       <label for="tamount-field">Tamount</label>
                    <input type="text" id="tamount-field" name="tamount" class="form-control" value="{{ is_null(old("tamount")) ? $bcinvoice->tamount : old("tamount") }}"/>
                       @if($errors->has("tamount"))
                        <span class="help-block">{{ $errors->first("tamount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('discount')) has-error @endif">
                       <label for="discount-field">Discount</label>
                    <input type="text" id="discount-field" name="discount" class="form-control" value="{{ is_null(old("discount")) ? $bcinvoice->discount : old("discount") }}"/>
                       @if($errors->has("discount"))
                        <span class="help-block">{{ $errors->first("discount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('subtotal')) has-error @endif">
                       <label for="subtotal-field">Subtotal</label>
                    <input type="text" id="subtotal-field" name="subtotal" class="form-control" value="{{ is_null(old("subtotal")) ? $bcinvoice->subtotal : old("subtotal") }}"/>
                       @if($errors->has("subtotal"))
                        <span class="help-block">{{ $errors->first("subtotal") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('user_id')) has-error @endif">
                       <label for="user_id-field">User_id</label>
                    <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ is_null(old("user_id")) ? $bcinvoice->user_id : old("user_id") }}"/>
                       @if($errors->has("user_id"))
                        <span class="help-block">{{ $errors->first("user_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('bcinvoices.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

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

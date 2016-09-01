@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Others / Create </h1>
    </div>
{{-- @endsection --}}


    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('othersController.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"OtherController@store", 'method'=>"POST",'files'=>true]) !!}
             {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
     {{-- error for Other product Code --}}
     {{-- {!! Form::label('comcode', 'Other product Code') !!}
     <div class="form-group {{ $errors->has('comcode') ? 'has-error' :'' }}">
        {!! Form::text('comcode',null,['class'=>'form-control','placeholder'=>'Other product Code']) !!}
        {!! $errors->first('comcode','<span class="help-block">:message</span>') !!}
     </div> --}}
     <div class="row">
      <div class="col-md-6">
       {{-- for Other product Name --}}
       {!! Form::label('name', 'Other product Name') !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Other product Name']) !!}
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
     </div>
     </div>
     <div class="col-md-3">
      {{-- {!! Form::label('qtyinstock', 'Quantiy Instock') !!} --}}
      <div class="form-group {{ $errors->has('qtyinstock') ? 'has-error' :'' }}">
        {{-- {!! Form::number('qtyinstock',null,['class'=>'form-control','placeholder'=>'Other product qtyinstock']) !!} --}}
        {!! $errors->first('qtyinstock','<span class="help-block">:message</span>') !!}
     </div>
     </div>
     <div class="col-md-3">
      {{-- {!! Form::label('sellprice', 'Sell Price') !!} --}}
      <div class="form-group {{ $errors->has('sellprice') ? 'has-error' :'' }}">
        {{-- {!! Form::number('sellprice',null,['class'=>'form-control','step'=>'any','placeholder'=>'Other product sellprice']) !!} --}}
        {!! $errors->first('sellprice','<span class="help-block">:message</span>') !!}
      </div>
   </div>
  </div>
  {!! Form::label('photo_id', 'Other product Picture') !!}
      <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }}">
        {{-- {!! Form::file('photo_id',null,['class'=>'','placeholder'=>'Other product photo_id']) !!} --}}
        {!! Form::file('photo_id[]', ['multiple'=>'true', 'class'=>'file-loading', 'id'=>'input-pd']) !!}
        {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!}
      </div>
  <div class="row">
    <div class="col-md-3">
    {!! Form::label('type_id', 'Other product Type') !!}
      <div class="form-group {{ $errors->has('type_id') ? 'has-error' :'' }}">
        {!! Form::select('type_id',[''=>'Choose Options'] + $types,0,['class'=>'form-control', 'id'=>'computer_type']) !!}
        {!! $errors->first('type_id','<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="col-md-3">
      {!! Form::label('category_id', 'Other product Categories') !!}
      <div class="form-group {{ $errors->has('category_id') ? 'has-error' :'' }}">
        {!! Form::select('category_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
        {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="col-md-3">
      {!! Form::label('brand_id', 'Other product Brand') !!}
      <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
        {!! Form::select('brand_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
        {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="col-md-3">
      {!! Form::label('model_id', 'Other product Model') !!}
      <div class="form-group {{ $errors->has('model_id') ? 'has-error' :'' }}">
        {!! Form::select('model_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
        {!! $errors->first('model_id','<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.others.index') }}"><i class="fa fa-backward"></i> Back</a>
                </div>
            {!! Form::close() !!}
            {{-- </form> --}}

        </div>
    </div>
@endsection
@section('scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> --}}
  <script>
    // $('.date-picker').datepicker({
    // });
  </script>
@endsection

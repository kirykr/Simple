@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1><i class="fa fa-plus"></i> Cimports / Create </h1>
</div>

@include('error')

<div class="row">
  <div class="col-md-12">

    {{-- <form action="{{ route('admin.cimportsController.store') }}" method="POST"> --}}    
    {!! Form::open(['action'=>"CimportController@store", 'method'=>"POST",'files'=>true]) !!}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
    <div class="row">
      <div class="col-md-3">
        <div class="form-group @if($errors->has('impdate')) has-error @endif">
         <label for="impdate-field">Import Date</label>
         {{-- <input type="text" id="impdate-field" name="impdate" class="form-control date-picker" value="{{ old("impdate") }}"/> --}}
         {!! Form::date('impdate', \Carbon\Carbon::now(), ['class'=>'form-control', 'value'=> "{{ old('impdate') }}" ]) !!}

         @if($errors->has("impdate"))
         <span class="help-block">{{ $errors->first("impdate") }}</span>
         @endif
       </div>
     </div>
     <div class="col-md-3">
      <div class="form-group @if($errors->has('impindate')) has-error @endif">
       <label for="impindate-field">ImportIn Date</label>
       {{-- <input type="text" id="impindate-field" name="impindate" class="form-control date-picker" value="{{ old("impindate") }}"/> --}}
       {!! Form::date('impindate', \Carbon\Carbon::now(), ['class'=>'form-control', 'value'=> "{{ old('impindate') }}" ]) !!}
       @if($errors->has("impindate"))
       <span class="help-block">{{ $errors->first("impindate") }}</span>
       @endif
     </div>     
   </div>
   <div class="col-md-3">
     <div class="form-group @if($errors->has('invoicenum')) has-error @endif">
       <label for="invoicenum-field">Invoice Number</label>
       <input type="text" id="invoicenum-field" name="invoicenum" class="form-control" value="{{ old("invoicenum") }}"/>
       @if($errors->has("invoicenum"))
       <span class="help-block">{{ $errors->first("invoicenum") }}</span>
       @endif
     </div>
   </div>
   <div class="col-md-3">
     <div class="form-group @if($errors->has('totalamount')) has-error @endif">
       <label for="totalamount-field">Total Amount</label>
       <input type="text" id="totalamount-field" name="totalamount" readonly="readonly" class="form-control" value="{{ old("totalamount") }}"/>
       @if($errors->has("totalamount"))
       <span class="help-block">{{ $errors->first("totalamount") }}</span>
       @endif
     </div>
   </div>
 </div>
 <div class="row">
   <div class="col-md-3">
     <div class="form-group @if($errors->has('user_id')) has-error @endif">
       <label for="user_id-field">User</label>
       <input type="text" id="user_id-field" name="user_id" readonly="readonly" class="form-control" value="{{ Auth::user()->name }}"/> 
       {{-- //old("user_id") --}}
       @if($errors->has("user_id"))
       <span class="help-block">{{ $errors->first("user_id") }}</span>
       @endif
     </div>
   </div>
   <div class="col-md-3">
     {!! Form::label('supplier_id', 'Company Name') !!}
     <div class="form-group input-group {{ $errors->has('supplier_id') ? 'has-error' :'' }}">
      {!! Form::select('supplier_id',[''=>'Choose Company'] + $suppliers,0,['class'=>'form-control']) !!}
      {!! $errors->first('supplier_id','<span class="help-block">:message</span>') !!}
       <span class="input-group-btn">
          <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
        </span>
    </div>
  </div>
</div>
<div class="row  well">
  <div class="col-md-4">
     <div class="col-md-12">
       {!! Form::label('computer_id', 'Computer Name') !!}
       <div class="form-group input-group {{ $errors->has('computer_id') ? 'has-error' :'' }}">
        {!! Form::select('computer_id',[''=>'Choose Computer'] + $computers,0,['class'=>'form-control']) !!}
        {!! $errors->first('computer_id','<span class="help-block">:message</span>') !!}
           <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
            </span>
      </div>
    </div>
     <div class="col-md-12">
     {!! Form::label('color_id', 'Color') !!}
     <div class="form-group input-group {{ $errors->has('color_id') ? 'has-error' :'' }}">
      {!! Form::select('color_id',[''=>'Choose Color'] + $suppliers,0,['class'=>'form-control']) !!}
      {!! $errors->first('color_id','<span class="help-block">:message</span>') !!}
        <span class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
      </span>
    </div>
  </div>
  </div>
  <div class="col-md-4">
     <div class="col-md-12">
       {!! Form::label('qtyinstock', 'Computer Qty') !!}
       <div class="form-group {{ $errors->has('qtyinstock') ? 'has-error' :'' }}">
        {!! Form::number('qtyinstock',1,['class'=>'form-control','step'=>'any','placeholder'=>'Computer qtyinstock']) !!}
        {!! $errors->first('qtyinstock','<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
</div> 
<hr>
<div class="well well-sm">
  <button type="submit" value="newsubmit" name="newsubmit" class="btn btn-success"><i class="fa fa-asterisk"></i> New Import</button>
  <button type="submit" value="addsubmit" name="addsubmit" class="btn btn-primary"><i class="fa fa-download"></i> Add Computer</button>
  <a class="btn btn-link pull-right" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i> Back</a>
</div>
{!! Form::close() !!}
{{-- </form> --}}

</div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Computer Name</th>
          <th>Color</th>
          <th>Qty</th>
          <th>Cost</th>
          <th>sell Price</th>
          <th>Amount</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $('.date-picker').datepicker({
  });
</script>
<script type="text/javascript">
  $(document).ready(function() { 
    $("#computer_id").select2({
      placeholder: "Select a Computer",
       maximumSelectionSize: 2
    }); 
    $("#color_id").select2({
      placeholder: "Select a Color",
       maximumSelectionSize: 2
    }); 
    $("#supplier_id").select2({
      placeholder: "Select a Color",
       maximumSelectionSize: 2
    }); 
});
</script>

@endsection

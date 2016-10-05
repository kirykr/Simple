@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1><i class="fa fa-plus"></i> Oimports / Create </h1>
</div>

@include('error')

<div class="row">
  <div class="col-md-12">

    {{-- <form action="{{ route('admin.oimportsController.store') }}" method="POST"> --}}    
    {!! Form::open(['action'=>"OimportController@store", 'method'=>"POST",'files'=>true]) !!}
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
      <div class="form-group @if($errors->has('invoicenumber')) has-error @endif">
       <label for="invoicenumber-field">Invoicenumber</label>
       <input type="text" id="invoicenumber-field" name="invoicenumber" class="form-control" value="{{ old("invoicenumber") }}"/>
       @if($errors->has("invoicenumber"))
       <span class="help-block">{{ $errors->first("invoicenumber") }}</span>
       @endif
     </div>
   </div>
   <div class="col-md-3">
    <div class="form-group @if($errors->has('totalamount')) has-error @endif">
     <label for="totalamount-field">Totalamount</label>
     <input type="text" id="totalamount-field" name="totalamount" class="form-control" value="{{ old("totalamount") }}"/>
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
       <input type="text" id="user_id-field" readonly="readonly" class="form-control" value="{{ Auth::user()->name }}"/> 
       {{-- //old("user_id") --}}
        {!! Form::hidden('user_id', Auth::user()->id, []) !!}
       @if($errors->has("user_id"))
       <span class="help-block">{{ $errors->first("user_id") }}</span>
       @endif
     </div>
   </div>
   <div class="col-md-3">
     {!! Form::label('supplier_id', 'Company Name') !!}
     <div class="form-group {{ $errors->has('supplier_id') ? 'has-error' :'' }}">
        <div class="input-group col-md-12">
          {!! Form::select('supplier_id',[''=>'Choose Company'] + $suppliers,0,['class'=>'form-control']) !!}
           <span class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
           </span>          
        </div>
      {!! $errors->first('supplier_id','<span class="help-block">:message</span>') !!}
    </div>
  </div>
</div>
<div class="row  well">
  <div class="col-md-4">
     <div class="col-md-12">
       {!! Form::label('other_id', 'Other Name') !!}
       <div class="form-group  {{ $errors->has('other_id') ? 'has-error' :'' }}">
         <div class="input-group col-md-12 ">
           {!! Form::select('other_id',[''=>'Choose other'] + $others,0,['class'=>'form-control']) !!}
              <span class="input-group-btn">
                 <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
               </span>
         </div>
       {!! $errors->first('other_id','<span class="help-block">:message</span>') !!}
      </div>
    </div>
     <div class="col-md-12">
     {!! Form::label('color_id', 'Color') !!}
     <div class="form-group {{ $errors->has('color_id') ? 'has-error' :'' }}">
     <div class=" input-group col-md-12">
      {!! Form::select('color_id',[''=>'Choose Color'] + $colors,0,['class'=>'form-control']) !!}
        <span class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="fa fa-plus"></i></button>
      </span>       
     </div>
      {!! $errors->first('color_id','<span class="help-block">:message</span>') !!}
    </div>
  </div>
  </div>
  <div class="col-md-4">
     <div class="col-md-7">
       {!! Form::label('qtyinstock', 'Other Qty') !!}
       <div class="form-group {{ $errors->has('qtyinstock') ? 'has-error' :'' }}">
        {!! Form::number('qtyinstock',null,['class'=>'form-control','step'=>'any','placeholder'=>'Other qtyinstock']) !!}
        {!! $errors->first('qtyinstock','<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
  <div class="col-md-4">
     <div class="col-md-7">
       {!! Form::label('sellprice', 'Other Price') !!}
       <div class="form-group input-group {{ $errors->has('sellprice') ? 'has-error' :'' }}">
       <div class="input-group col-md-12">
              {!! Form::number('sellprice',null,['class'=>'form-control','step'=>'any','placeholder'=>'Computer sellprice', 'readonly'=>"readonly", 'autofocus' => false]) !!}
              <span class="input-group-btn">
              <button class="btn btn-success editsellprice" type="button"><i class="fa fa-edit"></i></button>
              </span>
              </div>
        {!! $errors->first('sellprice','<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
   <div class="col-md-4">
     <div class="col-md-7">
       {!! Form::label('cost', 'Other Cost') !!}
       <div class="form-group {{ $errors->has('cost') ? 'has-error' :'' }}">
        {!! Form::number('cost',null,['class'=>'form-control','step'=>'any','placeholder'=>'Other Cost']) !!}
        {!! $errors->first('cost','<span class="help-block">:message</span>') !!}
      </div>
    </div>
  </div>
</div> 
<div class="well well-sm">
 <button type="submit" value="newsubmit" name="newsubmit" class="btn btn-success"><i class="fa fa-asterisk"></i> New Import</button>
  <button type="submit" value="addsubmit" name="addsubmit" class="btn btn-warning"><i class="fa fa-download"></i> Add Other</button>
  <a class="btn btn-link pull-right" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i> Back</a>
  <button type="submit" value="savesubmit" name="savesubmit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Save Import</button>
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
          <th>Other Name</th>
          <th>Color</th>
          <th>Qty</th>
          <th>Cost</th>
          <th>sell Price</th>
          <th>Amount</th>
          <th class="text-right">Option</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      @foreach ($tempothers as $tempother)
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $tempother->other_name }}</td>
          <td>{{ $tempother->color_name }}</td>
          <td class="qty">{{ $tempother->qty }}</td>
          <td>{{ $tempother->cost }}</td>
          <td>{{ $tempother->sellprice }}</td>
          <td>{{ $tempother->qty * $tempother->cost }}</td>
          <td class="text-right">
             {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.tempother.show', $category->id) }}"><i class="fa fa-eye"></i> View</a> --}}
            <a class="btn btn-xs btn-warning" href="{{ route('admin.tempother.edit', $tempother->id) }}"><i class="fa fa-edit"></i> Edit</a>
            <form action="{{ route('admin.tempother.destroy', $tempother->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </form>
              {{-- <a class="btn btn-xs btn-info getQty" data-toggle="modal" href='#modal-id'><i class="fa fa-arrow-circle-o-down"></i> Add Serial</a> --}}
          </td>
        </tr>
        <?php $i++; ?>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

  $('.date-picker').datepicker({
  });

  $('.editsellprice').on('click', function(e) {

    $('#sellprice').removeAttr('readonly');
    $('#sellprice').focus();  

  });

  // Select2 Auto complete and search 
  $("#other_id").select2({
    placeholder: "Select a Other",
     maximumSelectionSize: 2
  }).on('change', function(e){
    var value = e.target.value;
    getOther(value);
  }); 
  
  function getOther(id){
   $.ajax({
           method: 'GET',
           url: '/admin/api/v1/others/' + id,
           success: function(response) {
             console.log(response);
             $('#sellprice').val(response.sellprice);
             $('.editsellprice').attr('data-json', JSON.stringify(response));
             $('.editsellprice').removeAttr('disabled')
           },
           error: function(error) {
             console.log(error);
           }
         });
  }
   $('.editsellprice').on('click', function(e) {
      
    });
  $("#color_id").select2({
    placeholder: "Select a Color",
     maximumSelectionSize: 2
  });
  $("#supplier_id").select2({
    placeholder: "Select a Supplier",
     maximumSelectionSize: 2
  }); 
</script>
@endsection

@extends('layouts.admin')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('content')
<div class="page-header">
  <h1><i class="glyphicon glyphicon-plus"></i> Invoices / Create </h1>
</div>
@include('error')

<div class="row">
  <div class="col-md-12">
            {{-- <form action="{{ route('admin.invoices.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            {!! Form::open(['action'=>'BcinvoiceController@store','method'=>'POST','files'=>true]) !!}
            <div class="row">
              <div class="col-md-2">
                <div class="row ">
                  <div class="col-md-12">
                    <div class="form-group @if($errors->has('indate')) has-error @endif">
                     {!! Form::label('indate', 'Indate', []) !!}
                     {!! Form::date('indate', \Carbon\Carbon::now(), ['class'=>'form-control','readonly' => 'readonly','style'=>'width:250px;']) !!}
                     @if($errors->has("indate"))
                     <span class="help-block">{{ $errors->first("indate") }}</span>
                     @endif
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('computer_id')) has-error @endif">
                    {!! Form::label('computer_id', 'Computer_Name', []) !!}
                    {!! Form::select('computer_id',[''=>'Choose Options']+ $computers,0,['class'=>'form-control']) !!}
                    @if($errors->has("computer_id"))
                    <span class="help-block">{{ $errors->first("computer_id") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('other_id')) has-error @endif">
                    {!! Form::label('other_id', 'Other_Name', []) !!}
                    {!! Form::select('other_id',[''=>'Choose Options']+ $others,0,['class'=>'form-control']) !!}
                    @if($errors->has("other_id"))
                    <span class="help-block">{{ $errors->first("other_id") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('color_id')) has-error @endif">
                    {!! Form::label('color_id', 'Color', []) !!}
                    {!! Form::select('color_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                    @if($errors->has("color_id"))
                    <span class="help-block">{{ $errors->first("color_id") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('otherName')) has-error @endif">
                    {!! Form::label('serialnumber', 'Serial_Number', []) !!}
                    {!! Form::select('serialnumber',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                    @if($errors->has("serialnumber"))
                    <span class="help-block">{{ $errors->first("serialnumber") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('qty')) has-error @endif">
                    {!! Form::label('qty','Qty') !!}
                    {!! Form::number('qty','',['class'=>'form-control','placeholder'=>'0']) !!}
                    @if($errors->has("qty"))
                    <span class="help-block">{{ $errors->first("qty") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('sellPrice')) has-error @endif">
                    {!! Form::label('sellPrice','Price') !!}
                    {!! Form::text('sellPrice','',['class'=>'form-control','placeholder'=>'0.00']) !!}
                    @if($errors->has("sellPrice"))
                    <span class="help-block">{{ $errors->first("sellPrice") }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="row ">
                <div class="col-md-12">
                  {!! Form::label('amount','Amount') !!}
                  {!! Form::text('amount','',['class'=>'form-control','placeholder'=>'0.00']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="row ">
                <div class="col-md-12">
                  <div class="form-group @if($errors->has('subtotal')) has-error @endif">
                    {!! Form::label('description','Description') !!}
                    {!! Form::textarea('description','',['class'=>'form-control','placeholder'=>'Product Description','style'=>'height:120px;']) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="container-fluid">
            <div class="row well well-sm ">
              <div class="col-md-12">

                {!! Form::submit('Add Detail',['name'=>'btn_addDetail','class'=>'btn btn-primary']) !!}
                {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                <button type="submit" class="btn btn-primary pull-right">Save</button>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product_Name</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Amount</th>
                  <th class="text-right">Option</th>
                </tr>
              </thead>
              <tbody>

                <?php $i=0; ?>
                {{-- @foreach ($tmpinvoices->bcinvoicedetails as $tmpdetail) --}}
                <tr>
                  <td>
                    <?php if($i==0) 
                    echo $i+1 ;
                    else
                      echo $i;

                    ?>
                  </td>
                  {{-- <td>{{ $tmpdetail->pro ?  $tmpdetail->pro->name : 'No Value' }}</td>
                  <td>{{ $tmpdetail->description }}</td>
                  <td>{{ $tmpdetail->qty }}</td>
                  <td>{{ $tmpdetail->price }}</td>
                  <td> {{ $tmpdetail->amount }}</td> --}}
                  <?php $i++ ?>
                  <td class="text-right">
                    {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $bcinvoice->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a> --}}
                    {{-- <a class="btn btn-xs btn-warning" href="{{ route('admin.tmpinvoices.detail.edit', $tmpdetail->detail) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> --}}
                    {{-- <form action="{{ route('admin.tmpinvoices.detail.destroy', $tmpdetail->pro_id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                     <input type="hidden" name="_method" value="DELETE">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                   </form> --}}
                 </td>
               </tr>
               {{-- @endforeach --}}

             </tbody>
           </table>
         </div>
       </div>
     </div>
     <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-7">
          </div>
          <div class="col-md-1">
           <label for="subtotal-field">Subtotal</label>
         </div>
         <div class="col-md-2">
           <input type="text" id="subtotal-field" name="subtotal" class="form-control" value="{{ old("subtotal") }}"/>
           @if($errors->has("subtotal"))
           <span class="help-block">{{ $errors->first("subtotal") }}</span>
           @endif
         </div>
       </div>
     </div>
   </div>
   <div class="row">
    <div class="col-md-12">
      <div class="container-fluid">
        <div class="row well well-sm ">
          <div class="col-md-12">
            <a class="btn btn-link pull-right" href="{{ route('admin.invoices.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- <div class="form-group @if($errors->has('user_id')) has-error @endif">
 <label for="user_id-field">User_id</label>
<input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ old("user_id") }}"/>
 @if($errors->has("user_id"))
  <span class="help-block">{{ $errors->first("user_id") }}</span>
 @endif
</div> --}}

{!! Form::close() !!}
{{--  </form> --}}


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src='{{ url('/js/aj.js') }}'></script>
<script type="text/javascript">
  $('.date-picker').datepicker({
  });

  $('#computer_id').on('change', function(e) {
      // console.log(e);
      var id = $(this).val();
      if(id){
        var element = $('#color_id');
        var endpoint = '/admin/api/v1/computers/' + id + '/colors'
        getRelatedElements(element, endpoint);
      }
  });
   
  $('#other_id').on('change', function(e) {
      console.log(e);
      var id = $(this).val();
      if(id){
        var element = $('#color_id');
        var endpoint = '/admin/api/v1/others/' + id + '/colors'
        getRelatedElements(element, endpoint);
      }
  });

  // $('#color_id').on('change', function(e) {
  //    var id = $(this).val();
  //     // console.log(id);
  //         if(id){
  //           var element = $('#serialnumber');
  //           var element2 = $('#sellPrice');
  //           var endpoint = '/admin/api/v1/colors/' + id + '/computers'
  //           getSerialNumbers(element, element2, endpoint);
  //         }
  // });
  $('#color_id').on('change', function(e) {
     var id = $('#computer_id').val();
      // console.log(id);
      getSellPrice(id);
  });

  function getSellPrice(id) {
    $.ajax({
      method: 'GET',
      url: '/admin/api/v1/computers/' + id,
      success: function(response) {
           console.log(response);
        // if(Array.isArray(response)) {
        //   element.empty();
        //   response.map(function(item) {
        //     element.val(item.sellprice)
        //   });
        // } 
      },
      error: function(error) {
        console.log(error)
      }
    });
  }

  function getSerialNumbers(element, element2, endpoint) {
    $.ajax({
      method: 'GET',
      url: endpoint,
      success: function(response) {
        if(Array.isArray(response)) {
          element.empty();
          element2.empty();
          var options = "<option value=''>Choose Options</option>"; 
          element.append(options);
          response.map(function(item) {
             var options = "<option value=" + item.id + ">" + item.pivot.serialnumber + "</option>"; 
            element.append(options);
            element2.val(item.pivot.cost)
          });
        } 
      },
      error: function(error) {
        console.log(error)
      }
    });
  }
  function getRelatedElements(element, endpoint) {
    $.ajax({
      method: 'GET',
      url: endpoint,
      success: function(response) {
        if(Array.isArray(response)) {         
         console.log(response);
          element.empty();
          var options = "<option value=''>Choose Options</option>"; 
          element.append(options);
          response.map(function(item) {
            var options = "<option value=" + item.id + ">" + item.name + "</option>"; 
            element.append(options);
          });
        } 
      },
      error: function(error) {
        console.log(error)
      }
    });
    // body...
  }
</script>
@endsection

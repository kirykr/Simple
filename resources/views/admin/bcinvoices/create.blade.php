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
            {!! Form::open(['action'=>'BecinvoiceController@store','method'=>'POST','files'=>true]) !!}
            <div class="row">
              <div class="col-md-3">
                <div class="row ">
                  <div class="col-md-12">
                    <div class="form-group @if($errors->has('indate')) has-error @endif">
                     {!! Form::label('indate', 'Indate', []) !!}
                     {!! Form::date('indate', \Carbon\Carbon::now(), ['class'=>'form-control','readonly' => 'readonly']) !!}
                     @if($errors->has("indate"))
                     <span class="help-block">{{ $errors->first("indate") }}</span>
                     @endif
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-3">
                  <div class="row ">
                    <div class="col-md-12">
                      <a class="btn btn-link pull-right" href="{{ route('admin.bcinvoices.create') }}"><input type="button" class="btn btn-primary" value="Reload"></a>
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
                  <div class="form-group @if($errors->has('serialnumber')) has-error @endif">
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
                    {!! Form::number('qty','',['class'=>'form-control','placeholder'=>'0','min'=>'1']) !!}
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
                    {!! Form::text('sellPrice','',['class'=>'form-control','readonly' => 'readonly','placeholder'=>'0.00']) !!}
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
                  {!! Form::text('amount','',['class'=>'form-control','readonly' => 'readonly','placeholder'=>'0.00']) !!}
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
                    {!! Form::textarea('description','',['class'=>'form-control','readonly' => 'readonly','placeholder'=>'Product Description','style'=>'height:120px;']) !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="row serialnumber_field">
                <div >
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-md-12">

          <div class="container-fluid">
            <div class="row well well-sm ">
              <div class="col-md-12">

                {!! Form::submit('Add Detail',['name'=>'btn_adddetail','class'=>'btn btn-primary']) !!}
                @foreach($tmpdetails as $tmpdetail)
                @if($tmpdetail->description!=null)
                {!! Form::submit('Pay Bill',['name'=>'btn_pay','class'=>'btn btn-primary pull-right']) !!}
                @endif
                <?php break; ?>
                @endforeach
                {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                {{-- <button type="submit" class="btn btn-primary pull-right">Save</button> --}}

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            @if($tmpdetails!=null)
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product_Name</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Amount</th>
                  @foreach($tmpdetails as $tmpdetail)

                  
                  @if($tmpdetail->description!=null) 
                  
                  <th class="text-right"><button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button></th>
                  <?php break; ?>
                  @endif
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <?php $i=0; ?>
              @foreach($tmpdetails as $tmpdetail)
                <tr>
                <td>
                <?php 
                    if($i == 0){
                      echo $i+1;
                      $i++;
                    }
                    else{
                      echo $i; 
                    }
                    ?>
                <?php $i++; ?>
                </td>
                <td>  {{ $tmpdetail->pro ? $tmpdetail->pro->name : '' }} </td>
                <td>  {{ $tmpdetail->description }} </td>
                <td>  {{ $tmpdetail->qty  }} </td>
                <td> <?php echo '$' ?> {{ $tmpdetail->price }} </td>
                <td> <?php echo '$' ?> {{ $tmpdetail->amount }} </td>
                {{-- {!! Form::close() !!} --}}
                <td class="text-right">
                    <input type="radio" name="radio" class="radio" value="{{ $tmpdetail->id }}">
                </td>
               
                </tr>
                @endforeach
                
             </tbody>
           </table>
           {{-- {!! Form::open(['action'=>'BcinvoiceController@store','method'=>'POST','files'=>true]) !!} --}}
           {{-- {!! $tmpinvoices->render() !!} --}}
           @else
              {{-- <h3 class="text-center alert alert-info">Empty!</h3> --}}
           @endif
         </div>
       </div>
     </div>
     <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
          </div>
          {{-- <div class="col-md-2">
           {!! Form::text('tmp_id','',['class'=>'form-control','placeholder'=>'0','id'=>'tmp_id']) !!}
           @if($errors->has("tmp_id"))
           <span class="help-block">{{ $errors->first("tmp_id") }}</span>
           @endif
         </div> --}}
          <div class="col-md-2">
           {!! Form::hidden('serial_id','0',['class'=>'form-control','placeholder'=>'0','id'=>'serial_id']) !!}
           @if($errors->has("serial_id"))
           <span class="help-block">{{ $errors->first("serial_id") }}</span>
           @endif
         </div>
          <div class="col-md-1">
           <label for="total">Total</label>
         </div>
         
         <div class="col-md-2">
           {!! Form::number('total','0',['class'=>'form-control','placeholder'=>'0','readonly'=>'readonly','id'=>'total']) !!}
           @if($errors->has("total"))
           <span class="help-block">{{ $errors->first("total") }}</span>
           @endif
         </div>
         
        </div>
        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-2">
           {!! Form::hidden('pro_type','',['class'=>'form-control','placeholder'=>'0','id'=>'pro_type']) !!}
           @if($errors->has("pro_type"))
           <span class="help-block">{{ $errors->first("pro_type") }}</span>
           @endif
         </div>
          <div class="col-md-1">
           <label for="discount">Discount</label>
         </div>
         <div class="col-md-2">
           {!! Form::number('discount','0',['class'=>'form-control','placeholder'=>'0','id'=>'discount','min'=>'0','max'=>'100','onkeypress'=>'return isNumberKey(event)']) !!}
           @if($errors->has("discount"))
           <span class="help-block">{{ $errors->first("discount") }}</span>
           @endif
         </div>
         
        </div>
        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-2">
           {!! Form::hidden('serialupdate','',['class'=>'form-control','placeholder'=>'0','id'=>'serialupdate']) !!}
           @if($errors->has("serialupdate"))
           <span class="help-block">{{ $errors->first("serialupdate") }}</span>
           @endif
         </div>
          <div class="col-md-1">
           <label for="subtotal-field">Subtotal</label>
         </div>
         <div class="col-md-2">
           <input type="text" id="subtotal-field" name="subtotal" value="0" readonly="readonly" class="form-control" value="{{ old("subtotal") }}"/>
           @if($errors->has("subtotal"))
           <span class="help-block">{{ $errors->first("subtotal") }}</span>
           @endif
         </div>
       </div>
     </div>
   </div>

   <div class="row">
    <div class="col-md-12">
      <div class="container-fluid well-sm well">
          <div class="col-md-12">
            <a class="btn btn-link pull-right" href="{{ route('admin.bcinvoices.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
{{-- <div class="form-group @if($errors->has('user_id')) has-error @endif">
 <label for="user_id-field">User_id</label>
<input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ old("user_id") }}"/>
 @if($errors->has("user_id"))
  <span class="help-block">{{ $errors->first("user_id") }}</span>
 @endif
</div> --}}


{{--  </form> --}}
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

   // $("#computer_id").select2({
   //    placeholder: "Select a Computer",
   //    maximumSelectionSize: 2
   //  });

   // $("#other").select2({
   //    placeholder: "Select a Computer",
   //    maximumSelectionSize: 2
   //  });

  $('.date-picker').datepicker({
  });
  $(document).ready( function(){
    // console.log("this is computer_id="+$('#computer_id').val());
    if($('#computer_id').val()=="" && $('#computer_id').val()=="")
    {
        $("#qty").prop('disabled', true);
    }
    getTotal();
  });
  function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
  function getcolorname(id){
    $.ajax({
      method:'GET',
      url: "/admin/color/getname/"+id,
      success:function(response){
        cname=response.name;
      },
      error:function(error){
        console.log(error)
      }
    });
  }
function getserialnumber(id,cid){
    $.ajax({
      method: 'GET',
      url: "/admin/computers/serialnumbers/"+id+"/"+cid,
      success:function(response){
        if(Array.isArray(response)){
            $('#serialnumber').empty();
            var serialnumber="<option value=''>Choose Options</option>";
            $('#serialnumber').append(serialnumber);
            response.map(function(item){
              if(item.pivot.status=="available"){
              serialnumber="<option value=" + item.pivot.serialnumber + ">" + item.pivot.serialnumber + "</option>";;
              $('#serialnumber').append(serialnumber);
              }
            });
        }
      },
      error:function(error){
        console.log(error);
      }
    });
 }
 var loop=0;
function getSerial_id(id){
    $.ajax({
      method:'GET',
      url:"/admin/computer/serialid/"+id,
      success:function(response){
        var symbol="";
        if(loop>0){
          symbol=",";
        }
          console.log(symbol);
         $('#serial_id').val($('#serial_id').val()+symbol+response[0].id);
         loop++;
        
      },
      error:function(error){
        console.log(error);
      }
    });
   }
 function getdesc(id,colorid){
    getcolorname(colorid);
    $.ajax({
      method: 'GET',
      url: "/admin/computers/descriptions/"+id,
      success:function(response){
        if(Array.isArray(response)){
          var i=0;
          $('#description').val("");
          response.map(function(item){
            var desc = item.pivot.description;
            var symbol="";
            if(i>0){
              symbol=" , ";
            }
            $('#description').val($('#description').val()+symbol+desc);
            i++;
          });
          console.log("this is "+cname)
          $('#description').val($('#description').val()+", "+cname);
        }
      },
      error:function(error){
        console.log(error);
      }
    });
 }
 function getdescc(id,colorid){
    getcolorname(colorid);
    $.ajax({
      method: 'GET',
      url: "/admin/other/name/"+id,
      success:function(response){
          $('#description').val("");
            var desc = response.name;
            var symbol="";
            $('#description').val(desc+" , "+cname);
      },
      error:function(error){
        console.log(error);
      }
    });
 }
  function getTotal(){
    $.ajax({
      method: 'GET',
      url:'/admin/computerinv/getamount',
      success:function(response){
        var total= 0;
        $('#total').val(response);
        $('#subtotal-field').val(response)
      },
      error:function(error){
        console.log(error);
      }
    });
  }
var product=0;
var sn = [""];
var k=0;
var cname="";
var qis=0;
  $('.radio').on('change',function(e){
    $('#tmp_id').val($(this).val());
  });
  $('#computer_id').on('change', function(e) {
      $('#other_id').val("Choose Options").prop('selected',true);
      if($(this).val!=""){
        $("#qty").prop('disabled', false);
      }
      var id = $(this).val();
      console.log(id);
      if(id){
        var element = $('#color_id');
        var endpoint = '/admin/api/v1/computers/' + id + '/colors'
        getRelatedElements(element, endpoint);
        product=1;
        k=0;
        $('#serial_id').val("");
        $('#pro_type').val("App\\Computer");
        $('#serialupdate').val("");
      }
  });
  $('#other_id').on('change', function(e) {
    $('#computer_id').val("Choose Options").prop('selected',true);
    if($(this).val!=""){
        $("#qty").prop('disabled', false);
      }
      var id = $(this).val();
      if(id){
        var element = $('#color_id');
        var endpoint = '/admin/api/v1/others/' + id + '/colors'
        getRelatedElements(element, endpoint);
        product=2;
        k=0;
        $('#pro_type').val("App\\Other");
      }
  });
  $('#serialnumber').on('change',function(e){
        var id = $(this).val();
        var qty = $('#qty').val();
        if(id){
        if(k<qty && sn.indexOf(id) == -1){
            sn[k] = id;
            k++;
            getSerial_id(id);
            $('#description').val($('#description').val()+"\n-"+id);
            $('#serialupdate').val($('#serialupdate').val()+"-"+id);
            }
        }     
  });
  $('#total').on('change',function(e){
      var total = $(this).val();
      var discount = $('#discount').val();
      var dis = total- (total * discount/100);
      $('#subtotal-field').val(dis);
      
  });
  $('#discount').on('change',function(e){
      var total = $('#total').val();
      var discount = $(this).val();
      if(discount<=100){
      var dis = total- (total * discount/100);
      $('#subtotal-field').val(dis);
      }else{
        alert("Discount Must be between 0 to 100");
        $(this).val("0");
      }
  });
  $('#color_id').on('change', function(e) {
     var id =0;
     var url="";
     var colorid = $(this).val();
     if(product==1)
     {
      id=$('#computer_id').val();
      url="/admin/invoices/computers/"+id;
     }
     else if(product==2)
     {
      id=$('#other_id').val();
      url="/admin/invoices/others/"+id;
     }
     // alert(""+url);
     $.ajax({
      method:'GET',
      url: url,
      success: function(response){
          if(product==1)
          { 
            $('#sellPrice').val(response.sellprice);
            $('#qty').val(1);
            var sellprice = $('#sellPrice').val();
            var qty = $('#qty').val();
            var amount = sellprice * qty;
            $('#amount').val(amount);
            getdesc(id,colorid);
            getserialnumber(id,colorid);
            cname="";
          
          }else if(product==2)
          {
            console.log(response.qtyinstock);
            if(response.qtyinstock>0){
              $('#sellPrice').val(response.sellprice);
              $('#qty').val(1);
              var sellprice = $('#sellPrice').val();
              var qty = $('#qty').val();
              var amount = sellprice * qty;
              $('#amount').val(amount);
               getdescc(id,colorid);
               cname="";
               qis=response.qtyinstock;
            }else{
              alert("This item is out of stock!!!!!");
            }
           
            // getdesccolor(response.name);

          }
        },
      error: function(error){
        console.log(error)
      }
     });
  });
    $('#qty').on('change',function(e){
      if($(this).val()>0)
      {
          var snum = $('#serialnumber option').size();
          if(product==1){
                if($(this).val()<=snum-1){
                var qty = $(this).val();
                var sellprice = $('#sellPrice').val();
                var amount = sellprice * qty;
                $('#amount').val(amount);
              }
              else{
                var qtyinstock = snum-1;
                alert("Qty in Stock for this color is "+qtyinstock);
                $(this).val(qtyinstock);
              }
          }
          else{
            if(qis>0){
              if($(this).val()<=qis){
                var qty = $(this).val();
                var sellprice = $('#sellPrice').val();
                var amount = sellprice * qty;
                $('#amount').val(amount);
              }else{
                  var qtyinstock =qis;
                   alert("Qty in Stock for this color is "+qtyinstock);
                   $(this).val(qtyinstock);
              }
              }
            }     
      }
      else
      {
        alert("There no item select so you can not increase quantity!!!!");
        $(this).val("");
      }
        
    });
  function getRelatedElements(element, endpoint) {
    $.ajax({
      method: 'GET',
      url: endpoint,
      success: function(response) {
        if(Array.isArray(response)) {         
          element.empty();
          var options = "<option value=''>Choose Options</option>"; 
          element.append(options);
          response.map(function(item) {
            console.log("In");
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

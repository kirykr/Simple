@extends('layouts.app')
@section('header')
<script type="text/javascript" src="/js/bootstrap.js"></script>
@endsection
@section('content')
<div class="container">
	<div class="row">
		{!! Form::open(['action'=>'CheckoutController@store','method'=>'POST','files'=>true]) !!}
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h1><p><i class="fa fa-credit-card"></i>CheckOut</p></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<hr/>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-12">
					<h3>Your Shipping Contact (Receiver)</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-10">
					<hr/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					{!! Form::label('fname','First_Name* ',['style'=>'text-align:right']) !!} 
					{!! Form::text('fname','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'First Name'])!!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					{!! Form::label('lname','Last_Name* ') !!} 
					{!! Form::text('lname','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'Last Name'])!!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					{!! Form::label('telephone','Telephone Number* ') !!} 
					{!! Form::number('telephone','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'0XX XXX XXX','onKeyDown'=>'if(checkLength(this)) return value=""','onkeypress'=>'return isNumberKey(event)'])!!}
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-10">
					<hr/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Shipping Address</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<hr/>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-10">
					{!! Form::label('locations','City/Province* ') !!} 
					{!! Form::select('locations',['0'=>'Choose Options']+ $locations,0,['class'=>'form-control','data-toggle'=>'collapse',  'data-target'=>'' ,'style'=>'width:300px']) !!}
				</div>
			</div>
			<br/>
			<div id="pp" class="collapse">
				<div class="row">
					<div class="col-md-10">
						{!! Form::label('khan','Khan/District* ') !!} 
						{!! Form::select('khan',['0'=>'Choose Options']+ $khans,0,['class'=>'form-control','style'=>'width:300px']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::label('sangkat','Sangkat* ') !!} 
						{!! Form::text('sangkat','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'Sangkat Name']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::label('street','Street* ') !!} 
						{!! Form::text('street','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'Street number']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::label('housenumber','Nº * ') !!} 
						{!! Form::text('housenumber','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'House Number']) !!}
					</div>
				</div>
				<br/>
			</div>
			<div id="province" class="collapse">
				<div class="row">
					<div class="col-md-10">
						{!! Form::label('address','Address* ') !!} 
						{!! Form::text('address','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'No. St...']) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<br/>
						<hr/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<h3>Shipping Method</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<hr/>
						<br/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						{!! Form::label('shippingmethod','Ship Method* ') !!} 
						{!! Form::select('shippingmethod',['0'=>'Choose Options','bus'=>'Bus Company','taxi'=>'Taxi'],0,['class'=>'form-control','data-toggle'=>'collapse',  'data-target'=>'','style'=>'width:300px']) !!}
						{!! Form::hidden('locate','',['class'=>'form-control','style'=>'width:300px','id'=>'locate_id']) !!}
						{!! Form::hidden('shm_type','',['class'=>'form-control','style'=>'width:300px','id'=>'shm_type']) !!}
						{!! Form::hidden('total_quantity',$cart->all()->sum('qty'),['class'=>'form-control','style'=>'width:300px','id'=>'total_quantity']) !!}
						{!! Form::hidden('total_amount',$cart->where('customer_id','=',Auth::user()->id)->get()->sum('amount'),['class'=>'form-control','style'=>'width:300px','id'=>'total_amount']) !!}
						{!! Form::hidden('total','',['class'=>'form-control','style'=>'width:300px','id'=>'total']) !!}
						{!! Form::hidden('grand_total','',['class'=>'form-control','style'=>'width:300px','id'=>'g_total']) !!}
						{!! Form::hidden('khan_id','',['class'=>'form-control','style'=>'width:300px','id'=>'khan_id']) !!}
						{!! Form::hidden('bus_id','',['class'=>'form-control','style'=>'width:300px','id'=>'bus_id']) !!}
						{!! Form::hidden('shipamount','',['class'=>'form-control','style'=>'width:300px','id'=>'shipamount']) !!}

						<br/>
					</div>
				</div>
				<div id="bus" class="collapse">
					<div class="row">
						<div class="col-md-10">
							{!! Form::label('bus','Bus Company* ') !!} 
							{!! Form::select('bus',['0'=>'Choose Options']+$buses,0,['class'=>'form-control','style'=>'width:300px','id'=>'buses']) !!}
						</div>
					</div>
					<br/>
				</div>
				<div id="taxi" class="collapse">
					<div class="row">
						<div class="col-md-10">
							{!! Form::label('taxiname','Taxi Name* ') !!} 
							{!! Form::text('taxiname','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'Taxi Name']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							{!! Form::label('taxinum','Taxi Phone Number* ') !!} 
							{!! Form::text('taxinum','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'0XX XXX XXX']) !!}
						</div>
					</div>
					<br/>
				</div>	
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<h1><p><i class="fa fa-shopping-cart"></i>Your Products</p></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr/>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-6 col-md-offset-6">
					<h3>Order Description</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr/>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-12">
					<?php $plural="" ?>
					@if(count($cart->where('customer_id','=',Auth::user()->id)->get())>0)
					<?php $q = count($cart->where('customer_id','=',Auth::user()->id)->get()); 
					if($q>1)
						$plural="s"
					?>
					<table class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#b3e0ff">
								<th>Description</th>
								<th>Qty</th>
								<th>Price</th>
								<th class="text-right">Discount</th>
								<th class="text-right">Amount</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cart->where('customer_id','=',Auth::user()->id)->get() as $row)
							<?php $computer = $computers->find($row->pro_id); ?>
							<tr>
								<td><p><strong>{{ $computer->name }}@foreach($computer->specs as $desc) {{",". $desc->pivot->description}} @endforeach
									<?php $color = $colors->find($row->color_id); ?>{{",". $color->name }} </strong></p>
								</td>
								<td>&nbsp;x{{ $row->qty }}</td>
								<td>${{ $row->price * $row->qty }}</td>
								<td class="text-right">{{ $row->discount*100 }}%</td>
								<?php $total=  $row->amount - ($row->discount*$row->amount) ; ?>
								<td class="text-right">${{ $total }}</td>
							</tr>
							@endforeach
							<tr>
								<td bgcolor="#ccd9ff"><span style="font-weight:bold">Total Item{{$plural.":".count($cart->where('customer_id','=',Auth::user()->id)->get()) }}</span></td>
								<td bgcolor="#ccd9ff"></td>
								<td bgcolor="#ccd9ff"></td>
								<td bgcolor="#ccd9ff" class="text-right"><span style="font-weight:bold">Total:</span></td>
								<?php $sum = $cart->where('customer_id','=',Auth::user()->id)->get();?>
								<td class="text-right" bgcolor="#ccd9ff">${{ $sum->sum('amount') }}</td>
							</tr>
							<tr >
								<td></td>
								<td></td>
								<td></td>
								<td class="text-right"><span style="font-weight:bold">Delivery Price:</span></td>
								<td class="text-right">$<span id="discount"><B>0</B></span></td>
							</tr>
							<tr>
								<td bgcolor="#ccd9ff"><span style="font-weight:bold"></span></td>
								<td bgcolor="#ccd9ff"></td>
								<td bgcolor="#ccd9ff"></td>
								<td bgcolor="#ccd9ff" class="text-right"><span style="font-weight:bold">Grand Total:</span></td>
								<td bgcolor="#ccd9ff" class="text-right">$<span id="grand_total">{{ $sum->sum('amount') }}</span></td>
							</tr>
						</tbody>
					</table>
					<button  type="button" class="btn btn-primary pull-right" id="btn_payment" data-toggle="modal" data-target="" data-keyboard="false" data-backdrop="static">Payment</button>
					<div id="payment" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="contain">
								<div class="modal-content">
									<div class="modal-header" style="background-color:#b3d9ff">
										<div class="row">
											<div class="col-md-12">
												<h1 style="color:white"><center>CheckOut</center></h1>
											</div>
										</div>
									</div>
									<div class="modal-body">
										<h3><i class="fa fa-credit-card"></i>Payment info</h3> <p style="color:red"><span id="error"><B></B></span></p>
										<hr/>

										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<div class="col-md-12">
													{!! Form::label('choldername','Card Holder name* ',['style'=>'text-align:right']) !!} 
													{!! Form::text('cardholdername','',['class'=>'form-control','placeholder'=>'Name.....','id'=>'chname'])!!}
												</div>
												{{-- </div> --}}

												<div class="col-md-12">
													{!! Form::label('cardnumber','Card Number* ',['style'=>'text-align:right']) !!} 
													{!! Form::text('account_id','',['class'=>'form-control','placeholder'=>'Card number.....','id'=>'account_id'])!!}
												</div>

												{{-- <div class="row"> --}}
												{{-- <div class="col-md-12"> --}}
												<div class="col-md-6">
													{!! Form::label('choldername','Expire Month* ',['style'=>'text-align:right']) !!} 
													{!! Form::select('month',['0'=>'Choose Options','1'=>'01','2'=>'02','3'=>'03','4'=>'04','5'=>'05','6'=>'06','7'=>'07','8'=>'08','9'=>'09','10'=>'10','11'=>'11','12'=>'12'],0,['class'=>'form-control','data-toggle'=>'collapse',  'data-target'=>'','id'=>'month']) !!}
												</div>
												{{-- <div class="col-md-1">
													
											</div> --}}
											<div class="col-md-6">
												{!! Form::label('year','Expire Year* ',['style'=>'text-align:right']) !!} 
												{!! Form::text('year','',['class'=>'form-control','placeholder'=>'two digit of year.....','id'=>'year','required'=>''])!!}
											</div>
											{{-- </div> --}}
											{{-- </div> --}}

											{{-- <div class="row"> --}}
											<div class="col-md-12">
												{!! Form::label('cvb_code','Cvb_Code* ',['style'=>'text-align:right']) !!} 
												{!! Form::text('cvb_Code','',['class'=>'form-control','placeholder'=>'3 digits number','id'=>'cvb_Code'])!!}
											</div>
											{{-- </div> --}}
											{{-- <div class="row"> --}}
											<div class="col-md-12">
												{!! Form::label('securitycode','Security_Code* ',['style'=>'text-align:right']) !!} 
												{!! Form::text('security_code','',['class'=>'form-control','placeholder'=>'password','id'=>'security_code'])!!}
											</div>
											{{-- </div> --}}
											{{-- <div class="row"> --}}
											<div class="col-md-8">
												{!! Form::label('totals','Total* ',['style'=>'text-align:right']) !!} 
												{!! Form::text('total_pay','',['class'=>'form-control','placeholder'=>'','id'=>'total_pay','readonly'=>'readonly'])!!}
												{!! Form::hidden('afterpaybalance','',['class'=>'form-control','id'=>'afterpaybalance']) !!}
											</div>
											<div class="col-md-4"></div>
										</div>
									</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>	
										<button type="button" class="btn btn-primary" disabled="true" id="btn_pay">&nbsp;&nbsp;&nbsp;Pay&nbsp;&nbsp;&nbsp;</button>
									</div>
								</div>
							</div>
						</div>

						@else 
						<h1> You Don't Have any item in your cart!!</h1>
						@endif
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

	@stop

	@section('footer')

	@stop

	@section('scripts')
	{{-- <script type="text/javascript" src="/js/bootstrap.js"></script> --}}
	<script type="text/javascript">
		$(document).ready(function(){
			// $('#btn_pay').prop('disabled',false);
		});
		var shippingmethod=0;
		var loc=0;
		var toggle = 0;

		$('#btn_payment').on("click",function(){
		var fname= $('#fname').val();
		var lname= $('#lname').val();
		var tel= $('#telephone').val();
		var khan = $('#khan').val();
		var sangkat= $('#sangkat').val();
		var street = $('#street').val();
		var housenumber = $('housenumber').val();
		var address =$('#address').val();
		var buses = ""+$('#buses').val();
		var shipmethod = $('#shippingmethod').val();
		var taxiname=$('#taxiname').val();
		var taxinum =$('#taxinum').val();
		var text1 =[];
		if(loc==0)
		{
			text1 =[fname,lname,tel,""];

		}else if(loc==1){
			if(khan>0)
				text1 =[fname,lname,tel,sangkat,street,housenumber];
			else
				text1 =[fname,lname,tel,"",sangkat,street,housenumber];
		}else{
			if(shipmethod!=0){
				if(shipmethod=="bus"){
					if(buses==0){
						text1=[fname,lname,tel,address,""];
					}
					else 
						text1=[fname,lname,tel,address];
				}else{
					text1=[fname,lname,tel,address,taxiname,taxinum];
				}

			}else{
				text1=[fname,lname,tel,address,""];
			}

		}
		
		if(checkEmpty(text1)==true){
			$('#btn_payment').attr('data-target','');
		}else{
			$('#btn_payment').attr('data-target','#payment');
		}
	});
$('#btn_pay').on('click',function(){
	var dt = new Date().getFullYear().toString().substr(2,2);
	var m = new Date().getMonth();
	var curr_year= dt*1;
	var expyear=1*$('#year').val();
	if($('#chname').val()==""){
		$('#error').html("<B>Please input Card Holder Name!!!</B>");
		return;
	}else{
		$('#error').html("<B></B>");
	}
	if($('#account_id').val()==""){
		$('#error').html("<B>Please input Card Number!!!</B>");
		return;
	}
	else{
		$('#error').html("<B></B>");
	}
	if($('#month').val()==0){
		$('#error').html("<B>Please Choose Expire Month!!!</B>");
		return;
	}else{
		$('#error').html("<B></B>");
	}
	if($('#year').val()==""){
		$('#error').html("<B>Please input Expire Year!!!</B>");
		return;
	}else{
		$('#error').html("<B></B>");
	}
	if(expyear<curr_year){
		$('#error').html("<B>Please make sure Expire Year is Bigger or equal This year!!!</B>");
		return;
	}else{
		if(expyear==curr_year){
			if($('#month').val()<m){
				$('#error').html("<B>Please make sure Expire Month is Bigger or equal to this month!!!</B>");
				return;
			}
			$('#error').html("<B></B>");
		}

	}
	if($('#cvb_Code').val()==0){
		$('#error').html("<B>Please input Cvb_Code!!!</B>");
		return;
	}else{
		$('#error').html("<B></B>");
	}
	if($('#security_code').val()==0){
		$('#error').html("<B>Please input Security Code!!!</B>");
		return;
	}else{
		$('#error').html("<B></B>");
	}
	$(this).prop('type','submit');
});
$('#khan').on('change',function(){
$('#khan_id').val($(this).val());
});
$('#locations').on("change",function(){
	var result = $(this).val();
		// console.log(result);
		if(result==1)
		{
			var delivery=0;
			var grand_total=0;
			grand_total=1*$('#total_amount').val();
			$(this).attr('data-target','#pp');
			if($('#total_quantity').val()<=5)
			{
				delivery=3;
			}
			else if($('#total_quantity').val()<=10){
				delivery=8;
			}
			else{
				delivery=15;
			}
			grand_total=(grand_total+delivery)*1.00;
			$('#discount').html("<B>"+delivery+"</B>");
			$('#grand_total').html("<B>"+grand_total+"</B>");
			$('#total').val(grand_total);
			$('#shipamount').val(delivery);
			$("#shm_type").val("App\\Bus");
			$("#bus_id").val(3);
			loc=1;
		}
		else if(result==0)
		{
			grand_total=1*$('#total_amount').val();
			$(this).attr('data-target','');
			$('#discount').html("<B>"+0+"</B>");
			$('#grand_total').html("<B>"+grand_total+"</B>");
			loc=0;
		}
		else
		{
			var delivery=0;
			var grand_total=0;
			grand_total=1*$('#total_amount').val();
			$(this).attr('data-target','#province');
			if($('#total_quantity').val()<=5)
			{
				delivery=5;
			}
			else if($('#total_quantity').val()<=10){
				delivery=10;
			}
			else{
				delivery=20;
			}
			grand_total=(grand_total+delivery)*1.00;
			$('#discount').html("<B>"+delivery+"</B>");
			$('#grand_total').html("<B>"+grand_total+"</B>");
			$('#total').val(grand_total);
			$('#shipamount').val(delivery);
			loc=2;
		}
		$('#g_total').val(grand_total);
		$('#total_pay').val(grand_total);
	});
$('#security_code').on('change',function(){
	var month = $('#month').val();
	var year = $('#year').val();
	// alert("month"+month+",year"+year);
	checkAccount($('#account_id').val(),$('#cvb_Code').val(),$('#security_code').val(),$('#total_pay').val(),month,$('#year').val());
})
$('#month').on('change',function(){
	console.log($(this).val());
});
$('#account_id').on('change',function(){
	$('#security_code').val("");
	$('#cvb_Code').val("");
});
$('#cvb_Code').on('change',function(){
		$('#security_code').val("");
});
$('#buses').on('click',function(){
	$('#bus_id').val($(this).val());
})
$('#shippingmethod').on("change",function(){
	var result = $(this).val();
		// console.log(result);
		if(result==0)
		{
			$(this).attr('data-target','');
			shippingmethod=0;
		}
		else if(result=="bus")
		{
			$(this).attr('data-target','#bus');
			$("#shm_type").val("App\\Bus");
			shippingmethod=1;
		}
		else
		{
			$(this).attr('data-target','#taxi');
			$("#shm_type").val("App\\Taxi");
			shippingmethod=2;
		}
	});
$("#year").bind('keydown', function(e){
	var targetValue = $(this).val();
	if (e.which ===8 || e.which === 13 || e.which === 37 || e.which === 39 || e.which === 46) { return; }

	if (e.which > 47 &&  e.which < 58  && targetValue.length < 2) {
		var c = String.fromCharCode(e.which);
		var val = parseInt(c);
		var textVal = parseInt(targetValue || "0");
		var result = textVal + val;

		if (result < 0 || result > 99) {
			e.preventDefault();
		}

		if (targetValue === "0") {
			$(this).val(val);
			e.preventDefault();
		}
	}
	else {
		e.preventDefault();
	}
});
$("#cvb_Code").bind('keydown', function(e){
	var targetValue = $(this).val();
	if (e.which ===8 || e.which === 13 || e.which === 37 || e.which === 39 || e.which === 46) { return; }

	if (e.which > 47 &&  e.which < 58  && targetValue.length < 3) {
		var c = String.fromCharCode(e.which);
		var val = parseInt(c);
		var textVal = parseInt(targetValue || "0");
		var result = textVal + val;

		if (result < 0 || result > 999) {
			e.preventDefault();
		}

		if (targetValue === "0") {
			$(this).val(val);
			e.preventDefault();
		}
	}
	else {
		e.preventDefault();
	}
});
$("#account_id").bind('keydown', function(e){
	var targetValue = $(this).val();
	if (e.which ===8 || e.which === 13 || e.which === 37 || e.which === 39 || e.which === 46) { return; }

	if (e.which > 47 &&  e.which < 58  && targetValue.length < 10000000) {
		var c = String.fromCharCode(e.which);
		var val = parseInt(c);
		var textVal = parseInt(targetValue || "0");
		var result = textVal + val;

		if (result < 0 || result > 99999999) {
			e.preventDefault();
		}

		if (targetValue === "0") {
			$(this).val(val);
			e.preventDefault();
		}
	}
	else {
		e.preventDefault();
	}
});
	//method
	function checkEmpty(items){
		if(Array.isArray(items)){
			for(var i=0;i<items.length;i++){
				if(items[i]==""){
					alert("Please make sure you input required field!!");
				// break;
				return true;
			}
		};
	}else{
		console.log("this is not an array");
	}
}
function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}
function checkLength(control){
	if(control.value.length>=10){
		alert("Max length for Telephone is 10.");
		return true;
	}
}
function checkAccount(acid,cvb,pass,totalpay,expm,expy){
	$.ajax({
		method:'GET',
		url:"/checkaccount/"+acid+"/"+cvb+"/"+pass+"/"+expm+"/"+expy,
		success:function(respone){
			if(respone.length>0){
				respone.map(function(item){
					if(item.balance>=totalpay){
						$('#afterpaybalance').val(item.balance-totalpay);
						$('#error').html("<B></B>");
						$('#btn_pay').prop('disabled',false);
						return;
					}
				});	
			}else{
				$('#error').html("<B>Please Make sure you input SECURITY CODE Or CVB OR CARD NUMBER Correctly!!!</B>");
				$('#afterpaybalance').val("");
				$('#btn_pay').prop('disabled',true);
			}	
		},
		error:function(error){

			console.log(error);
		}
		
	});
}

</script>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
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
					{!! Form::text('telephone','',['class'=>'form-control','style'=>'width:300px','placeholder'=>'0XX XXX XXX'])!!}
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
						{!! Form::select('khan',[''=>'Choose Options']+ $khans,0,['class'=>'form-control','style'=>'width:300px']) !!}
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
								<h3>Shipping Address</h3>
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
						<br/>
						</div>
					</div>
					<div id="bus" class="collapse">
						<div class="row">
							<div class="col-md-10">
									{!! Form::label('bus','Bus Company* ') !!} 
									{!! Form::select('bus',[''=>'Choose Options']+$buses,0,['class'=>'form-control','style'=>'width:300px']) !!}
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
									<td bgcolor="#ccd9ff">${{ $sum->sum('amount') }}.00</td>
								</tr>
								<tr >
									<td></td>
									<td></td>
									<td></td>
									<td class="text-right"><span style="font-weight:bold">Delivery Price:</span></td>
									<td>$</td>
								</tr>
								<tr>
									<td bgcolor="#ccd9ff"><span style="font-weight:bold"></span></td>
									<td bgcolor="#ccd9ff"></td>
									<td bgcolor="#ccd9ff"></td>
									<td bgcolor="#ccd9ff" class="text-right"><span style="font-weight:bold">Grand Total:</span></td>
									<td bgcolor="#ccd9ff">$</td>
								</tr>
						</tbody>
					</table>
					<button class="btn btn-primary pull-right" onclick="">Payment</button>
					@else 
						<h1> You Don't Have any item in your cart!!</h1>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('footer')

@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){

	});
	$('#locations').on("change",function(){
		var result = $(this).val();
		// console.log(result);
		if(result==1)
		{
			 $(this).attr('data-target','#pp');
		}
		else if(result==0)
		{
			$(this).attr('data-target','');
		}
		else
		{
			$(this).attr('data-target','#province');
		}
		
	});
	$('#shippingmethod').on("change",function(){
		var result = $(this).val();
		// console.log(result);
		if(result==0)
		{
			$(this).attr('data-target','');
		}
		else if(result=="bus")
		{
			$(this).attr('data-target','#bus');
		}
		else
		{
			$(this).attr('data-target','#taxi');
		}
	});

</script>
@endsection
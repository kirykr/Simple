@extends('layouts.app')
@section('content')
<hr>

<ol class="breadcrumb">
	<li>
		<a href="#">Home</a>
	</li>
	<li>
		<a href="#">Product</a>
	</li>
	<li class="active">Cart</li>
</ol>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
<h3 class="text-success"><i class="fa fa-shopping-cart fa-fw"></i>Shopping Cart</h3>
@if(sizeof($cart->where('customer_id','=',Auth::user()->id)->get()) > 0)
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{-- <strong>Cart info!</strong> <p>Wow You have {{Cart::content()->count()}} {{Cart::content()->count() > 1? 'items' : 'item'}} in your cart</p> --}}
		<strong>Cart info!</strong> <p>Wow You have {{ count($cart->where('customer_id','=',Auth::user()->id)->get()) }} {{str_plural('item', Cart::content()->count()) }} in your cart</p>
	</div>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Picture</th>
				<th>Description</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Amount</th>
				<th>Discount</th>
				<th>Subtotal</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			 @foreach($cart->where('customer_id','=',Auth::user()->id)->get() as $row)

            <tr>
                <td><p><strong>{{ $row->id }}</strong></p></td>
                   <?php $computer = $computers->find($row->pro_id);
                   // dd($computer->photos[0]->path)?>
                <td><p><img width="70" src=" {{ $computer->photos[0]->path  }} " alt=""></p></td>
                <td><p><strong>{{ $computer->name }} @foreach($computer->specs as $desc) {{",". $desc->pivot->description}} @endforeach
				<?php $color = $colors->find($row->color_id); ?>
				{{",". $color->name }} </strong></p></td>
                
                <td>
                <div class="row" style="width:100px !important">
					{!! Form::model($cart,['action' => ['CartController@update', $row->id], 'method' => 'PATCH']) !!}
					  <div class="form-group col-lg-12 col-md-12">
					  	<div class="row">
					  		<div class="col-md-8">
					  			<div class="input-group">
							     {{--  <input type="text" class="form-control text-left" id="exampleInputAmount" value="{{ $row->qty }}"> --}}
							     <?php 	$product_id= $row->pro_id;
							     		$color_id = $row->color_id;
							     		$qty=$computer->colors()->where("color_id","=",$color_id)->get();

							       ?>
							     {!! Form::number('qty', $row->qty , ['class'=>'form-control','id'=>$row->id,'min'=>'1','max'=>$qty->count("quantity")]) !!}
							    </div>
							   
							   </div>
							   <div class="col-md-4">
							   	 <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-refresh"></i></button>
							   </div>
					  	</div>
					  </div>
					    
					{{-- </form> --}}
					{!! Form::close() !!}
                </div>
                </td>
				
                <td>${{ $row->price }}</td>
                <td>${{ $row->price * $row->qty }}</td>
                <td>{{ $row->discount }}%</td>
                <td>${{ $row->amount}}</td>
                <td>
                	 <form action="{{ route('carts.destroy', $row->rowId) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger pull-right"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
		</tbody>
		<tfoot>
        <tr>
        	<?php $sum = $cart->where('customer_id','=',Auth::user()->id)->get();
        	?>
            <td colspan="6">&nbsp;</td>
            <td class="text-right"><p><strong>Subtotal:</strong></p></td>
            <td class="addToCart">${{ $sum->sum('amount') }}.00</td>
        </tr>
    </tfoot>
	</table>

@else
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Cart info!</strong> <p>You have none item in your cart.</p>
	</div>
@endif
		</div>
		<div class="row">
			<div class="col-md-6">
				<a href="{{ url('/') }}" class="btn btn-success addToCart"><i class="fa fa-arrow-left fa-fw"></i>CONTINUE SHOPPING</a>
			</div>
			<div class="col-md-6">
				<form action="{{ route('checkout.index') }}" method="GET" style="display: inline;">
				<button type="submit" class="btn btn-success addToCart pull-right">PROCEED TO CHECK OUT <i class="fa fa-arrow-right fa-fw"></i></button>
				</form>
			</div>

		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h3>TERMs AND CONDITIONs</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum numquam laudantium iusto beatae perspiciatis. Animi similique delectus, ipsum veniam aliquam dolorem voluptate expedita tempora repudiandae perspiciatis. Odio quisquam facere assumenda.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit non beatae magni, aliquid, inventore id sapiente saepe consequuntur, hic rem error accusantium labore veniam, obcaecati odio dolor omnis maxime voluptate.</p>
			<p></p>
		</div>
	</div>
</div>
<hr>
@endsection
@section('footer')
@stop
@section('scripts')

@endsection
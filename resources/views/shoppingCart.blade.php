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
@if(sizeof(Cart::instance(Auth::user()->id)->content()) > 0)
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Cart info!</strong> <p>Wow You have {{Cart::content()->count()}} {{Cart::content()->count() > 1? 'items' : 'item'}} in your cart</p>
	</div>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Picture</th>
				<th>Name</th>
				<th>Qty</th>
				<th>Options</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Amount</th>
				<th>Subtotal</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			 @foreach(Cart::instance(Auth::user()->id)->content() as $row)

            <tr>
                <td><p><strong>{{ $row->id }}</strong></p></td>
                   {{--  <p><img width="70" src=" {{ $computer->photo ? $computer->photo->path : '' }} " alt=""></p> --}}
                <td><img width="70" src="{{ $row->image }}" alt=""></td>
                <td><p><strong>{{$row->name}}</strong></p></td>
                <td>
                <div class="row" style="width:100px !important">
					{!! Form::model($content,['action' => ['CartController@update', $row->rowId], 'method' => 'PATCH']) !!}
					  <div class="form-group col-lg-12 col-md-12">
					  	<div class="row">
					  		<div class="col-md-8">
					  			<div class="input-group">
							     {{--  <input type="text" class="form-control text-left" id="exampleInputAmount" value="{{ $row->qty }}"> --}}
							     {!! Form::number('qty', $row->qty , ['class'=>'form-control']) !!}
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
				 <td>
				 	{!! Form::select('options', $row->options, null, ['class' => 'form-control']) !!}
				 	{{-- <select name="options" id="inputOptions" class="form-control form-control-inline">
				 		<option class="form-control form-control-inline" value="0">Choose Options</option>
				 		@foreach($row->options as $option)
				 			<option class="form-control form-control-inline" value="1">{{$option}}</option>
				 		@endforeach
				 	</select> --}}
                </td>
                <td>${{ $row->price }}</td>
                <td>${{ '0.00' }}</td>
                <td>${{ $row->price * $row->qty }}</td>
                <td>${{ $row->price * $row->qty }}</td>
                <td>
                	 <form action="{{ route('carts.destroy', $row->rowId) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
		</tbody>
		<tfoot>
        <tr>
            <td colspan="6">&nbsp;</td>
            <td class="text-right"><p><strong>Subtotal:</strong></p></td>
            <td class="addToCart">{{ Cart::subtotal() }}</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
            <td class="text-right"><p><strong>Tax:</strong></p></td>
            <td class="addToCart">{{ Cart::tax() }}</td>
        </tr>
        <tr>
            <td colspan="6">&nbsp;</td>
            <td class="text-right"><p><strong>TOTAL:</strong></p></td>
            <td class="addToCart">{{ Cart::total() }}</td>
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
				<button type="button" class="btn btn-success addToCart"><i class="fa fa-arrow-left fa-fw"></i>CONTINUE SHOPPING</button>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-success addToCart pull-right">PROCEED TO CHECK OUT <i class="fa fa-arrow-right fa-fw"></i></button>
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
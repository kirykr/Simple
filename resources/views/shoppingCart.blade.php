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
			
<h3>Shopping Cart</h3>
@if(sizeof(Cart::content()) > 0)
	<p>Wow You have {{Cart::content()->count()}} {{Cart::content()->count() > 1? 'items' : 'item'}} in your cart</p>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Picture</th>
				<th>Name</th>
				<th>Qry</th>
				<th>Ship Price</th>
				<th>Discount</th>
				<th>Amount</th>
				<th>Subtotal</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			 @foreach(Cart::content() as $row)

            <tr>
                <td><p><strong>{{ $row->id }}</strong></p></td>
                <td><p><strong>{{ 'Photo' }}</strong></p></td>
                   {{--  <p><img width="70" src=" {{ $computer->photo ? $computer->photo->path : '' }} " alt=""></p> --}}
                <td><p><strong>{{ $row->name }}</strong></p></td>
                <td>
                <div class="row">
					<form class="form-inline">
					  <div class="form-group col-lg-2 col-md-2">
					    <div class="input-group">
					      {{-- <div class="input-group-addon">$</div> --}}
					      <input type="text" class="form-control text-left" id="exampleInputAmount" value="{{ $row->qty }}">
					      {{-- <div class="input-group-addon">.00</div> --}}
					    </div>
					  </div>
					  {{-- <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button> --}}
					</form>
                {{-- <input type="text" value="{{ $row->qty }}"> --}}
                	
                </div>
                </td>
                <td>${{ '$0.00' }}</td>
                <td>${{ '$0.00' }}</td>
                <td>${{ $row->price }}</td>
                <td>${{ $row->total }}</td>
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
	<p>You have none item in your cart.</p>
@endif
		</div>
		<div class="col-md-12"></div>
	</div>
</div>

@endsection
@section('footer')
@stop
@section('scripts')
@endsection
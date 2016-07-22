@extends('layouts.app')
<style>

</style>
@section('content')
<hr>
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('home.index') }}">HOME</a>
			</li>
			<li class="active">{{$computer->name}}</li>
		</ol>
	</div>
</div>
<hr>
{{-- ============================ main============================== --}}
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<img width="100%" src="{{$computer->photo ? $computer->photo->path : ''}}" alt="No Image">
		</div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-12">
					<h2>{{ucfirst($computer->name)}}</h2>
				</div>
				<div class="col-md-12">
					Rating: <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	        		| <a href="#"><span class="label label-pill label-danger">3</span><span class="badge alert-success">Reviews:</span>  <i class="fa fa-comments"></i></a>

				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et reiciendis consequuntur nostrum molestias officiis, fuga quibusdam natus labore tempora vel accusamus doloribus eligendi quod consectetur omnis, numquam, voluptate fugit laboriosam.</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12 text-center text-primary well" style="font: 700 21px / 17px Arial; "><i class="fa fa-tag"></i> ${{$computer->sellprice}}</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p><span style="font-weight: bold;">Available:</span> Instock</p>
							<p><span style="font-weight: bold;">Product Code:</span> {{$computer->comcode}}</p>
						</div>
					</div>
				</div>
				<hr>
				
			</div>
			<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							{!! Form::label('', 'QTY:', []) !!}
							{{-- {!! Form::selectRange('number', 1, 110) !!} --}}
							{!! Form::number('', 1,['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-info addToCart"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p><a href="#"><i class="fa fa-list-alt"></i> Add to Wishlist</a></p>
					<p><a href="#"><i class="fa fa-envelope-o"></i> Message to Friends</a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<h3>PRODUCT DESCRIPTION</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum expedita tempore minus tenetur fugit excepturi modi placeat in odit corrupti totam nemo dolore, quisquam voluptates quae perspiciatis, asperiores, nisi sed!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsam iusto, animi voluptas quos delectus totam, error quasi laudantium magni porro nemo in similique est. Assumenda deleniti atque, praesentium eligendi!</p>
		</div>
		<div class="col-md-6">
			<h3><span class="label label-pill label-danger">3</span> CUSTOMER REVIEWS</h3>
	        <h5>Dara</h5>
	        Rating: <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	        <p style="font-style: italic;">"This is a good product. I want to buy it"</p>
	        <h5>Dara</h5>
	        Rating: <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	        <p style="font-style: italic;">"This is a good product. I want to buy it"</p>
	        <h5>Dara</h5>
	        Rating: <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	                <i class="fa fa-star-o"></i>
	        <p style="font-style: italic;">"This is a good product. I want to buy it"</p>
	        <h3>Write Your Owner Review Here</h3>
	        <div class="form-group">
	        {!! Form::textarea('', null, ['class'=>'form-control']) !!}
	        </div>
	        <div class="form-group">
	        {!! Form::submit('SUBMITT REVIEW', ['class'=>'form-control btn btn-info']) !!}
	        </div>
		</div>
	</div>
</div>


@endsection

@section('footer')
@stop
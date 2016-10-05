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
				@if($errors->any())
				<h4 style="color:red;">**{{$errors->first()}}**</h4>
				@endif
	</div>
</div>
<hr>
{{-- ============================ main============================== --}}
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				@if(count($computer->photos) > 0)
					<img id="zoom_03" class="img img-responsive" src="{{$computer->photos->first()->path }}" alt="" data-zoom-image="{{ $computer->photos ? $computer->photos->first()->path : 'images/computers/no-image.jpg' }}">
				@else
					<img id="zoom_03" class="img img-responsive" src="{{asset('/images/computers/no-image.jpg')}}" alt="" data-zoom-image="{{asset('/images/computers/no-image.jpg')}}">
				@endif
				</div>
			</div>
			<hr>
			<div class="row" id="gal1">
			@if(count($computer->photos) > 0)
				@foreach ($computer->photos as $photo)
					<div class="col-md-3 col-sm-3 col-xs-hidden">
					<a class="fancybox-thumbs" data-fancybox-group="thumb" href="{{$photo->path}}">
						<img class="img img-responsive" src="{{ $photo->path }}" >
					</a>
					</div>
				@endforeach
			@endif
			</div>
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
							<p><span style="font-weight: bold;">Product Code:</span> </p>
							{!! Form::label('qtyinstock', 'Qty In Stock', []) !!}
							{!! Form::text('qtyinstock',$computer->qtyinstock,['class'=>'form-control','readonly' => 'readonly','placeholder'=>'0','style'=>'width:100px']) !!}
							{!! Form::label('qtycolorinstock', 'Qty In Stock For this color', []) !!}
							{!! Form::text('qtycolorinstock','',['class'=>'form-control','readonly' => 'readonly','placeholder'=>'0','style'=>'width:100px']) !!}
						</div>
					</div>
				</div>
				<hr>
				
			</div>
			<div class="row">
					<div class="col-md-2">
						<div class="form-group">
						{!! Form::open(['action'=>"CartController@store", 'method'=>"POST"]) !!}
              {!! Form::hidden('computer_id', $computer->id, ['id'=>'computer_id']) !!}
              {!! Form::hidden('col_id','', ['id'=>'col_id']) !!}
              {!! Form::hidden('pro_type','', ['id'=>'pro_type']) !!}
							{!! Form::hidden('image',count($computer->photos) > 0 ? $computer->photos->first()->path : 'no-image', []) !!}
							{!! Form::label('', 'Colors:', []) !!}
                    		<select class="form-control" style="width:180px" id="color_id">
                    			<option>Choose Options</option>
                    			@foreach($colors as $color)
                    			<option value="{{ $color->id }}"> {{ $color->name }} </option>
                    			@endforeach
                    		</select>
                    		{{-- {!! Form::select('color',[''=>'Choose Options'],0,['class'=>'form-control', 'style'=>'width:180px']) !!} --}}
							{!! Form::hidden('price', $computer->sellprice, []) !!}
							{!! Form::label('', 'QTY:', []) !!}
							{{-- {!! Form::selectRange('number', 1, 110) !!} --}}
							{{-- {!! Form::number('qty',1,['class'=>'form-control','id'=>'qty']) !!} --}}
							{!! Form::number('quantity','1',['class'=>'form-control','id'=>'quantity']) !!}
						</div>
						
					</div>
					
			</div>
			<div class="row">
				<div class="col-md-12">
					<p><a href="#"><i class="fa fa-list-alt"></i> Add to Wishlist</a></p>
					<p><a href="#"><i class="fa fa-envelope-o"></i> Message to Friends</a></p>
				</div>
			</div>
			{{-- <div class="form-group"> --}}
						<div class="row">
							<div class="coll-md-6 pull-left">
							  <button type="summit" class="btn btn-primary form-control addToCart"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>
							</div>
							<div class="coll-md-6 pull-left">
							   <button type="summit" class="btn btn-warning form-control addToCart"><i class="fa fa-money"></i> Buy Now</button>
							</div>
						</div>
					{{-- </div> --}}
						{!! Form::close() !!}  
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<h3>PRODUCT DESCRIPTION</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php $k = 0;  ?>
				@foreach ($computer->specs as $spec)
					<tr>
						<td>{{$computer->specs[$k]->name}} :</td>
						<td>{{$spec->pivot->description}}</td>
					</tr>
					 <?php $k++ ?>
				@endforeach
				</tbody>
			</table>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum expedita tempore minus tenetur fugit excepturi modi placeat in odit corrupti totam nemo dolore, quisquam voluptates quae perspiciatis, asperiores, nisi sed!</p>
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
@section('scripts')
<!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/jquery.min.js"></script> --}}
<script type="text/javascript">
	// $(document).ready( function(e){
	// });
	//method
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
            var options = "<option value=" + item.id + ">" + item.name + "</option>"; 
            element.append(options);
          });
        } 
      },
      error: function(error) {
        console.log(error)
      }
    });
  }
  function checkProduct(id){
  	$.ajax({
  		method:'GET',
  		url:"/admin/computers/descriptions/"+id,
  		success:function(response){
  			$('#pro_type').val("App\\Computer");
  		},
  		error:function(){
  			$('#pro_type').val("App\\Other");
  		}
  	});
  }
  //handler
  $(document).ready( function(){
  	var id = $('#computer_id').val();
  	checkProduct(id);
  });

  $('#color_id').on('change',function(e){
  		var color_id = $(this).val();
  		var computer_id = $('#computer_id').val();
  		// console.log(computer_id);
  		$.ajax({
  			method:'GET',
  			url:"/admin/count/"+computer_id+"/"+color_id,
  			success:function(response){
  				$('#qtycolorinstock').val(response);
  				$('#quantity').val(1);
  				if(color_id!="Choose Options"){
  					$('#col_id').val(color_id);
  				}else{
  					$('#col_id').val();
  				}
  				
  			},
  			error:function(error){
  				console.log(error);
  			}
  		});
  });
  $('#quantity').on('change',function(e){
  	var qtycolor = $('#qtycolorinstock').val();
  	if($(this).val()>0){
  		if($(this).val()<=qtycolor){

  		}else{
  			alert("Maximum in Stock is "+qtycolor+"!!!");
  			$(this).val(qtycolor);
  		}
  	}else{
  		alert("Quantity must be bigger than 0");
  		$(this).val("1");
  	}
  });
  	
	</script>
@stop
@stop

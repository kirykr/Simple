@extends('layouts.app')
<style>
   
</style>
@section('content')
<div id="carousel-id" class="carousel slide hidden-xs" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner" style="background: #162631">
        <div class="item">
           
           
            <div class="container">
                <div class="carousel-caption">
                    <div class="col-md-8">
                        <h1 class="thinFont">Today's Deals</h1>
                    <p style="font-family: 'Lato','Sans', 'Arial'; font-size: 25px; font-weight: 700; color: #5DAAD0">Check out this selection of products at a discount price</p>
                    <p><a class="btn btn-lg btn-info" href="#" role="button">SHOP NOW</a></p>
                    </div>
                </div>
                 <div class="pull-right"> <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="/images/promo.png"></div>
            </div>
        </div>
        <div class="item">
            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="/images/promo.png">
            {{-- http://placehold.it/1310x370 --}}
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item active">
            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="/images/promo.png">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="fa fa-chevron-left" style="margin-top: 90% !important"></span></a>
    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="fa fa-chevron-right" style="margin-top: 90% !important"></span></a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 30px;"><a href="#"><h4>Featured</h4></a></div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 30px;">
        View: <a href="#"><i class="fa fa-th-large fa-fw"></i></a>
              <a href="#"><i class="fa fa-th-list"></i></a> 
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 pull-right text-right">
        <ul class="pagination" style="margin-bottom: 0px !important; padding-bottom: 0px !important">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul></div>
    </div>
<hr>
<div class="container">
    <div class="row">
        @foreach($computers as $computer)
            <div class="col-md-3 text-center">
                <img class="img img-responsive" src="{{ $computer->photo ? $computer->photo->path : '' }}" alt="Product Image">
                <a href="{{ route('products.show', $computer->id) }}"><h4>{{ $computer->name }}</h4></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p>Availability: </p>
                <p>Rating:  <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                </p>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                            {{-- {!! Form::open(['action'=>"CartController@store", 'method'=>"POST"]) !!} --}}
                                {{-- {!! Form::hidden('id', $computer->id, []) !!} --}}
                                {{-- {!! Form::hidden('image', $computer->photo->path, []) !!} --}}
                                {{-- {!! Form::hidden('qty', 1, []) !!} --}}
                                {{-- {!! Form::hidden('price', $computer->sellprice, []) !!} --}}
                                {{-- {!! Form::hidden('options', array('color' => 'Silver','Gold' ) , []) !!} --}}
                                {{-- {!! Form::hidden('customer_id', Auth::user()->id, []) !!} --}}
                            
                                <div class="input-group">
                                    <div class="input-group-addon text-center addToCart">${{$computer->sellprice}}
                                    </div>
                                    {{-- <button type="summit" class="btn btn-success form-control addToCart"><i class="fa fa-eye"></i> VIEW DETAILS</button> --}}
                                    <a href="{{ route('products.show', $computer->id) }}", class="btn btn-success form-control addToCart"> VIEW DETAILS</a>
                                </div>
                            {{-- {!! Form::close() !!} --}}
                        
                    </div>
                </div>
                    
                
            </div>

        @endforeach
        
    </div>
</div>
</div>
@endsection
@section('footer');



@stop

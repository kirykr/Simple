@extends('layouts.app')
<style>
.borderless td, .borderless th {
    border: none !important;
    font-size: 14px;
}
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
          {!! $computers->render() !!}
        </div>
      </div>
      <hr>
      <div class="container">
        <?php $i = 1; ?>
        <div class="row">
        @foreach($computers as $computer)
          <?php $k = 0;  ?>
          @if($i % 4 === 0)
          <div class="row">
            @endif
            <div class="col-md-3 col-sm-3 col-xs-12 text-center">
              <a href="{{ route('products.show', $computer->id) }}">
              <img class="img img-responsive" src="{{ $computer->photos ? $computer->photos->first()->path : '' }}" alt="Product Image">
              <h4>{{ str_limit($computer->name, $limit = 25, $end = '...')}}</h4></a>
              <hr>
              <table  class='table table-condensed borderless'>
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($computer->specs as $spec)
                  <tr>
                    <td class="text-right">{{str_limit($computer->specs[$k]->name, $limit = 9, $end = '')}}:</td>
                    <td>{{str_limit($spec->pivot->description, $limit = 15, $end = '...')}}</td>
                  </tr>
                  <?php 
                    if($k === 2)
                      break;
                    else
                      $k++
                  ?>
                  @endforeach
                </tbody>
              </table>
            
              <p class="text-center">Availability: </p>

              {{-- @include('includes/star_rating_with_javascript') --}}
              @include('includes/star_rating')

              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="input-group">
                    <div class="input-group-addon text-center addToCart">${{$computer->sellprice}}
                    </div>
                    <a href="{{ route('products.show', $computer->id) }}", class="btn btn-success form-control addToCart"> VIEW DETAILS</a>
                  </div>
                  {{-- {!! Form::close() !!} --}}
                </div>
              </div>
            </div>
            {{-- <div id="shop"></div> --}}
            @if($i % 4 === 0)
          </div>
          @endif
          <?php $i++; ?>
          @endforeach
          <p></p>
          @foreach($others as $other)
            <div class="col-md-3 col-sm-3 col-xs-12 text-center">
              <a href="{{ route('products.show', $other->id) }}">
              <img class="img img-responsive" src="{{ $other->photos ? $other->photos->first()->path : '' }}" alt="Product Image">
              <h4>{{ str_limit($other->name, $limit = 25, $end = '...')}}</h4></a>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
              <p class="text-center">Availability: </p>

              {{-- @include('includes/star_rating_with_javascript') --}}
              @include('includes/star_rating')

              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="input-group">
                    <div class="input-group-addon text-center addToCart">${{$other->sellprice}}
                    </div>
                    <a href="{{ route('products.show', $other->id) }}", class="btn btn-success form-control addToCart"> VIEW DETAILS</a>
                  </div>
                  {{-- {!! Form::close() !!} --}}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      {!! $computers->render() !!} {!! $others->render() !!}
    </div>
    @endsection
    @section('footer');

    @stop
    @section('scripts');
    <script type="text/javascript">
    // // target element
    var el = document.querySelector('#el');

    // current rating, or initial rating
    var currentRating = 0;

    // max rating, i.e. number of stars you want
    var maxRating= 5;

    // callback to run after setting the rating
    var callback = function(rating) { console.log(rating); };

    // rating instance
    var myRating = rating(el, currentRating, maxRating, callback);

    // sets rating and runs callback
    // myRating.setRating(3);

    // sets rating and runs callback
    // myRating.setRating(3, true);

    // sets rating and doesn't run callback
    // myRating.setRating(3, false);

    // gets the rating
    // myRating.getRating();
  </script>
  <script>
  /**
   * Demo in action!
   */
   'use strict';

    // SHOP ELEMENT
    var shop = document.querySelector('.shop');

    // DUMMY DATA
    var data = [
    {
      rating: 3
    }
    ];

    // INITIALIZE
    (function init() {
      for (var i = 0; i < data.length; i++) {
        addRatingWidget(buildShopItem(data[i]), data[i]);
      }
    })();

    // BUILD SHOP ITEM
    function buildShopItem(data) {
      var shopItem = document.createElement('div');

      var html = 
      '<ul class="c-rating"></ul>';

      shopItem.classList.add('c-shop-item');
      shopItem.innerHTML = html;
      shop.appendChild(shopItem);

      return shopItem;
    }

    // ADD RATING WIDGET
    function addRatingWidget(shopItem, data) {
      var ratingElement = shopItem.querySelector('.c-rating');
      var currentRating = data.rating;
      var maxRating = 5;
      var callback = function(rating) { console.log(rating); };
      var r = rating(ratingElement, currentRating, maxRating, callback);
    }

  </script>
  @stop


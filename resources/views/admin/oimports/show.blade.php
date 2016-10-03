@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1>Oimports / Show #{{$oimport->id}}</h1>
</div>

<div class="row">
  <div class="col-md-12">
    <form action="#">
      <div class="row well" style="background-color: #444; color: #eee">
        <div class="col-md-3">
          <div class="form-group">
            <label for="nome">ID</label>
            <p class="form-control-static">{{ $oimport->id }}</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
           <label for="impdate">IMPDATE</label>
           <p class="form-control-static">{{$oimport->impdate}}</p>
         </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
         <label for="impindate">IMPINDATE</label>
         <p class="form-control-static">{{$oimport->impindate}}</p>
       </div>
     </div>
     <div class="col-md-3">
      <div class="form-group">
       <label for="invoicenum">INVOICENUM</label>
       <p class="form-control-static">{{$oimport->invoicenum}}</p>
     </div>
   </div>
   <div class="col-md-3">
    <div class="form-group">
     <label for="totalamount">TOTALAMOUNT</label>
     <p class="form-control-static">{{$oimport->totalamount}}</p>
   </div>
 </div>
 <div class="col-md-3">
  <div class="form-group">
   <label for="user_id">Import By: USER</label>
   <p class="form-control-static">{{$oimport->user_id}}</p>
 </div>
</div>
<div class="col-md-3">
 <div class="form-group">
  <label for="supplier_id">SUPPLIER</label>
  <p class="form-control-static">{{$oimport->supplier_id}}</p>
</div>
</div>
</div>
</form>
<div class="row">
  <div class="col-md-12">
    <div class="well well-sm">
      <h3 class="text-info">Import Details</h3>
    </div>
    <table id="tabledetails" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Other ID</th>
          <th>Other Image</th>
          <th>Other Nane</th>
          <th>Sell Price</th>
          <th>PP Price</th>
          <th>Provice Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($oimport->otherdetails as $product)
        {{-- @foreach($details as $product) --}}
        <tr>
          <td>{{ $product->id }}</td>
          <td>
            @if(count($computer->photos) > 0)
              <img width="70" class="img img-responsive" src="{{$computer->photos->first()->path }}" alt="" data-zoom-image="{{ $computer->photos ? $computer->photos->first()->path : 'images/computers/no-image.jpg' }}">
            @else
              <img class="img img-responsive" src="{{asset('/images/computers/no-image.jpg')}}" alt="" data-zoom-image="{{asset('/images/computers/no-image.jpg')}}">
            @endif
          </td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->sellprice }}</td>
          <td>{{ $product->ppprice }}</td>
          <td>{{ $product->provprice }}</td>
          <td> <a class="btn btn-xs btn-warning btn-serial"  data-id="" data-title="{{ $product->name }}" data-toggle="modal" > <i class="fa fa-external-link fa-fw"></i> View Details</a></td>
        </tr>
        {{-- data-target="#modal-{{ $product->id }}" --}}
        {{-- @endforeach --}}
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12">

    <a class="btn btn-link" href="{{ route('admin.oimports.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>

@endsection
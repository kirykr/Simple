@extends('layouts.admin')
@section('content')

<div class="page-header clearfix">
  <h1> <i class="fa fa-align-justify"></i> Other Imports </h1>
</div>
<div class="row">
  <div class="col-md-12 text-right no-print">{!! $oimports->render() !!}</div>
</div>
<div class="row">
  <div class="col-md-12">
    @if($oimports->count())
    @foreach ($oimports as $other)    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading ">
                      <form action="#">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="nome">ID</label>
                              <p class="form-control-static">{{ $other->id }}</p>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                             <label for="impdate">IMPDATE</label>
                             <p class="form-control-static">{{$other->impdate}}</p>
                           </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form-group">
                           <label for="impindate">IMPINDATE</label>
                           <p class="form-control-static">{{$other->impindate}}</p>
                         </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group">
                         <label for="invoicenum">INVOICENUM</label>
                         <p class="form-control-static">{{$other->invoicenum}}</p>
                       </div>
                     </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="totalamount">TOTALAMOUNT</label>
                       <p class="form-control-static">{{$other->totalamount}}</p>
                     </div>
                   </div>
                   <div class="col-md-3">
                    <div class="form-group">
                     <label for="user_id">Import By: USER</label>
                     <p class="form-control-static">{{$other->user_id}}</p>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                    <label for="supplier_id">SUPPLIER</label>
                    <p class="form-control-static">{{$other->supplier_id}}</p>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
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
          @foreach($other->otherdetails as $product)
          {{-- @foreach($details as $product) --}}
          <tr>
            <td>{{ $product->id }}</td>
            <td>
            @if(count($product->photos) > 0)
                <img id="zoom_03" class="img img-responsive" src="{{$product->photos->first()->path }}" alt="" data-zoom-image="{{ $product->photos ? $product->photos->first()->path : 'images/computers/no-image.jpg' }}">
              @else
                <img id="zoom_03" class="img img-responsive" src="{{asset('/images/computers/no-image.jpg')}}" alt="" data-zoom-image="{{asset('/images/computers/no-image.jpg')}}">
              @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sellprice }}</td>
            <td>{{ $product->ppprice }}</td>
            <td>{{ $product->provprice }}</td>
            <td> <a class="btn btn-xs btn-warning btn-serial no-print"  href="{{route('admin.oimportdetails.show', $product->id) }}" > <i class="fa fa-external-link fa-fw"></i> View Details</a></td>
          </tr>
          {{-- data-target="#modal-{{ $product->id }}" --}}
          {{-- @endforeach --}}
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

</div>
</div>
@endforeach
<div class="row">
  <div class="col-md-3">
    <a class="btn btn-link" href="{{ route('admin.oimports.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 no-print">
    {!! $oimports->render() !!}
  </div>
</div>
@else
<h3 class="text-center alert alert-info">Empty!</h3>
@endif

</div>
</div>

@endsection
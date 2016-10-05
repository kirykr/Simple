@extends('layouts.admin')
@section('content')

<div class="page-header clearfix">
  <h1> <i class="fa fa-align-justify"></i> Cimports </h1>
</div>
<div class="row">
  <div class="col-md-12 text-right no-print">{!! $cimports->render() !!}</div>
</div>
<div class="row">
  <div class="col-md-12">
    @if($cimports->count())
    @foreach ($cimports as $cimport)    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading ">
                      <form action="#">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="nome">ID</label>
                              <p class="form-control-static">{{ $cimport->id }}</p>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                             <label for="impdate">IMPDATE</label>
                             <p class="form-control-static">{{$cimport->impdate}}</p>
                           </div>
                         </div>
                         <div class="col-md-3">
                          <div class="form-group">
                           <label for="impindate">IMPINDATE</label>
                           <p class="form-control-static">{{$cimport->impindate}}</p>
                         </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group">
                         <label for="invoicenum">INVOICENUM</label>
                         <p class="form-control-static">{{$cimport->invoicenum}}</p>
                       </div>
                     </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="totalamount">TOTALAMOUNT</label>
                       <p class="form-control-static">{{$cimport->totalamount}}</p>
                     </div>
                   </div>
                   <div class="col-md-3">
                    <div class="form-group">
                     <label for="user_id">Import By: USER</label>
                     <p class="form-control-static">{{$cimport->user_id}}</p>
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                    <label for="supplier_id">SUPPLIER</label>
                    <p class="form-control-static">{{$cimport->supplier_id}}</p>
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
            <th>Computer ID</th>
            <th>Computer Image</th>
            <th>Computer Nane</th>
            <th>Sell Price</th>
            <th>PP Price</th>
            <th>Provice Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cimport->computerdetails as $product)
          {{-- @foreach($details as $product) --}}
          <tr>
            <td>{{ $product->id }}</td>
            <td><img width="70" src=" {{ $product->photos ? $product->photos->first()->path : '' }} " alt=""></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sellprice }}</td>
            <td>{{ $product->ppprice }}</td>
            <td>{{ $product->provprice }}</td>
            <td> <a class="btn btn-xs btn-warning btn-serial no-print"  href="{{route('admin.cimportdetails.show', $product->id) }}" > <i class="fa fa-external-link fa-fw"></i> View Details</a></td>
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
    <a class="btn btn-link" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 no-print">
    {!! $cimports->render() !!}
  </div>
</div>
@else
<h3 class="text-center alert alert-info">Empty!</h3>
@endif

</div>
</div>

@endsection
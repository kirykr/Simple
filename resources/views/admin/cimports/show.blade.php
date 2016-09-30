@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1>Cimports / Show #{{$cimport->id}}
    <form action="{{ route('admin.cimports.destroy', $cimport->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="btn-group pull-right" role="group" aria-label="...">
        {{-- <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.cimports.edit', $cimport->id) }}"><i class="fa fa-edit"></i> Edit</a> --}}
        <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
      </div>
    </form>
  </h1>
</div>

<div class="row">
  <div class="col-md-12">
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
  <div class="col-md-3">
    <a class="btn btn-link" href="{{ route('admin.cimports.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>

</div>
</div>

{{-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> --}}
@foreach($cimport->computerdetails as $product)

<div class="modal fade" id="modal-{{ $product->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
     {{--    <p><input type="text" class="input-sm" id="txtfname"/></p>
        <p><input type="text" class="input-sm" id="txtlname"/></p> --}}
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-down"></i> Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach

{{-- ============================ --}}

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
  /*if(typeof jQuery!=='undefined'){
    console.log('jQuery Loaded');
  }
  else{
    console.log('not loaded yet');
  }*/

  $(document).ready(function() {

    // $("#myModal").modal("show");
    
    $('#tabledetails tbody tr  td').on('click',function(){
        var productId = $(this).closest('tr').children()[0].textContent
        $("#modal-"+productId).modal("show");
        $(".modal-title").html($(this).closest('tr').children()[2].textContent);
        // $("#txtlname").val($(this).closest('tr').children()[3].textContent);
    });  
    //   var id = $("#txtfname").val($(this).closest('tr').children()[0].textContent);
    //   $.ajax({
    //     method: 'GET',
    //     url: '/admin/cimports/computers/serials/'+ id,
    //     success: function(response) {
    //       if(Array.isArray(response)) {
    //         response.map(function(item) {
    //           console.log(item)
    //           // $(".modal-title").html($(this).closest('tr').children()[2].textContent);
    //           // $("#txtlname").val($(this).closest('tr').children()[3].textContent);
    //         });
    //       }
    //     },
    //     error: function(error) {
    //       console.log(error)
    //     }
    //   });
     
    // });
  });

</script>
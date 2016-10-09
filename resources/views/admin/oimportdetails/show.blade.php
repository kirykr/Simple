@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1>Computer Import Details </h1>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
     <!-- Default panel contents -->
     <div class="panel-heading"><h1>{{$other->name}} <small>Instock: {{$other->qtyinstock}}</small></h1></div>
     <div class="panel-body">
       <p>
         @if(count($other->photos) > 0)
          <img class="img img-responsive" src="{{$other->photos->first()->path }}" alt="" data-zoom-image="{{ $other->photos ? $other->photos->first()->path : 'images/computers/no-image.jpg' }}">
         @else
          <img class="img img-responsive" src="{{asset('/images/computers/no-image.jpg')}}" alt="" data-zoom-image="{{asset('/images/computers/no-image.jpg')}}">
         @endif
       </p>
     </div>

     <!-- Table -->
     <table class="table table-bordered">
       <thead>
         <tr>
           <th style="text-align:center; vertical-align:middle;">Import Info</th>
           <th>
             <div class="table-responsive table-sm table-inverse">
               <table class="table table-hover ">
                <thead class="thead-inverse">
                 <tr>
                   <th  align="center" valign="middle" style="text-align:center; vertical-align:middle;">Import Number</th>
                   <th style="text-align:center; vertical-align:middle;">Import Date</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                  <td>
                    <ul class="list-group">
                      @foreach($other->oimports as $import)
                      <li class="list-group-item">{{$import->invoicenumber}}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td>
                   <ul class="list-group">
                    @foreach($other->oimports as $import)
                    <li class="list-group-item">{{\Carbon\Carbon::parse($import->impdate)->format('l jS \\of F Y h:i:s A')}}</li>
                    @endforeach
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </th>
    </tr>
    <tr>
     <th style="text-align:center; vertical-align:middle;">Color</th>
     <th>
      <div class="table-responsive table-sm table-inverse">
        <table class="table table-hover ">
         <thead class="thead-inverse">
          <tr>
            <th  align="center" valign="middle" style="text-align:center; vertical-align:middle;">Other Color</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           <td>
             <ul class="list-group">
               @foreach($colors as $color)
               <li class="list-group-item" style="background-color: {{$color->name}}; color: #fff; font-weight: bold;">{{strtolower($color->name)}}</li>
               @endforeach
             </ul>
           </td>
         </tr>
       </tbody>
     </table>
   </div>
 </th>

</tr>
</thead>
<tbody>
 <tr>
   <td></td>
 </tr>
 <tr>
   <td></td>
 </tr>
</tbody>
</table>
</div> 
</div>
</div>
<div class="row">
  <div class="col-md-3">
    <a class="btn btn-link" href="{{ route('admin.oimportdetails.index') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">

</script>
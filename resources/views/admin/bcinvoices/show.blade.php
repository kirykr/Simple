@extends('layouts.admin')
@section('header')
<div class="page-header">
        <h1>Bcinvoices / Show #{{$bcinvoice->id}}</h1>
        {{-- <form action="{{ route('admin.invoices.destroy', $bcinvoice->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.invoices.edit', $bcinvoice->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form> --}}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Product_Name</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                      <?php $i=0;
                            $tamount=0;
                            $amount=0;
                         ?>
                        @foreach( $bcinvoice->bcinvoicedetails as $detail)
                        <tr>
                            <td>
                                <?php  
                                        echo $i+1 ;
                                      
                                ?>  
                            </td>
                            <td>{{ $detail->pro->name }}</td>
                            <td>{{ $detail->description }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td><?php echo '$' ?>{{ $detail->price }}</td>
                            <td class="text-right"><?php echo '$' ?>{{ $detail->amount }}</td>
                             <?php  $i++ 
                             ?>
                         </tr>
                        @endforeach
                     
                      </tbody>
                    </table>
            </div>
            {{-- <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="indate">INDATE</label>
                     <p class="form-control-static">{{$bcinvoice->indate}}</p>
                </div>
                    <div class="form-group">
                     <label for="tamount">TAMOUNT</label>
                     <p class="form-control-static">{{$bcinvoice->tamount}}</p>
                </div>
                    <div class="form-group">
                     <label for="discount">DISCOUNT</label>
                     <p class="form-control-static">{{$bcinvoice->discount}}</p>
                </div>
                    <div class="form-group">
                     <label for="subtotal">SUBTOTAL</label>
                     <p class="form-control-static">{{$bcinvoice->subtotal}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$bcinvoice->user_id}}</p>
                </div>
            </form>
 --}}
            

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    {!! Form::label('subtotal','TOTAL:',[])!!}
                </div>
                <div class="col-md-2">
                    {!! Form::open() !!}
                    {!! Form::text('tamount','$'.$bcinvoice->tamount,['class'=>'form-control','style'=>'text-align:right;'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    {!! Form::label('subtotal','DISCOUNT:',[])!!}
                </div>
                <div class="col-md-2">
                    {!! Form::open() !!}
                    {!! Form::text('discount',(100*$bcinvoice->discount).'%',['class'=>'form-control','style'=>'text-align:right;'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    {!! Form::label('subtotal','SUBTOTAL:',[])!!}
                </div>
                <div class="col-md-2">
                    {!! Form::open() !!}
                    {!! Form::text('subtotal','$'.$bcinvoice->subtotal,['class'=>'form-control','style'=>'text-align:right;'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 well well-sm">
            <a class="btn btn-link" href="{{ route('admin.invoices.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
        </div>
    </div>
    </div>
@endsection
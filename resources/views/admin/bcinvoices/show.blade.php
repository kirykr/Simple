@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="print">
    <div class="page-header">
        <h1>SL5 Computer Shop</h1>
        <h1>Invoices #{{$bcinvoice->id}}</h1>
    </div>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>TAmount</td>
                            <td class="text-right">{{'$'.$bcinvoice->tamount}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Discount</td>
                            <td class="text-right">{{(100*$bcinvoice->discount).'%'}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Subtotal</td>
                            <td class="text-right">{{ '$'.$bcinvoice->subtotal }}</td>
                        </tr>
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
    <br/>
    
    <div class="row">
        <div class="col-md-12 well well-sm">
            <a class="btn btn-link" href="{{ route('admin.bcinvoices.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
        </div>
    </div>
    </div>

@stop
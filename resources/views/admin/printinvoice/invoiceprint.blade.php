<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print_Inovice</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/js/jquery.printarea.js"></script>
    <script type="text/javascript">
     $(document).ready(function(e){
        var mode = 'iframe';
        var close= mode=="popup";
        var options = { mode:mode,popClose : close };
        $('div.print').printArea(options);
      });
 </script>
 <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="print">
    <div class="page-header">
        <div class="" style="font-size: 20px;text-shadow: 0px 0px 5px rgba(150, 150, 150, 1); font-weight: 700">
              <i class="fa fa-home fa-fw"></i><span style="color: #5daad0">e</span>Commerce sl5
        </div>
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
    </div>
        <div class="row">
        <div class="col-md-12 well well-sm">
            <a class="btn btn-link dontprint" href="{{ route('admin.bcinvoices.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
        </div>
    </div>
</body>
</html>



{{--     <div class="row">
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
    </div> --}}
    
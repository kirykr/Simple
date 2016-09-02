@extends('layouts.admin')
@section('content')

<div class="page-header">
  <h1><i class="fa fa-edit"></i> Computers / Edit #{{$computer->id}}</h1>
</div>

@include('error')

<div class="row">
  <div class="col-md-12">

    {{-- <form action="{{ route('admin.computers.update', $computer->id) }}" method="POST">  --}}   
    {!! Form::model($computer,['action' => ['ComputerController@update', $computer->id], 'method' => 'PATCH', 'files'=>true]) !!}
            {{--
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                --}}     
               {{--  {!! Form::label('comcode', 'Computer Code') !!}
                <div class="form-group {{ $errors->has('comcode') ? 'has-error' :'' }}">
                  {!! Form::text('comcode',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
                  {!! $errors->first('comcode','<span class="help-block">:message</span>') !!}
                </div> --}}
                <div class="row">
                  <div class="col-md-4">
                   {{-- for Computer Name --}}
                   {!! Form::label('name', 'Computer Name') !!}
                   <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Computer Name']) !!}
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
               <div class="col-md-2">
        {!! Form::label('sellprice', 'Sell Price') !!}
        <div class="form-group {{ $errors->has('sellprice') ? 'has-error' :'' }}">
          {!! Form::number('sellprice',0,['class'=>'form-control','step'=>'any','placeholder'=>'Computer sellprice']) !!}
          {!! $errors->first('sellprice','<span class="help-block">:message</span>') !!}
        </div>
      </div>
       <div class="col-md-2">
        {!! Form::label('ppprice', 'PP Price') !!}
        <div class="form-group {{ $errors->has('ppprice') ? 'has-error' :'' }}">
          {!! Form::number('ppprice',0,['class'=>'form-control','step'=>'any','placeholder'=>'Computer ppprice']) !!}
          {!! $errors->first('ppprice','<span class="help-block">:message</span>') !!}
        </div>
      </div>
       <div class="col-md-2">
        {!! Form::label('provprice', 'Province Price') !!}
        <div class="form-group {{ $errors->has('provprice') ? 'has-error' :'' }}">
          {!! Form::number('provprice',0,['class'=>'form-control','step'=>'any','placeholder'=>'Computer provprice']) !!}
          {!! $errors->first('provprice','<span class="help-block">:message</span>') !!}
        </div>
      </div>
       <div class="col-md-2">
        {!! Form::label('status', 'Status') !!}
        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
          {!! Form::number('status',0,['class'=>'form-control','step'=>'any','placeholder'=>'Computer status']) !!}
          {!! $errors->first('status','<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-md-4">
        {!! Form::label('name', 'Computer Specs') !!}
        <div class="form-group">
          <a class="btn btn-block btn-success" data-toggle="modal" href='#modal-id'>Add Specs</a>
        </div>
      </div>
              </div>
              {!! Form::label('photo_id', 'Computer Picture') !!}
              <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }}">
                {!! Form::file('photo_id',null,['class'=>'','placeholder'=>'Computer photo_id']) !!}
                {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!}
              </div>
              <div class="row">
              <div class="col-md-3">
                  {!! Form::label('brand_id', 'Computer Brand') !!}
                  <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
                    {!! Form::select('brand_id',[''=>'Choose Options']+ $brands,0,['class'=>'form-control']) !!}
                    {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="col-md-3">
                  {!! Form::label('type_id', 'Computer Type') !!}
                  <div class="form-group {{ $errors->has('type_id') ? 'has-error' :'' }}">
                    {!! Form::select('type_id',[''=>'Choose Options'],0,['class'=>'form-control', 'id' => 'computer_type']) !!}
                    {!! $errors->first('type_id','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="col-md-3">
                  {!! Form::label('category_id', 'Computer Categories') !!}
                  <div class="form-group {{ $errors->has('category_id') ? 'has-error' :'' }}">
                    {!! Form::select('category_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                    {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="col-md-3">
                  {!! Form::label('model_id', 'Computer Model') !!}
                  <div class="form-group {{ $errors->has('model_id') ? 'has-error' :'' }}">
                    {!! Form::select('model_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
                    {!! $errors->first('model_id','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
              </div>
              <div class="well well-sm">
                {{--  <button type="submit" class="btn btn-primary">Save</button> --}}
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-link pull-right" href="{{ route('admin.computers.index') }}"><i class="fa fa-backward"></i>  Back</a>
              </div>
            </form>
            {!! Form::close() !!}

          </div>
        </div>
        @endsection
        @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
        <script>
          $('.date-picker').datepicker({
          });
         
</script>
@endsection

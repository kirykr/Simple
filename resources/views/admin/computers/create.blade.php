  @extends('layouts.admin')
  @section('content')

  <div class="page-header">
    <h1><i class="fa fa-plus"></i> Computers / Create </h1>
  </div>

  @include('error')

  <div class="row">
    <div class="col-md-12">

      {{-- <form action="{{ route('admin.computersController.store') }}" method="POST"> --}}    
      {!! Form::open(['action'=>"ComputerController@store", 'files' => true, 'enctype' => 'multipart/form-data' ]) !!}

      <div class="row">
        <div class="col-md-4">
         {{-- for Computer Name --}}
         {!! Form::label('name', 'Computer Name') !!}
         <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
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
        {{-- 
        <div class="col-md-4">
          {!! Form::label('name', 'Computer Specs') !!}
          <div class="form-group">
            <a class="btn btn-block btn-success" data-toggle="modal" href='#modal-id'>Add Specs</a>
          </div>
        </div>
        --}}
      </div>

      {!! Form::label('photo_id', 'Computer Picture') !!}
      <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }} ">
        {{-- {!! Form::file('photo_id',null,['class'=>'file', 'id'=>'input-id', 'data-preview-file-type'=>'text']) !!} --}}
        {!! Form::file('photo_id[]', ['multiple'=>'true', 'class'=>'file-loading', 'id'=>'input-pd']) !!}
        {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!} 
      </div>
    {{-- <div class="form-group">
      {!! Form::label('photo_id', 'Computer Picture') !!}
      <input id="input-pd" name="photo_id[]" type="file" multiple class="file-loading">
    </div> --}}

    <div class="row">
      <div class="col-md-3">
        {!! Form::label('brand_id', 'Computer Brand') !!}
        <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
          {!! Form::select('brand_id',[''=>'Choose Options']+ $brands,0,['class'=>'form-control','id'=>'computer_brand']) !!}
          {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-md-3">
        {!! Form::label('type_id', 'Computer Type') !!}
        <div class="form-group {{ $errors->has('type_id') ? 'has-error' :'' }}">
          {!! Form::select('type_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
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
      <button type="submit" class="btn btn-primary">Create</button>
      <a class="btn btn-link pull-right" href="{{ route('admin.computers.index') }}"><i class="fa fa-backward"></i> Back</a>
    </div>
    {!! Form::close() !!}
    {{-- </form> --}}
  </div>
</div>
{{-- Table Import --}}

<div class="row">
  <div class="col-md-12">
    @if($computers->count())
    <table class="table table-condensed table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>PHOTO</th>
          <th>NAME</th>
          <th>QTY</th>
          <th>PRICE</th>
          <th>BRAND</th>
          <th>PP PRICE</th>
          <th>PRO PRICE</th>
          <th>STATUS</th>
          <th class="text-right">OPTIONS</th>
        </tr>
      </thead>

      <tbody>
        @foreach($computers as $computer)
        <tr>
          <td>{{$computer->id}}</td>
          {{-- {{ dd( $computer->photos->first()->path ) }} --}}
          <td><img width="70" src=" {{ $computer->photos ? $computer->photos->first()->path : '' }} " alt=""></td>
          <td>{{$computer->name}}</td>
          <td>{{$computer->qtyinstock}}</td>
          <td>{{$computer->sellprice}}</td>
          <td>{{$computer->brand_id}}</td>
          <td>{{$computer->ppprice}}</td>
          <td>{{$computer->provprice}}</td>
          <td>{{$computer->status}}</td>
          <td class="text-right text-nowrap">
          @if($computer->specs->count() <= 0)
            <a class="btn btn-xs btn-default" href="{{ route('admin.computers.show', $computer->id) }}"><i class="fa fa-plus"></i> Add Specs</a>
          @else
             <a class="btn btn-xs btn-success" href="{{ route('admin.computers.show', $computer->id) }}"><i class="fa fa-eye"></i> View Specs</a>
          @endif
            <a class="btn btn-xs btn-warning" href="{{ route('admin.computers.edit', $computer->id) }}"><i class="fa fa-edit"></i> Edit</a>
            <form action="{{ route('admin.computers.destroy', $computer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $computers->render() !!}
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

  </div>
</div>

{{--  Model Start --}}
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Computer Specs</h4>
      </div>
      <div class="modal-body">
       <div class="row text-center">
        <div class="control-group" id="fields">
          <label class="control-label" for="field1">Nice Multiple Form Fields</label>
          <div class="controls"> 
            <form role="form" autocomplete="off">
              <div class="entry input-group col-md-7 col-md-offset-2 col-xs-3">
                <input class="form-control" name="specs[]" type="text" placeholder="Type something" />
                <span class="input-group-btn">
                  <button class="btn btn-success btn-add" type="button">
                    <span class="fa fa-plus"></span>
                  </button>
                </span>
              </div>
            </form>
            <br>
            <small>Press <span class="fa fa-plus gs"></span> to add another form field :)</small>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="button" class="btn btn-primary">Save & Close</button>
    </div>
  </div>

</div>
</div>
{{-- Model end --}}
@section('footer')
@stop
@endsection
@section('scripts')
{{-- <script src="{{asset('js/libs.js')}}"></script> --}}
<script type="text/javascript">
  $('#modal-id').on('shown.bs.modal', function () {
   // do something…
   
 })

  $(function(){
    $(document).on('click', '.btn-add', function(e) {
      e.preventDefault();

      var controlForm = $('.controls form:first'),
      currentEntry = $(this).parents('.entry:first'),
      newEntry = $(currentEntry.clone()).appendTo(controlForm);

      newEntry.find('input').val('');
      controlForm.find('.entry:not(:last) .btn-add')
      .removeClass('btn-add').addClass('btn-remove')
      .removeClass('btn-success').addClass('btn-danger')
      .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
      $(this).parents('.entry:first').remove();

      e.preventDefault();
      return false;
    });
  });
</script>
@endsection

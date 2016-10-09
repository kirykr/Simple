<div class="modal large fade" id="computer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Create Computer</h3>
      </div>
      <div class="modal-body">
        {{-- ================================================================= --}}
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
                </div>
                <div class="row">
                  <div class="col-md-12" style="hight: 100px">
                    {!! Form::label('photo_id', 'Computer Picture') !!}
                    <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }} ">
                      {{-- {!! Form::file('photo_id',null,['class'=>'file', 'id'=>'input-id', 'data-preview-file-type'=>'text']) !!} --}}
                      {!! Form::file('photo_id[]', ['multiple'=>'true', 'class'=>'file-loading', 'id'=>'input-pd', 'height'=>'100px']) !!}
                      {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!} 
                    </div>
                  </div>
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
                <a class="btn btn-default pull-right" href="{{ route('admin.computers.index') }}"><i class="fa fa-backward"></i> Back</a>
              </div>
              {!! Form::close() !!}
              {{-- </form> --}}
            </div>
          </div>

        {{-- ================================================================ --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
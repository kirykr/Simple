<div class="modal large fade" id="color">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Create Color</h3>
      </div>
      <div class="modal-body">
        {{-- ================================================================= --}}
          <div class="row">
              <div class="col-md-12">

              {{-- <form action="{{ route('admin.colorsController.store') }}" method="POST"> --}}    
                  {!! Form::open(['action'=>"ColorController@store", 'method'=>"POST",'files'=>true]) !!}
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
        {{-- for Computer Name --}}
                       {!! Form::label('name', 'Computer Name') !!}
                       <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                      </div>
                        
                    {!! Form::label('description', 'Color Description') !!}
                    <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                      {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Brand desc', 'rows'=>3]) !!}
                      {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                   </div>
                      <div class="well well-sm">
                          <button type="submit" class="btn btn-primary">Create</button>
                          <a class="btn btn-link pull-right" href="{{ route('admin.colors.index') }}"><i class="fa fa-backward"></i> Back</a>
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
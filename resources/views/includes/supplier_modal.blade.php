<div class="modal large fade" id="suppler">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Create Supplier</h3>
      </div>
      <div class="modal-body">
        {{-- ================================================================= --}}
         <div class="row">
           <div class="col-md-12">

             {{-- <form action="{{ route('admin.suppliersController.store') }}" method="POST"> --}}    
             {!! Form::open(['action'=>"SupplierController@store", 'method'=>"POST",'files'=>true]) !!}
             {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   

             <div class="col-md-4">
              <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="name-field">Name</label>
                <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
                @endif
              </div>
            </div>
            <div class="col-md-4">

             <div class="form-group @if($errors->has('contactperson')) has-error @endif">
              <label for="contactperson-field">Contactperson</label>
              <input type="text" id="contactperson-field" name="contactperson" class="form-control" value="{{ old("contactperson") }}"/>
              @if($errors->has("contactperson"))
              <span class="help-block">{{ $errors->first("contactperson") }}</span>
              @endif
            </div>
          </div>
          <div class="col-md-4">
           <div class="form-group @if($errors->has('tel')) has-error @endif">
            <label for="tel-field">Tel</label>
            <input type="text" id="tel-field" name="tel" class="form-control" value="{{ old("tel") }}"/>
            @if($errors->has("tel"))
            <span class="help-block">{{ $errors->first("tel") }}</span>
            @endif
          </div>
         </div>
         <div class="col-md-12">
           <div class="form-group @if($errors->has('address')) has-error @endif">
            <label for="address-field">Address</label>
            <textarea class="form-control" id="address-field" rows="3" name="address">{{ old("address") }}</textarea>
            @if($errors->has("address"))
            <span class="help-block">{{ $errors->first("address") }}</span>
            @endif
           </div>
         </div>
         <div class="well well-sm">
           <button type="submit" class="btn btn-primary">Create</button>
           <a class="btn btn-link pull-right" href="{{ route('admin.suppliers.index') }}"><i class="fa fa-backward"></i> Back</a>
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
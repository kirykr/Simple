  @extends('layouts.admin')
  @section('content')

  <div class="page-header">
    <h1><i class="fa fa-plus"></i> Computers / Create </h1>
  </div>

  @include('error')

  <div class="row">
    <div class="col-md-12">

      {{-- <form action="{{ route('admin.computersController.store') }}" method="POST"> --}}    
      {!! Form::open(['action'=>"ComputerController@store", 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'book-image' ]) !!}
      {{-- , 'class' => 'dropzone', 'id' => 'book-image' --}}
      {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
      {{-- error for Computer Code --}}
     {{--  {!! Form::label('comcode', 'Computer Code') !!}
      <div class="form-group {{ $errors->has('comcode') ? 'has-error' :'' }}">
        {!! Form::text('comcode',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
        {!! $errors->first('comcode','<span class="help-block">:message</span>') !!}
      </div> --}}
      <div class="row">
        <div class="col-md-6">
         {{-- for Computer Name --}}
         {!! Form::label('name', 'Computer Name') !!}
         <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Computer Code']) !!}
          {!! $errors->first('name','<span class="help-block">:message</span>') !!}
        </div>

      </div>
      <div class="col-md-3">
        {!! Form::label('qtyinstock', 'Quantiy Instock') !!}
        <div class="form-group {{ $errors->has('qtyinstock') ? 'has-error' :'' }}">
          {!! Form::number('qtyinstock',null,['class'=>'form-control','placeholder'=>'Computer qtyinstock']) !!}
          {!! $errors->first('qtyinstock','<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-md-3">
        {!! Form::label('sellprice', 'Sell Price') !!}
        <div class="form-group {{ $errors->has('sellprice') ? 'has-error' :'' }}">
          {!! Form::number('sellprice',null,['class'=>'form-control','step'=>'any','placeholder'=>'Computer sellprice']) !!}
          {!! $errors->first('sellprice','<span class="help-block">:message</span>') !!}
        </div>
      </div>
    </div>
    {!! Form::label('photo_id', 'Computer Picture') !!}
   {{--  <div class="form-group {{ $errors->has('photo_id') ? 'has-error' :'' }} ">
      {!! Form::file('photo_id',null,['class'=>'','placeholder'=>'Computer photo_id']) !!}
      {!! $errors->first('photo_id','<span class="help-block">:message</span>') !!}
    </div> --}}
    <div class="dropzone" id="book-image">
      <div class="dz-message">
        <h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>
      </div>

      <div class="fallback">
          {{-- <input name="file" type="file" multiple /> --}}
      </div>

      <div class="dropzone-previews" id="dropzonePreview"></div>
    </div>
     
    <div class="row">
    <div class="col-md-3">
      {!! Form::label('type_id', 'Computer Type') !!}
      <div class="form-group {{ $errors->has('type_id') ? 'has-error' :'' }}">
        {!! Form::select('type_id',[''=>'Choose Options'] + $types,3,['class'=>'form-control','id'=>'computer_type']) !!}
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
      {!! Form::label('brand_id', 'Computer Brand') !!}
      <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
        {!! Form::select('brand_id',[''=>'Choose Options'],0,['class'=>'form-control']) !!}
        {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
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

@endsection
@section('scripts')
{{-- <script src="{{asset('js/libs.js')}}"></script> --}}

<script type="scripts/text">

  $(document).ready(function() {

    // $('.date-picker').datepicker({
    // });
    $('#computer_type').on('change', function(e) {
      var type = $(this).val();
      if(type) 
        getComputerCategories(type);
    });

    function getComputerCategories(typeId) {
      $.ajax({
        method: 'GET',
        url: '/admin/api/v1/types/'+ typeId + '/categories',
        success: function(response) {
          $('#category_id').empty();
          response.map(function(item) {

            var option = "<option value="+item.id+">"+ item.name +"</option>";
            $('#category_id').append(option);
          });
        },
        error: function(error) {
          console.log(error)
        }
      })
    }

    // Dropzone.options.myUploadForm = {
    //     success: function(event, response) {
    //         $('.myForm').append("<input type='hidden' name='image_ids[]' value='"+response.photo_id+"' />");
    //     }
    // };

    (function() {
    Dropzone.options.bookImage = {
        paramName           :       "image", // The name that will be used to transfer the file
        maxFilesize         :       2, // MB
        dictDefaultMessage  :       "Drop File here or Click to upload Image",
        thumbnailWidth      :       "300",
        thumbnailHeight     :       "300",
        accept              :       function(file, done) { done() },
        success             :       uploadSuccess,
        complete            :       uploadCompleted
    };

    function uploadSuccess(data, file) {
        var messageContainer    =   $('.dz-success-mark'),
            message             =   $('<p></p>', {
                'text' : 'Image Uploaded Successfully! Image Path is: '
            }),
            imagePath           =   $('<a></a>', {
                'href'  :   JSON.parse(file).original_path,
                'text'  :   JSON.parse(file).original_path,
                'target':   '_blank'
            })

        imagePath.appendTo(message);
        message.appendTo(messageContainer);
        messageContainer.addClass('show');
    }

    function uploadCompleted(data) {
        if(data.status != "success")
        {
            var error_message   =   $('.dz-error-mark'),
                message         =   $('<p></p>', {
                    'text' : 'Image Upload Failed'
                });

            message.appendTo(error_message);
            error_message.addClass('show');
            return;
        }
    }
  })();

})


    // dropzone ============================================
   
    </script>
    @endsection

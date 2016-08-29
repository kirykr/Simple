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

<script type="text/javascript">

  $(document).ready(function() {
    // image loader
      $("#input-pd").fileinput({
    uploadUrl: "/file-upload-batch/1",
    uploadAsync: false,
    minFileCount: 2,
    maxFileCount: 5,
    overwriteInitial: false,
    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
    // initialPreviewConfig: [
    //     {caption: "Desert.jpg", size: 827000, width: "120px", url: "/file-upload-batch/2", key: 1},
    //     {caption: "Lighthouse.jpg", size: 549000, width: "120px", url: "/file-upload-batch/2", key: 2}, 
    //     {type: "video", size: 375000, filetype: "video/mp4", caption: "KrajeeSample.mp4", url: "/file-upload-batch/2", key: 3}, 
    //     {type: "pdf", size: 8000, caption: "About.pdf", url: "/file-upload-batch/2", key: 4},
    //     {type: "text", size: 1430, caption: "LoremIpsum.txt", url: "/file-upload-batch/2", key: 5}, 
    //     {type: "html", size: 3550, caption: "LoremIpsum.html", url: "/file-upload-batch/2", key: 6}
    // ],
    purifyHtml: true, // this by default purifies HTML data for preview
    uploadExtraData: {
        img_key: "1000",
        img_keywords: "happy, places",
    }
}).on('filesorted', function(e, params) {
    console.log('File sorted params', params);
}).on('fileuploaded', function(e, params) {
    console.log('File uploaded params', params);
});

    // =====================================================================
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

    // dropzone ============================================

    var baseUrl = "{{ url('/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
      url: baseUrl + "/dropzone/uploadFiles",
      params: {
        _token: token
      }
    });
    Dropzone.options.myAwesomeDropzone = {
            paramName: "photo_id", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {

            },
          };
        })

      </script>
      @endsection

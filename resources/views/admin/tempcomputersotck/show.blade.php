@extends('layouts.admin')
@section('content')
<div class="page-header">
  <h1>Add Serial Number</h1>

</div>
<div class="row">
  <div class="col-md-12">
    @if (Session::has('flash_message'))
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Waring!</strong> 
        <p>{{ Session::get('flash_message') }} </p>
    </div>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    {!! Form::open(['action'=>"TempcomputersotckController@store", 'method'=>"POST",'files'=>true, 'id' => 'serailvalidate', 'data-toggle'=>"validator"]) !!}
    {{-- for Computer Name --}}
    {!! Form::hidden('tempcomputer_id', $tempcomputer->id, []) !!}
    <div class="row">
      <div class="col-md-3">
        {!! Form::label('computer_name', 'Computer Name') !!}
        <div class="form-group {{ $errors->has('computer_name') ? 'has-error' :'' }}">
          {!! Form::text('computer_name',$tempcomputer->computer_name,['class'=>'form-control', 'readonly'=> true]) !!}
          {!! Form::hidden('computer_id', $tempcomputer->computer_id, []) !!}
          {!! $errors->first('computer_name','<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-md-3">
       {!! Form::label('color_name', 'Computer Name') !!}
       <div class="form-group {{ $errors->has('color_name') ? 'has-error' :'' }}">
        {!! Form::text('color_name',$tempcomputer->color_name,['class'=>'form-control', 'readonly'=> true]) !!}
        {!! Form::hidden('color_id', $tempcomputer->color_id, []) !!}
        {!! $errors->first('color_name','<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="col-md-3">
     {!! Form::label('qty', 'Computer QTYs') !!}
     <div class="form-group {{ $errors->has('qty') ? 'has-error' :'' }}">
      {!! Form::text('qty',$tempcomputer->qty,['class'=>'form-control', 'readonly'=> true]) !!}
      {!! $errors->first('qty','<span class="help-block">:message</span>') !!}
    </div>
  </div>
</div>
<div class="row">
  @for($i = 0; $i < $tempcomputer->qty; $i++)
  <div class="col-md-3">
   {!! Form::label('qty', 'Serial number ' . ($i+1)) !!}
   <div class="form-group {{ Session::has('flash_message') ? 'has-error' : '' }}">
    {!! Form::text('serialnumber[]',null,['class'=>'form-control unique  required', 'required'=>"required", 'data-minlength' => "7", 'data-unique' => "unique", 'onclick' => "checkTextBoxes()", 'placeholder' => 'Add Serialnumber here']) !!}
    <div class="help-block with-errors"></div>
    {!! $errors->first('Serial number','<span class="help-block">:message</span>') !!}
  </div>
</div>
@endfor
</div>

<div class="well well-sm">
  <button type="submit" value="saveserail" name="saveserail" class="btn btn-success"><i class="fa fa-save" id="btn-submit" onclick="checkTextBoxes()"></i> Save </button>
  <a class="btn btn-link pull-right" href="{{ route('admin.cimports.create') }}"><i class="fa fa-backward"></i> Back</a>
</div>
{!! Form::close() !!}   
</div> 
</div>


@endsection
<script type="text/javascript">

  $('#serailvalidate').validator(
  {
    delay: 100,
    custom: {
      unique: function ($el) {
        var newDevice = $el.val().trim();
        return isUniqueDevice(newDevice)
      }
    },
    errors: {
      unique: "This Device is already exist"
    }
  }
  );



function checkTextBoxes() {

    var form = document.getElementById("serailvalidate");
      // Start by looping through each text element one by one
      for (i = 0; i < form.elements.length; i++) {
          // For each element, check if it is a text box element
    if (form.elements[i].type == "text" && form.elements[i].type !== '') {
    // If so, get its value

    var text1 = form.elements[i].value;
    // now loop through remaining elements, checking if they are text anget their val

    for (j = i + 1; j < form.elements.length; j++) {

      if (form.elements[j].type == "text") {
        var text2 = form.elements[j].value;

              // If the value being compared is equal to any other text elements, show an alert

              if (text1 == text2 && text1 !== '' && text2 !== '') {
                alert("Duplicate found! Element: " + i + " and Element: " + j);

              }
            }
          }
        }
      }
}

</script>
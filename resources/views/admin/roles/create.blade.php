@extends('layouts.admin')
@section('header')
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Roles / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

        {{-- <form action="{{ route('admin.rolesController.store') }}" method="POST"> --}}    
            {!! Form::open(['action'=>"RoleController@store", 'method'=>"POST",'files'=>true]) !!}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}   
              <div class="row">
              <div class="col-md-4">
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Role Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group @if($errors->has('display_name')) has-error @endif">
                       <label for="display_name-field">Role display_name</label>
                    <input type="text" id="display_name-field" name="display_name" class="form-control" value="{{ old("display_name") }}"/>
                       @if($errors->has("display_name"))
                        <span class="help-block">{{ $errors->first("display_name") }}</span>
                       @endif
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Role Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                </div>
              </div>
                <div class="row">
                 <div class="col-md-8">
                   {!! Form::label('brand_id', 'Computer Brand') !!}
                   <div class="form-group {{ $errors->has('brand_id') ? 'has-error' :'' }}">
                     {!! Form::select('permissions[]', $permissions,0,['class'=>'form-control selectpicker','id'=>'permission_id', 'multiple'=>"multiple"]) !!}
                     {!! $errors->first('brand_id','<span class="help-block">:message</span>') !!}
                   </div>
                 </div>
                 </div>
                <hr><br><br>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.roles.index') }}"><i class="fa fa-backward"></i> Back</a>
                </div>
            {!! Form::close() !!}
            {{-- </form> --}}

        </div>
    </div>
@endsection
@section('scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> --}}
  <script type="text/javascript">
    $('.date-picker').datepicker({
    });

    $("#permission_id").select2({
      placeholder: "Select more module",
      allowClear: true
    });
// check all uncheck all
    // $("#checkAll").change(function () {
    // $("input:checkbox").prop('checked', $(this).prop("checked"));
    // });

    $(function() {
    $("input[type=checkbox]").change(function() {
        var count_checkbox_all = $("input[type=checkbox]").not(".select_all").length;
        var count_checkbox_checked = $("input[type=checkbox]:checked").not(".select_all").length;

        if ($(this).hasClass("select_all")) { 
            //if we clicked on "Select All"
            var is_checked = $(".select_all").is(":checked");
            //check/uncheck everything and disable/enable the rest of the tickboxes based on the state of this one
            $(".categories_list").prop("checked", is_checked).attr("disabled",  is_checked);
            
            //also update the count of checked items
            count_checkbox_checked = $("input[type=checkbox]:checked").not(".select_all").length;
        }
        
        if (count_checkbox_checked == count_checkbox_all) { //if all have been checked
            //make sure they are disabled and that "Select All" is checked as well
            $(".categories_list").attr("disabled",  true);
            $(".select_all").prop("checked", true);
        }
        
    });   
});
    //// get checked checkbox value
    // $('input').on('click', function(){
    // var selected = [];
    // $('.data input:checked').each(function() {
    //      selected.push($(this).val());
    // });

    //Or
    /*
    var checkboxes = document.getElementsByName('employee');
    var selected = [];
      for (var i=0; i<checkboxes.length; i++) {
         if (checkboxes[i].checked) {
            selected.push(checkboxes[i].value);
         }
      }
    */
      // alert(selected);
    // });
  </script>
@endsection

@extends('layouts.admin')
@section('content')
<div class="page-header">
    <h1>Computers / Show #{{$computer->id}}</h1>
   
</div>

<div class="row">
    <div class="col-md-4" style="border-right: 1px solid #999">
            <div class="form-group">
                <label for="nome">ID</label>
                <p class="form-control-static">{{$computer->id}}</p>
            </div>
            <div class="form-group">
               <label for="name">NAME</label>
               <p class="form-control-static">{{$computer->name}}</p>
           </div>
           <div class="form-group">
               <label for="photo_id">PHOTO_ID</label>
               <p class="form-control-static"><img width="220" src=" {{ $computer->photos ? $computer->photos->first()->path : '' }} " alt=""></p>
           </div>
    </div>
    <div class="col-md-8">
    {!! Form::open(array('class' => 'form-horizontal', 'method' => 'POST', 'action' => array('ComputerSpecsController@store', $computer->id))) !!}
        <div class="col-md-6">
          {!! Form::label('spec_id', 'Spec Name (Ex: CPU, HDD)') !!}
          <div class="form-group {{ $errors->has('spec_id') ? 'has-error' :'' }}">
            {!! Form::select('spec_id',[''=>'Choose Options'] + $specs,0,['class'=>'form-control']) !!}
            {!! $errors->first('spec_id','<span class="help-block">:message</span>') !!}
          </div>
        </div>
        <div class="col-md-6">
           {!! Form::label('spec', 'Add More Specs') !!}
          <div class="form-group">
           <a href="{{ route('admin.specs.create') }}"  class="btn btn-default"><i class="fa fa-plus fa-fw"></i> Add New Specs</a>
           </div>
        </div>
        <div class="col-md-12">
           {!! Form::label('description', 'Description (Ex: CPU: Core i5)') !!}
           <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
            {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Add Spec description here', 'rows' => 3]) !!}
            {!! $errors->first('description','<span class="help-block">:message</span>') !!}
          </div>
        </div>
        <div class="col-md-12 well well-sm">
          <button type="submit" value="addspec" name="addspec" class="btn btn-primary">Save Spec</button>
        </div>
      {!! Form::close() !!}
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Spec Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0;  ?>
            @foreach ($computer->specs as $spec)
              <tr>
                <td>{{ $computer->specs[$i]->name }}</td>
                <td>{{ $spec->pivot->description }}</td>
              </tr>
             <?php $i++; ?>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <a class="btn btn-link" href="{{ route('admin.computers.create') }}"><i class="fa fa-backward"></i>  Back</a>
  </div>
</div>

@endsection
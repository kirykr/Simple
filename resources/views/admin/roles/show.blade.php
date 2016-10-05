@extends('layouts.admin')
@section('header')
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Roles / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
      <div class="row">
          <div class="col-md-12">

              <form action="#">
                  <div class="form-group">
                      <h3>Role Name: {{$role->name}}</h3>

                  </div>
                  <div class="tags">
                    <h4>Modules:</h3>

                        
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($role->modules as $mo)
                                    <tr>
                                        <td>{{$mo->id}}</td>
                                        <td>{{$mo->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>

              </form>


              <a class="btn btn-link" href="{{ route('admin.roles.index') }}"><i class="fa fa-backward"></i>  Back</a>

          </div>
      </div>

    </div>
@endsection
@section('scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> --}}
  <script>
    $('.date-picker').datepicker({
    });
    $('.select2-multi').select2();

  </script>
@endsection

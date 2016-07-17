@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="fa fa-align-justify"></i> Tweets
            <a class="btn btn-success pull-right" href="{{ route('tweets.create') }}"><i class="fa fa-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        
            @if($tweets->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                        <th>BODY</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tweets as $tweet)
                            <tr>
                                <td>{{$tweet->id}}</td>
                                <td style="width: 200px;">{{$tweet->title}}</td>
                            <td  style="width: 700px">{{$tweet->body}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('tweets.show', $tweet->id) }}"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tweets.edit', $tweet->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST" style="display: inline;" onsubmit="" id="delete-btn">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tweets->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>
{{-- ========================================== --}}

@endsection
{{-- <script src="{{asset('js/libs.js')}}"></script> --}}
@section('scripts')
  @if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>

@endif
@endsection

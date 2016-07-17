@extends('layouts.admin')
@section('content')
{{-- @section('header') --}}
<div class="page-header clearfix">
    <h1>
        <i class="fa fa-align-justify"></i> Posts
        <a class="btn btn-success pull-right" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus"></i> Create</a>
    </h1>

</div>
{{-- @endsection --}}


<div class="row">
    <div class="col-md-12">
        @if($posts->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PHOTO</th>
                    <th>USER</th>
                    <th>CATEGORY</th>
                    <th>TITLE</th>
                    <th>BODY</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img width="50" src="{{$post->photo ? $post->photo->path : 'http://placeholder.it/400x400'}}" alt=""> </td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategoried' }}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td class="text-right" style="width: 180px">
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.posts.show', $post->id) }}"><i class="fa fa-eye"></i> View</a>
                        <a class="btn btn-xs btn-warning" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $posts->render() !!}
        @else
        <h3 class="text-center alert alert-info">Empty!</h3>
        @endif

    </div>
</div>

@endsection
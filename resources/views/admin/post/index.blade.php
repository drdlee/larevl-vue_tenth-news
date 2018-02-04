@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Manage Posts</div>

        <div class="panel-body">
            <a href="{{route('post.create')}}" class="btn btn-success">Create New Post</a>
        </div>
    </div>
        
@endsection

@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Create New Post</div>

        <div class="panel-body">
            <form action="{{route('post.store')}}" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="add the title ..">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" cols="30" rows="10" placeholer="write some content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Create Post</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
        
@endsection

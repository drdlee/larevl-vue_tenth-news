@extends('layouts.app')
@section('content')
@include('layouts.errors')
        
    <div class="panel panel-default">
        <div class="panel-heading">Edit Post: <strong><u>{{$post->title}}</u></strong></div>

        <div class="panel-body">
            <form action="{{route('post.update', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{$post->title}}" name="title" class="form-control" placeholder="add the title ..">
                </div>
                <blockquote>
                    <h6>current image</h6>
                    <img src="{{asset($post->image)}}" alt="{{$post->title}}" height="63px">
                    
                </blockquote>
                <div class="form-group">
                    <label for="image">Upload New</label>
                    <input type="file" name="image" class="form-control" value="{{asset($post->image)}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if($post->category->id == $category->id)
                                selected
                            @endif
                        >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" cols="30" rows="10" placeholer="write some content" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Post</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
        
@endsection

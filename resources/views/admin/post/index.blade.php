@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Manage Posts</div>

        <div class="panel-body">
            <a href="{{route('post.create')}}" class="btn btn-success">Create New Post</a>
            <a href="{{route('post.trash')}}" class="btn btn-default">trashed posts</a>
            <br>

            <table class="table table-hover">
                <thead>
                    <th>Header Image</th>
                    <th>Title</th>
                    <th>Options</th>
                    <th></th>
                </thead>
                <tbody>
                    @if($posts->count() < 1)
                    <tr><td colspan="4" class="text-center">No post.</td></tr>
                    @endif
                    @foreach ($posts as $post)
                    <tr>
                        <td width="70px">
                            <img src="{{asset($post->image)}}" height="63px" alt="{{$post->title}}">
                        </td>
                        <td>
                            <h4 class="list-group-item-heading"><strong>{{$post->title}}</strong></h4>
                            <small class="list-group-item-text">
                                <span>by. </span> {{$post->user->name}} 
                                &bull;
                                <span>at. </span> {{$post->created_at->toFormattedDateString()}}
                                <br>
                                <span>cat. {{$post->category->name}}</span>
                            </small>
                        </td>
                        <td><a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-xs btn-info">update</a></td>
                        <td>
                            <form action="{{route('post.destroy', ['id' => $post->id])}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" Class="btn btn-xs btn-danger">trash</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
        
@endsection

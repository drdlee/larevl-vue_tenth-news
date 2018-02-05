@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Manage Posts > Trashed Posts</div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Title</th>
                    <th>Options</th>
                    <th></th>
                </thead>
                <tbody>
                    @if($posts->count() < 1)
                    <tr><td colspan="3" class="text-center">No trashed post.</td></tr>
                    @endif
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            <h4 class="list-group-item-heading"><strong>{{$post->title}}</strong></h4>
                            <small class="list-group-item-text">
                                <span>by. </span> {{$post->user->name}} 
                                &bull;
                                <span>at. </span> {{$post->created_at->toFormattedDateString()}}
                            </small>
                        </td>
                        <td>
                            <form action="{{route('post.restore', ['id' => $post->id])}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-xs btn-danger">restore</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('post.kill', ['id' => $post->id])}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger">kill</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
        
@endsection

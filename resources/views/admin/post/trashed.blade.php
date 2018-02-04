@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Manage Posts > Trashed Posts</div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Title</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            <form action="{{route('post.destroy', ['id' => $post->id])}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" href="{{route('post.destroy', ['id' => $post->id])}}"class="btn btn-xs btn-danger">restore</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
        
@endsection

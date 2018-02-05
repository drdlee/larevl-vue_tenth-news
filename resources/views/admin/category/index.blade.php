@extends('layouts.app')

@section('content')
        
    <div class="panel panel-default">
        <div class="panel-heading">Manage Category</div>

        <div class="panel-body">
            <a href="{{route('category.create')}}" class="btn btn-success">Create New Category</a>
            <br>

            <table class="table table-hover">
                <thead>
                    <th>Category Name</th>
                    <th>Options</th>
                    <th></th>
                </thead>
                <tbody>
                    @if($categories->count() < 1)
                    <tr><td colspan="3" class="text-center">No post.</td></tr>
                    @endif
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <h4 class="list-group-item-heading">{{$category->name}}</h4>
                            <small>
                                <strong>{{count($category->posts)}} posts</strong>, under this category.
                                <br>
                                <strong>{{count($trashPost)}} trashed posts</strong>, under this category.
                            </small>
                        </td>
                        <td>
                            <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-xs btn-info">update</a>
                        </td>
                        <td>
                            <form action="{{route('category.destroy', ['id' => $category->id])}}" method="POST">
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

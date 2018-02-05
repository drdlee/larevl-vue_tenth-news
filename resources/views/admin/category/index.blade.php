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
                            <p>{{$category->name}}</p>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
        
@endsection

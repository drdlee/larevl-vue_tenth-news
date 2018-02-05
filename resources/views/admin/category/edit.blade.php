@extends('layouts.app')
@section('content')
@include('layouts.errors')
        
    <div class="panel panel-default">
        <div class="panel-heading">Edit Category: {{$category->name}}</div>

        <div class="panel-body">
            <form action="{{route('category.update', ['id' => $category->id])}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name">Category's Name</label>
                    <input type="text" name="name" class="form-control" placeholder="category's name .." value="{{$category->name}}">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Category</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
        
@endsection

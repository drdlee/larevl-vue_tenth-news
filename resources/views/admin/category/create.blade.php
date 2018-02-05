@extends('layouts.app')
@section('content')
@include('layouts.errors')
        
    <div class="panel panel-default">
        <div class="panel-heading">Create New Category</div>

        <div class="panel-body">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Category's Name</label>
                    <input type="text" name="name" class="form-control" placeholder="category's name ..">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Create Category</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
        
@endsection

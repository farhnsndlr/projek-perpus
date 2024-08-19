@extends('layouts.main')
@section('title', 'Add Categories')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">
    <div>
    <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>

        <div class="mt-5 w-100">
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
                                
        @endif
        
        <form action="add-category" method="post">
        @csrf

            <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>
                
                <div class="mt-2">
                <button type="submit" class="btn btn-success mt-3">Submit</button>  
                </div>
        </form>
    </div>
</div>
@endsection
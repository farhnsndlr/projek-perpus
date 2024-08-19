@extends('layouts.main')
@section('title', 'Add Books')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">
    <div>
    <h1 class="h3 mb-0 text-gray-800">Add Books</h1>
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

        <form action="add-book" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="code" class="form-label">Book Code</label>
        <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code">
        </div>

        <div class="mb-3">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Book Title">
        </div>

        <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" name="author" id="author" class="form-control" placeholder="Author">
        </div>

        <div class="mb-3">
        <label for="image" class="form-label">Book Cover</label>
        <input type="file" name="image" class="form-control">
        </div>
                            
        <div class= "mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="categories[]" id="category" class="form-control select-multiple" placeholder="Select Category" multiple>
        @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
        </select>
        </div>

        <div class="mt-2">
        <button type="submit" class="btn btn-success mt-3">Submit</button>  
        </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.main')
@section('title', 'Edit Book')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
                        
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

        <form action="/admin/edit-book/{{ $book->slug }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Book Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code" value="{{ $book->book_code }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" value="{{ $book->title }}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Author" value="{{ $book->author }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Book Cover</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
            <label for="currentCover" class="form-label">Current Cover</label><br></label>
                @if ($book->cover!='')
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="" width="100px">
                @else
                    <img src="{{ asset('image/notfound.jpg') }}" alt=" " width="100px">
                @endif
            </div>

            <div class= "mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="currentCategory" class="form-label">Current Category</label>
                    <ul>
                        @foreach ($book->categories as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    </ul>
            </div>

            <div class="mt-2">
                <button class="btn btn-success mt-3">Save</button>  
            </div>
        </form>
    </div>
</div>
             
@endsection
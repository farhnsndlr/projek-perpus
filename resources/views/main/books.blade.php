@extends('layouts.main')
@section('title', 'Book List')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">

    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Book List</h1>
    </div>
                   
        <div class="my-5">
            <div class="row">
                @foreach ($books as $item)
                <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('image/notfound.jpg') }}" class="card-img-top" draggable="false">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->title }}</h4>
                                    <p class="text-muted fs-6 ">{{ $item->book_code }}</p>
                                    <p class="text-muted fs-6 ">By {{ $item->author }}</p>
                                        <div class="badge p-2 text-wrap {{ $item->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                                            <p class="card-text fs-6 text-light">{{ $item->status }}</p>
                                        </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>    
            
        </div>
@endsection
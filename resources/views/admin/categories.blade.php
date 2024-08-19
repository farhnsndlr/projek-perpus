@extends('layouts.main')
@section('title', 'Categories')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">

    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>

        <div class="mt-3 d-flex justify-content-end">
        <a href="add-category" class="btn btn-primary">Add</a>
        </div>

            <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
            @endif
            </div>
                    
                   
            <div class="my-5 >">
            <table class= "table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Name</th>
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>

                        <div class="btn-group">
                        <td>
                        <a href="/admin/edit-category/{{ $item->slug }}" class="btn btn-primary">Edit</a>
                        <a href="/admin/delete-category/{{ $item->slug }}" class="btn btn-danger">Delete</a>
                        </td>
                        </div>
                </tr>
                                    
            @endforeach
            </tbody>
            </table>
</div>
@endsection
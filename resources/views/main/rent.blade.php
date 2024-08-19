@extends('layouts.main')
@section('title', 'Rent Books')
@section('topbar')
@section('sidebar')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rent Books</h1>
    </div>

    <div class="mt-5">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>
                    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Rent Book Form</h1>
                                    </div>

                                    <form method="post" action="/main/rent">
                                    @csrf

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username :</label>
                                            <br>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text" name="username" placeholder="Username" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label for="book_title" class="form-label">Book Title :</label>
                                                <select name="book_id" id="book_title" class="form-control input-box">
                                                    <option value="">Select Book</option>
                                                        @foreach ($books as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                                                
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
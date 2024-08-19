@extends('layouts.main')
@section('title', 'Rent Logs')
@section('topbar')
@section('sidebar')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                        
    </div>

     <div class="mt-5">
        <h2>Rent Logs</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Book Title</th>
                            <th>Start Date</th>
                            <th>Return Date</th>
                            <th>Actual Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rent_logs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->rent_date }}</td>
                            <td>{{ $item->return_date }}</td>
                            <td>{{ $item->actual_return }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
 </div>
 
@endsection
@extends('layouts.main')

@section('title', 'Dashboard')

@section('topbar')
@section('sidebar')

@section('content')
               
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

     <h4>Selamat datang {{ Auth::user()->name }}</h4>

        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4">
                 <div class="card border-left-primary shadow h-100 py-2">
                     <div class="card-body">
                         <div class="row no-gutters align-items-center">
                             <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                     Total Books
                                 </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $books_count }}</div>
                             </div>
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </div>
                            </div>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
@endsection
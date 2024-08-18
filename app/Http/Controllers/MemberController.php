<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('/main/books', ['books' => $books]);
    }

    public function show()
    {
        $bookCount = Book::count();
        $user_id = Auth::user()->id;
        $rentlogs = Rent::with('user', 'book')->where('id', $user_id)->get();
        return view('main.dashboard', ['rent_logs' => $rentlogs, 'books_count' => $bookCount]);
}

}
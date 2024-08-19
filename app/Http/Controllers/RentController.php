<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class RentController extends Controller
{
    public function index()
    {
        $books = Book::all();
      
       
        return view('main.rent', ['books' => $books]);
    }

    public function store(Request $request)
    {
        
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(7)->toDateString();

        
        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'available'){
            Session::flash('message', 'Book is not available');
            session::flash('alert-class', 'alert-danger');
            return redirect('/main/rent');
        }
        else {
            
            try {
                DB::beginTransaction();
                // insert to rent_logs table
                Rent::create($request->all());
                // update book table
                $book = Book::findorfail($request->book_id);
                $book->status = 'unavailable';
                $book->save();
    
                DB::commit();

                session::flash('message', 'Book is successfully rented');
                session::flash('alert-class', 'alert-success');
                return redirect('/main/rent');

            } catch (\Throwable $th) {
                DB::rollback();
                dd($th);
            }
        }
    }

    public function logs()
    {
        $rentlogs = Rent::all();
        return view('admin.logs', ['rent_logs' => $rentlogs]);
    }

    public function returnBook()
    {
        $users = User::where('user_type', 'member')->get();
        $books = Book::all();
        return view ('admin.return-book',['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
{
    $rentData = Rent::where('user_id', $request->user_id)
                    ->where('book_id', $request->book_id)
                    ->where('actual_return', null)
                    ->first();

    if ($rentData) {
        $rentData->actual_return = Carbon::now()->toDateString();
        $rentData->save();
        $book = Book::findorfail($request->book_id);
        $book->status = 'available';
        $book->save();

        session::flash('message', 'Book is successfully returned');
        session::flash('alert-class', 'alert-success');
        return redirect('/admin/return-book');
    } else {
        Session::flash('message', 'No book is rented');
        session::flash('alert-class', 'alert-danger');
        return redirect('/admin/return-book');
    }
}
}
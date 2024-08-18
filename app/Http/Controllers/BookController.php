<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        
        return view('admin.add-book', ['categories' => $categories]);
    }   

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => ['required', 'unique:books', 'max:255'],
            'title' => ['required', 'max:255'],
        ]);

        $newName = '';
        if ($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('/admin/books')->with('status', 'Successfully Added'); 
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin.edit-book', ['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request, $slug)
    {
       $newName = '';
        if ($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        
        $request['cover'] = $newName;
        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

       
        if ($request->categories) {
            $book->categories()->sync($request->categories);
        } 
        return redirect('/admin/books')->with('status', 'Successfully Updated');
        
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->forceDelete();
        return redirect('/admin/books')->with('status', 'Successfully Deleted'); 
    }

    public function bookList()
    {
        $books = Book::all();
        return view('main.books', ['books' => $books]);
    }
}
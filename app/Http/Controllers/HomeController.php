<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        
        return view('admin.dashboard', ['books_count' => $bookCount, 'category_count' => $categoryCount]);
    }

   
   
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.add-category');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:categories', 'max:255'],
        ]);

        $category = Category::create($request->all());
        return redirect('/admin/categories')->with('status', 'Successfully Added'); 
        
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.edit-category', ['category' => $category]);
    }
    
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:categories', 'max:255'],
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('/admin/categories')->with('status', 'Successfully Updated'); 
    }
       public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->forceDelete();
        return redirect('/admin/categories')->with('status', 'Successfully Deleted'); 
    }
}

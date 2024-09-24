<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::with('questions')->get();
//        dd($categories);
        return view('admin.categories.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Categories::query()->create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }
}

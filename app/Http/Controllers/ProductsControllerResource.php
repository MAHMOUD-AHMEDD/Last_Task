<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Product_question_answers;
class ProductsControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return view('products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::with('questions')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Products::query()->create($request->only('name', 'price', 'info', 'category_id'));

        foreach ($request->questions as $question_id => $answer) {
            Product_question_answers::create([
                'product_id' => $product->id,
                'question_id' => $question_id,
                'answer' => $answer,
            ]);
        }
        return redirect()->route('products.index')->with('success', 'Product has been created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

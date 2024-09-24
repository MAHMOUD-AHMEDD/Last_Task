<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Questions;
class QuestionsControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($categoryId)
    {
        $category = Categories::with('questions')->findOrFail($categoryId);
        return view('admin.questions.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryId)
    {
        return view('admin.questions.create', compact('categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $categoryId)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|string',
            'is_required' => 'required|boolean',
        ]);

        Questions::query()->create([
            'question' => $request->input('question'),
            'type' => $request->input('type'),
            'is_required' => $request->input('is_required'),
            'category_id' => $categoryId,
        ]);

        return redirect()->route('admin.categories.questions.index', $categoryId)
            ->with('success', 'Question created successfully!');
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
    public function edit($categoryId, $questionId)
    {
        $question = Questions::query()->findOrFail($questionId);
        return view('admin.questions.edit', compact('question', 'categoryId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryId, $questionId)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

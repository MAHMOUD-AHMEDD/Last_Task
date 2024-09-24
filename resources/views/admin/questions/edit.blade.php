@extends('layout')
@extends('title','Questions|edit')
@section('content')
    <div class="container">
        <h1>Edit Question: {{ $question->question }}</h1>

        <form action="{{ asset('admin/categories/questions/edit', [$category->id, $question->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ $question->question }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Question Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>Text</option>
                    <option value="select" {{ $question->type == 'select' ? 'selected' : '' }}>Select</option>
                    <option value="number" {{ $question->type == 'number' ? 'selected' : '' }}>Number</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="is_required" class="form-label">Is Required?</label>
                <select class="form-control" id="is_required" name="is_required" required>
                    <option value="1" {{ $question->is_required ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$question->is_required ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Question</button>
        </form>
    </div>




@endsection

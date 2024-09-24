@extends('layout')
@extends('title','Questions|create')
@section('content')
    <div class="container">
        <h1>Add New Question to Category: {{ $category->name }}</h1>

        <form action="{{ asset('admin/categories/questions/create', $category->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Question Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="text">Text</option>
                    <option value="select">Select</option>
                    <option value="number">Number</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="is_required" class="form-label">Is Required?</label>
                <select class="form-control" id="is_required" name="is_required" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Question</button>
        </form>
    </div>




@endsection

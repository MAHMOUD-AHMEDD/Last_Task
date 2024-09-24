@extends('layout')
@section('title','categories')
@section('content')
    <div class="container">
        <h1>Categories List</h1>

        <a href="{{ asset('admin/categories/create') }}" class="btn btn-primary">Add New Category</a>

        <table class="table table-striped mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Questions</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <ul>
                            @foreach($category->questions as $question)
                                <li>{{ $question->question }} ({{ $question->type }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
{{--                        --}}
                        <a href="{{ route('admin.categories.questions.index', $category->id) }}" class="btn btn-secondary">Manage Questions</a>
{{--                        --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
